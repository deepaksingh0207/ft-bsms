<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * Home Controller
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DealerController extends AppController
{

    public function login() {

        $this->viewBuilder()->setLayout('login');
        //$this->layout = false; 
        $this->loadModel('BuyerSellerUsers');
        $this->loadModel('Products');

        $products = $this->Products->find('list')->toArray();
        $this->set(compact('products'));
        $session = $this->getRequest()->getSession();
        if($session->read('user.id')) {
            $this->redirect(array('action' => 'dashboard'));
        }

        if($this->request->is('post')) {
            $result = $this->BuyerSellerUsers->find()
            //->select(['id', 'username', 'user_type'])
            ->where(['username' => $this->request->getData('username'),
                'password' => md5($this->request->getData('password'))])
                ->limit(1);
            
                $result = $result->toArray();

                if($result) {
                    $session = $this->getRequest()->getSession();
                    $session->write('user.username', $result[0]->username);
                    $session->write('user.id', $result[0]->id);
                    $session->write('user.user_type', $result[0]->user_type);
                    $session->write('user.details', $result[0]);
                    if($session->read('user.user_type') == 'seller') {
                        $this->redirect(['action' => 'seller-dashboard']);
                    } else {
                        $this->redirect(array('controller' => 'dealer', 'action' => 'dashboard'));
                    }
                } else {
                    $this->Flash->error("Invalid Login details");
                }
                
        }
    }

    public function logout() {
        $session = $this->getRequest()->getSession();
        $session->destroy();
        // $this->Flash->success("You've successfully logged out.");
        $this->redirect(array('controller' => 'dealer', 'action' => 'login'));
    }

    public function registration()
    {
        $this->loadModel('BuyerSellerUsers');
        $buyerSellerUser = $this->BuyerSellerUsers->newEmptyEntity();

        $this->loadModel('Products');
        $products = $this->Products->find('list')->toArray();

        if ($this->request->is('post')) {
            //print_r($this->request->getData()); exit;
            $data = $this->request->getData();
            $data['added_date'] = date('y-m-d H:i:s');
            $data['password'] = md5($data['password']);
            $buyerSellerUser = $this->BuyerSellerUsers->patchEntity($buyerSellerUser, $data);
            //print_r($buyerSellerUser); exit;
            if ($this->BuyerSellerUsers->save($buyerSellerUser)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'confirmation']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('buyerSellerUser', 'products'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function confirmation()
    {
        
    }

    public function dashboard() 
    {
        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            return $this->redirect(array('action' => 'login'));
        }

        $conn = ConnectionManager::get('default');
        $this->loadModel('RfqDetails');
        $this->loadModel('RfqInquiries');
        $this->loadModel('Products');

        
        $query = $this->RfqDetails->find()
            ->select(['RfqDetails.id','RfqDetails.rfq_no','Products.name','RfqDetails.added_date', 'RfqInquiries.reach', 'RfqInquiries.respond'])
            ->contain(['Products'])
            ->leftJoin(
                ['RfqInquiries' => '(select rfq_id, count(seller_id) reach, count(inquiry) respond FROM rfq_inquiries group by rfq_inquiries.rfq_id)'],
                ['RfqInquiries.rfq_id = RfqDetails.id'])
            ->where(['RfqDetails.buyer_seller_user_id' => $session->read('user.id')]);

        $rfqDetails = $this->paginate($query);

        $rfqsummary = $conn->execute("SELECT rfq_id, rfq_no, U.company_name, rate, created_date FROM rfq_inquiries RI 
        join rfq_details RD on (RD.id = RI.rfq_id) join buyer_seller_users U on (U.id = RI.seller_id) WHERE rate = ( SELECT MIN( RI2.rate ) FROM rfq_inquiries RI2 WHERE RI.rfq_id = RI2.rfq_id ) ORDER BY rfq_id");


        $rfqCounts = $conn->execute("SELECT CASE status
        when 0  then 'new'
        when 1 then 'approved'
        when 2 then 'Rejected'
     END as 'status', count(id) total FROM `rfq_details` where buyer_seller_user_id = ".$session->read('user.id')." group by status");


        $rfqTotals = [];    
        foreach($rfqCounts as $row) {
            $rfqTotals[$row['status']] = $row['total'];
        }

        $userDetails = $session->read('user.details');
        
        $regionSellerCnt = $conn->execute("select count(U.id) total
            from buyer_seller_users U
            where U.user_type = 'seller'
            and U.cities = '$userDetails->cities'"
        );

        foreach($regionSellerCnt as $row) {
            $regionSellerCnt = $row['total'];
        }

        $totalSeller = $conn->execute("select count(U.id) total
            from buyer_seller_users U
            where U.user_type = 'seller'"
        );
        foreach($totalSeller as $row) {
            $totalSeller = $row['total'];
        }

        $supplierCount = [];
        $supplierCount['Total'] = $totalSeller;
        $supplierCount['Regional'] = $regionSellerCnt;

        $this->set('rfqDetails', $rfqDetails);
        $this->set('rfqsummary', $rfqsummary);
        $this->set('rfqTotals', $rfqTotals);
        $this->set('supplierCount', $supplierCount);
        
    }

    public function sellerDashboard() 
    {
        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            return $this->redirect(array('action' => 'login'));
        }

        $this->loadModel('RfqDetails');
        $this->loadModel('RfqForSellers');
        $this->loadModel('RfqInquiries');

        
        $userType = $session->read('user.user_type');
        $productDeals = $session->read('user.details.product_deals');

        //echo $productDeals; exit;

        $totalRfq = 0;
        $rfqResponded = 0;
        if($userType == 'seller') {
            $totalRfq = $this->RfqDetails->find()->where(['RfqDetails.status' => 1, 'RfqDetails.rfq_no NOT IN (select rfq_no from rfq_for_sellers where seller_id !='  .$session->read("user.id").')' ])->contain(['Products' => function ($q) use ($productDeals)  {
                return $q->where(["Products.id IN ($productDeals)"]);

            }, 'Uoms'])->count();

            
            //echo '<pre>'; print_r($this->RfqDetails); exit;
            $rfqResponded = $this->RfqInquiries->find()->where(['RfqInquiries.inquiry' => 1, 'seller_id' => $session->read("user.id") ])->count();

            $totalRfqs = $this->RfqDetails->find()->where(['RfqDetails.status' => 1, 'RfqDetails.rfq_no NOT IN (select rfq_no from rfq_for_sellers where seller_id !='  .$session->read("user.id").')' ])->contain(['Products' => function ($q) use ($productDeals)  {
                return $q->where(["Products.id IN ($productDeals)"]);

            }, 'Uoms'])->count();


        }

        $rfqValuesByCategory = array();
        $conn = ConnectionManager::get('default');
        $countByProduct = $conn->execute("SELECT count(1) count , P.name cat, sum(RI.sub_total) total_value FROM rfq_details RD left join rfq_inquiries RI on RI.rfq_id = RD.id join products P on (P.id = RD.product_id) where RD.status =1 and product_id in ($productDeals) group by product_id");
        foreach($countByProduct as $row) {
            $countByProducts[$row['cat']] = $row['count'];
            $rfqValuesByCategory[$row['cat']] = $row['total_value'];
        }

        //echo '<pre>'; print_r($countByProducts); exit;
        $this->productlist();
        $this->set(compact(['totalRfq', 'rfqResponded', 'countByProducts', 'rfqValuesByCategory']));
        
    }

    public function view($id = null)
    {

        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            return $this->redirect(array('action' => 'login'));
        }
        $this->loadModel('RfqDetails');
        $this->loadModel('RfqInquiries');

        $rfqDetails = $this->RfqDetails->get($id, [
            'contain' => ['Products', 'Uoms'],
        ]);

        $attrParams = array();
        if($rfqDetails->uploaded_files) {
            $attrParams = json_decode($rfqDetails->uploaded_files, true);
        }

        $session = $this->getRequest()->getSession();
        $userType = $session->read('user.user_type');
        if($userType == 'seller') {
            $RfqInquiry = $this->RfqInquiries->newEmptyEntity();
            $data = array();
            $data['rfq_id'] = $id;
            $data['seller_id'] = $session->read('user.id');
            $RfqInquiry = $this->RfqInquiries->patchEntity($RfqInquiry, $data);
            $results = $this->RfqInquiries->save($RfqInquiry);

            $RfqInquiry = $this->RfqInquiries->find()->where(['inquiry' => 1, 'rfq_id' => $id, 'seller_id' => $session->read('user.id')])->first();

            $this->set('rfq_inquiry', $RfqInquiry);

        }  else if($userType == 'buyer')  {
                $results = $this->RfqInquiries->find()
                ->select(['RfqInquiries.id', 'RfqInquiries.inquiry','RfqInquiries.rfq_id', 'RfqInquiries.seller_id', 'RfqInquiries.qty', 'RfqInquiries.rate', 'RfqInquiries.discount', 'RfqInquiries.sub_total', 'RfqInquiries.delivery_date', 'RfqInquiries.inquiry_data', 'RfqInquiries.inquiry', 'RfqInquiries.created_date', 'RfqInquiries.updated_date', 'RfqInquiries.neg_rate', 'BuyerSellerUsers.company_name'])
                ->innerJoin(['BuyerSellerUsers' => 'buyer_seller_users'], ['BuyerSellerUsers.id = RfqInquiries.seller_id'])
                ->where(['rfq_id' => $id])
                ->toArray();
                
                /*$data = array();
                foreach($results as &$result) {
                    $t = array();
                    if(isset($result['inquiry_data']) && $result['inquiry_data'] != null ) {
                        $tmp = json_decode($result['inquiry_data'], true);
                        foreach($tmp as $k => $v) {
                            $t[$k] = $v;
                        }
                    }
                    $t['inquiry_date'] = $result['created_date'];
                    $t['company'] = $result->buyer_seller_user->company_name;

                    $data[] = $t;
                } */
                //echo '<pre>'; print_r($results); exit;
        }  

        $this->set(compact('rfqDetails', 'attrParams', 'userType', 'results'));
    }

    public function addproduct($type, $sellerId = '') {

        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            return $this->redirect(array('action' => 'login'));
        }

        $this->loadModel("Products");
        $this->loadModel("Uoms");
        $this->loadModel('BuyerSellerUsers');

        $products = $this->Products->find('list')->toArray();
        $uoms = $this->Uoms->find('list')->toArray();
        
        $updatedProduct = array();

        if(isset($sellerId) && !empty($sellerId)) {
            $sellerProducts = $this->BuyerSellerUsers->find()
            ->select(['product_deals'])
            ->where(["id in ($sellerId)"]);

                $sellerProducts = $sellerProducts->toArray();
                foreach($sellerProducts as $seller) {
                    $t = explode(',', $seller->product_deals);
                    $updatedProduct = array_merge($updatedProduct, $t);
                }
                

                $tempProducts = array();
                foreach($products as $k => $v) {
                    if(in_array($k, $updatedProduct)) {
                        $tempProducts[$k] = $v;
                    }
                }
                $products = $tempProducts;
            
        }

        $this->set('seller_id', $sellerId);

        $this->set(compact('products', 'uoms'));

        if ($this->request->is('post')) {
            $session = $this->getRequest()->getSession();
            $userId = $session->read('user.id');
            $this->loadModel("RfqDetails");
            
            //$RfqDetail = $this->RfqDetails->newEmptyEntity();
            $request = $this->request->getData();
            $data = array();
            

            $conn = ConnectionManager::get('default');
            $maxrfq = $conn->execute("SELECT MAX(rfq_no) maxrfq FROM rfq_details RD WHERE RD.buyer_seller_user_id=$userId");

            foreach ($maxrfq as $maxid) {
                $maxRfqId = $maxid['maxrfq'] + 1; 
            }   

            //echo $maxRfqId;
            //echo '<pre>'; print_r($request); exit;

            $sellers = array();

            if(empty($request['seller_id'])) {
                unset($request['seller_id']);
            } else {
                $sellers = explode(',', $request['seller_id']);
                unset($request['seller_id']);
            }

            //echo '<pre>'; print_r($request); exit();

            foreach ($request as $key => $row) {
                $record = array();
                if(isset($row["files"])) {
                    $productImages = $row["files"];
                    $uploads["files"] = array();
                    // file uploaded
                    foreach($productImages as $productImage) {
                        $fileName = time().'_'.$productImage->getClientFilename();
                        $fileType = $productImage->getClientMediaType();

                        if ($fileName && ($fileType == "application/pdf" || $fileType == "image/*")) {
                            $imagePath = WWW_ROOT . "uploads/" . $fileName;
                            $productImage->moveTo($imagePath);
                            $uploads["files"][] = "uploads/" . $fileName;
                        }
                    }

                    $record['uploaded_files'] = json_encode($uploads["files"]);
                }

                if(isset($row['seller']) && !empty($row['seller'])) {
                    $sellers = array_merge($sellers, $row['seller']);
                }

                
                foreach($row['product_id'] as $product) {
                    $record['buyer_seller_user_id'] = $userId;
                    $record['rfq_no'] = $maxRfqId;
                    $record['product_id'] = $product;//$row['product_id'];
                    $record['product_sub_category_id'] = $row['product_sub_category_id'];
                    $record['part_name'] = $row['part_name'];
                    $record['qty'] = $row['qty'];
                    $record['uom_code'] = $row['uom_code'];
                    $record['remarks'] = $row['remarks'];
                    $record['make'] = $row['make'];
                    $record['added_date'] = date('Y-m-d H:i:s');
                    //$record['uploaded_files'] = json_encode($uploads["files"]);

                    $data[] = $record;
                }

            }

            //echo '<pre>' ;print_r($sellers); exit;
            $RfqDetail = $this->RfqDetails->newEntities($data);
            if($this->RfqDetails->saveMany($RfqDetail)) {
            
                $this->loadModel('RfqForSellers');
                $rfqSellers = array();
                foreach($sellers as $seller) {
                    $tmp = array();
                    $tmp['rfq_no'] = $maxRfqId;
                    $tmp['seller_id'] = $seller;

                    $rfqSellers[] = $tmp;
                }
                //echo '<pre>'; print_r($rfqSellers); exit;
                $rfqSeller = $this->RfqForSellers->newEntities($rfqSellers);
                $this->RfqForSellers->saveMany($rfqSeller);

                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'dashboard']);
            }
       
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
    }

    public function copy($id = null)
    {
        $this->loadModel("RfqDetails");
        $rfqDetailExisting = $this->RfqDetails->get($id)->toArray();

        unset($rfqDetailExisting['id']);
        unset($rfqDetailExisting['added_date']);
        unset($rfqDetailExisting['updated_date']);
        
        $conn = ConnectionManager::get('default');
        $maxrfq = $conn->execute("SELECT MAX(rfq_no) maxrfq FROM rfq_details RD WHERE RD.buyer_seller_user_id=".$rfqDetailExisting['buyer_seller_user_id']);

        foreach ($maxrfq as $maxid) {
            $maxRfqId = $maxid['maxrfq'] + 1; 
        }

        $rfqDetailExisting['rfq_no'] = $maxRfqId;

        $rfqDetail = $this->RfqDetails->newEmptyEntity();
        
        $rfqDetail = $this->RfqDetails->patchEntity($rfqDetail, $rfqDetailExisting);
        if ($this->RfqDetails->save($rfqDetail)) {
            $this->Flash->success(__('The rfq successfully copied - RFQ NO:-' .$maxRfqId));

            return $this->redirect(['action' => 'dashboard']);
        }
        $this->Flash->error(__('The rfq detail could not be saved. Please, try again.'));
    }

    public function copyPreview($id = null)
    {
        $this->loadModel("RfqDetails");
        /*$rfqDetail = $this->RfqDetails->get($id, [
            'contain' => [],
        ]); */

        $rfqDetail = $this->RfqDetails->find()->where(['rfq_no' => $id, 'status' => 1], [
            'contain' => [],
        ]);

        //echo '<pre>'; print_r($rfqDetail); exit;
        
        $products = $this->RfqDetails->Products->find('list')->all();
        $uoms = $this->RfqDetails->Uoms->find('list')->all();
        $this->set(compact('rfqDetail', 'products', 'uoms'));
        $this->set('reference_rfq_id', $id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $session = $this->getRequest()->getSession();
            $userId = $session->read('user.id');
            $request = $this->request->getData();
            
            //echo '<pre>' ; print_r($request); exit;

            $data = array();
            
            $conn = ConnectionManager::get('default');
            $maxrfq = $conn->execute("SELECT MAX(rfq_no) maxrfq FROM rfq_details RD WHERE RD.buyer_seller_user_id=$userId");

            foreach ($maxrfq as $maxid) {
                $maxRfqId = $maxid['maxrfq'] + 1; 
            }   

            foreach ($request as $key => $row) {
                $record = array();

                if(isset($row["files"])) {
                    $productImages = $row["files"];
                    $uploads["files"] = array();
                    // file uploaded
                    foreach($productImages as $productImage) {
                        $fileName = time().'_'.$productImage->getClientFilename();
                        $fileType = $productImage->getClientMediaType();

                        //if ($fileType == "application/pdf" || $fileType == "image/*") {
                            $imagePath = WWW_ROOT . "uploads/" . $fileName;
                            $productImage->moveTo($imagePath);
                            $uploads["files"][] = "uploads/" . $fileName;
                        //}
                    }
                    $record['uploaded_files'] = json_encode($uploads["files"]);
                }
            
                $record['buyer_seller_user_id'] = $userId;
                $record['rfq_no'] = $maxRfqId;
                $record['product_id'] = $row['product_id'];
                $record['product_sub_category_id'] = $row['product_sub_category_id'];
                $record['part_name'] = $row['part_name'];
                $record['qty'] = $row['qty'];
                $record['uom_code'] = $row['uom_code'];
                $record['remarks'] = $row['remarks'];
                $record['make'] = $row['make'];
                $record['added_date'] = date('Y-m-d H:i:s');
                

                $data[] = $record;

            }
            //echo '<pre>' ; print_r($data); exit;

            $request['rfq_no'] = $maxRfqId;

            //$rfqDetail = $this->RfqDetails->newEmptyEntity();
            //$rfqDetail = $this->RfqDetails->patchEntity($rfqDetail, $request);
            $RfqDetail = $this->RfqDetails->newEntities($data);
            if($this->RfqDetails->saveMany($RfqDetail)) {
        //if ($this->RfqDetails->save($rfqDetail)) {
            $this->Flash->success(__('The rfq successfully copied - RFQ NO:-' .$maxRfqId));

            return $this->redirect(['action' => 'dashboard']);
        }
        $this->Flash->error(__('The rfq detail could not be saved. Please, try again.'));

        }
    }

    public function productlist() {
        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            return $this->redirect(array('action' => 'login'));
        }
        $this->loadModel('BuyerSellerUsers');
        $this->loadModel("Products");
        $this->loadModel('RfqDetails');
        $this->loadModel('RfqDetails');
        $this->loadModel('RfqInquiries');
        
        $products = $this->Products->find('list')->toArray();
        $sellerProducts = $this->BuyerSellerUsers->find()
        ->select(['product_deals'])
        ->where(['id' => $session->read("user.id")])
            ->limit(1);

            $sellerProducts = $sellerProducts->toArray();
            $sellerProducts = explode(',', $sellerProducts[0]->product_deals);

            $tempProducts = array();
            foreach($products as $k => $v) {
                if(in_array($k, $sellerProducts)) {
                    $tempProducts[$k] = $v;
                }
            }
            $products = $tempProducts;

        
        $userType = $session->read('user.user_type');
        $productDeals = $session->read('user.details.product_deals');

        if ($this->request->is('post')) {
            $request = $this->request->getData();
            if(!empty($request['product_id'])) {
                $productDeals = $request['product_id'];
            }
        }


        $rfqDetails = array();
        if($userType == 'seller') {

            $rfqDetails = $this->RfqDetails->find()
            ->where(['RfqDetails.status' => 1, 'RfqDetails.rfq_no NOT IN (select rfq_no from rfq_for_sellers where seller_id !='  .$session->read("user.id").')' ,
            'RfqDetails.id NOT IN (SELECT rfq_id FROM rfq_inquiries where inquiry=1 and seller_id='.$session->read("user.id").')'
             ])
            ->contain(['Products' => function ($q) use ($productDeals)  {
                return $q->where(["Products.id IN ($productDeals)"]);

            }, 'Uoms'])->toList();

            //echo '<pre>';print_r($rfqDetails); exit;

            $rfqRespondedDetails = $this->RfqDetails->find()
            ->leftJoin(['RfqInquiries' => 'rfq_inquiries'], 
            ['RfqInquiries.rfq_id = RfqDetails.id'])
            ->where(['RfqDetails.status' => 1, 'RfqInquiries.inquiry' => 1, 'RfqInquiries.seller_id' => $session->read("user.id")])->contain(['Products' => function ($q) use ($productDeals)  {
                return $q->where(["Products.id IN ($productDeals)"]);

            }, 'Uoms'])->toList();

            //echo '<pre>';print_r($rfqRespondedDetails); exit;
            
            foreach ($rfqDetails as &$rfqDetail) {
                if($rfqDetail['uploaded_files']) {
                    $files = json_decode($rfqDetail['uploaded_files'], true);
                    foreach($files as $file) {
                        $rfqDetail['image'] = $file;
                        break;
                    }
                }
            }
            //echo '<pre>'; print_r($rfqDetails);
        }


        $this->set(compact('rfqRespondedDetails', 'rfqDetails', 'products'));
    }

    public function profile($id=null) {

    }

    public function upload($id=null) {
        if($this->request->is('post')) {
            
        }
    }
    public function inquiry($id = null)
    {
        $session = $this->getRequest()->getSession();

        if (!$session->check('user.id')) {
            return $this->redirect(['action' => 'login']);
        }

        $userType = $session->read('user.user_type');

        if ($userType == 'seller') {
            if ($this->request->is(['post', 'put'])) {
                $this->loadModel('RfqInquiries');
                $request = [
                    'rfq_id' => $id,
                    'seller_id' => $session->read('user.id'),
                ];

                $RfqInquiry = $this->RfqInquiries->find()->where($request)->first();

                if (empty($RfqInquiry)) {
                    $RfqInquiry = $this->RfqInquiries->newEmptyEntity();
                    $RfqInquiry->rfq_id = $id;
                    $RfqInquiry->seller_id = $session->read('user.id');
                }

                $RfqInquiry->inquiry = 1;
                $RfqInquiry->qty = $this->request->getData('qty');
                $RfqInquiry->rate = $this->request->getData('rate');
                $RfqInquiry->sub_total = $this->request->getData('sub_total');
                $RfqInquiry->delivery_date = $this->request->getData('delivery_date');
                $RfqInquiry->discount = $this->request->getData('discount');

                // $uploadedFile = $this->request->getData('fileInput');
                // if ($uploadedFile->getSize() > 0) {
                //     $tmpFileName = $uploadedFile->getStream()->getMetadata('uri');

                //     $spreadsheet = IOFactory::load($tmpFileName);
                //     $excelData = $spreadsheet->getActiveSheet()->toArray();

                //     debug($excelData);

                //     // Process and save the Excel data to the database
                //     foreach ($excelData as $row) {
                //         $entityData = [
                //             'rfq_id' => $id,
                //             'seller_id' => $session->read('user.id'),
                //             'inquiry' => 1,
                //             'qty' => isset($row[0]) ? (float) $row[0] : '', 
                //             'rate' => isset($row[1]) ? (float) $row[1] : null, 
                //             'delivery_date' => isset($row[2]) ? date('Y-m-d', strtotime(trim($row[2]))): null,
                //             'discount' => isset($row[3]) ? (float) $row[3] : null,
                //         ];

                //         // debug($entityData);
                //         echo'<pre>'; print_r($entityData);
                //         // Create an entity
                //         $rfqInquiryEntity = $this->RfqInquiries->newEmptyEntity();
                //         $rfqInquiryEntity = $this->RfqInquiries->patchEntity($rfqInquiryEntity, $entityData);
                //         exit;

                //         debug($rfqInquiryEntity->getErrors());

                //         // Save the entity
                //         if ($this->RfqInquiries->save($rfqInquiryEntity)) {
                //             debug("Entity saved successfully");
                //         } else {
                //             debug("Error saving entity");
                //         }
                //     }

                //     $this->Flash->success(__('Excel file uploaded and data saved.'));
                // }

                // Save the manually entered data after processing Excel data
                if ($this->RfqInquiries->save($RfqInquiry)) {
                    $this->Flash->success(__('Inquiry sent to Buyer.'));
                    return $this->redirect(['action' => 'productlist']);
                } else {
                    $this->Flash->error(__('Error saving inquiry.'));
                }
            }
        }

        $this->set('userType', $userType);
    }


    public function search(){

        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            return $this->redirect(array('action' => 'login'));
        }

        $request = $this->request->getData();  
        $total = 0;
        $searchData = array();
        $sellerIds = array();

        if ($this->request->is('post') && strlen($request['q']) ) { 
            $conn = ConnectionManager::get('default');
            if(isset($request['type']) && $request['type'] == 'seller') {
                $searchData = $conn->execute("select U.*, P.name product_name
                from buyer_seller_users U
                INNER join products P on (P.id in (U.product_deals))
                where U.user_type = 'seller'
                and U.company_name like '%$request[q]%'");
            } else {
                $searchData = $conn->execute("select U.*, P.name product_name
                from buyer_seller_users U
                INNER join products P on (P.id in (U.product_deals))
                where U.user_type = 'seller'
                and P.name like '%$request[q]%'");
            }
            
            $total = count($searchData);

            foreach($searchData as $row) {
                $sellerIds[] = $row['id'];
            }
        }

        $this->set('total', $total);
        $this->set('q', $request['q']);
        $this->set('data', $searchData);
        $this->set('type', $request['type']);
        $this->set('seller_ids', implode(',',$sellerIds));
        

    }


    public function regionalsearch(){

        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            return $this->redirect(array('action' => 'login'));
        }

        $request = $this->request->getData();  
        $total = 0;
        $searchData = array();
        $sellerIds = array();

        
        $userDetails = $session->read('user.details');
        $conn = ConnectionManager::get('default');
        $searchData = $conn->execute("select U.*, P.name product_name
        from buyer_seller_users U
        INNER join products P on (P.id in (U.product_deals))
        where U.user_type = 'seller'
        and U.cities = '$userDetails->cities'"
        );
        
        $total = count($searchData);
        foreach($searchData as $row) {
            $sellerIds[] = $row['id'];
        }

        $this->set('total', $total);
        $this->set('data', $searchData);
        $this->set('seller_ids', implode(',',$sellerIds));

    }
    

    public function rfqList() {

        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            return $this->redirect(array('action' => 'login'));
        }

        $conn = ConnectionManager::get('default');
        $this->loadModel('RfqDetails');
        
        $query = $this->RfqDetails->find()
            ->contain(['Products'])
            ->where(['RfqDetails.buyer_seller_user_id' => $session->read('user.id')]);

        $rfqDetails = $this->paginate($query);

        $this->set('rfqDetails', $rfqDetails);


    }

}
