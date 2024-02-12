<?php
declare(strict_types=1);

namespace App\Controller\Api;
use Cake\Datasource\ConnectionManager;
use Cake\Core\Exception\Exception;

/**
 * Home Controller
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApiController extends ApiAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    var $uses = false;

    public function initialize(): void
    {
        parent::initialize();

        $this->autoRender = false;

        date_default_timezone_set('Asia/Kolkata'); 
        
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        
    }

    public function index()
{
    
}

    public function postPo()
    {
        $response = array();
        $response['status'] = 0;
        $response['message'] = 'Empty request';
        $request = $this->request->getData();  

        $this->loadModel("PoHeaders");
        $this->loadModel("PoFooters");
        
        if(!empty($request) && count($request['DATA'])) {
            
            try{
                foreach($request['DATA'] as $key => $row) {
                    $hederData = array();
                    $footerData = array();

                    $hederData['sap_vendor_code'] = $row['LIFNR'];
                    $hederData['po_no'] = $row['EBELN'];
                    $hederData['document_type'] = $row['BSART'];
                    $hederData['created_on'] = date("Y-m-d H:i:s", strtotime($row['AEDAT']));
                    $hederData['created_by'] = $row['ERNAM'];
                    $hederData['pay_terms'] = $row['ZTERM'];
                    $hederData['currency'] = $row['WAERS'];
                    $hederData['exchange_rate'] = $row['WKURS'];
                    $hederData['release_status'] = $row['FRGZU'];

                    $poInstance = $this->PoHeaders->newEmptyEntity();
                    $poInstance = $this->PoHeaders->patchEntity($poInstance, $hederData);
                    
                    if ($this->PoHeaders->save($poInstance)) {
                        $po_header_id = $poInstance->id;

                        foreach($row['ITEMS'] as $no => $item) {
                            $tmp = array();
                            $tmp['po_header_id'] = $po_header_id;
                            $tmp['item'] = $item['EBELP'];
                            $tmp['deleted_indication'] = $item['LOEKZ'];
                            $tmp['material'] = $item['MATNR'];
                            $tmp['short_text'] = $item['TXZ01'];
                            $tmp['po_qty'] = $item['MENGE'];
                            $tmp['grn_qty'] = $item['R_QTY'];
                            $tmp['pending_qty'] = $item['P_QTY'];
                            $tmp['order_unit'] = $item['MEINS'];
                            $tmp['net_price'] = $item['NETPR'];
                            $tmp['price_unit'] = $item['PEINH'];
                            $tmp['net_value'] = $item['NETWR'];
                            $tmp['gross_value'] = $item['BRTWR'];
        
                            $footerData[] = $tmp;
                            //print_r($footerData);        
                        }

                        $poItemsInstance = $this->PoFooters->newEntities($footerData);
                        #print_r($poItemsInstance);
                        if($this->PoFooters->saveMany($poItemsInstance)) {   
                            $response['status'] = 1;
                            $response['message'] = 'PO saved successfully';
                        } else {
                            $response['status'] = 0;
                            $response['message'] = 'PO Items save fail';
                        }
                    } else {
                        $response['status'] = 0;
                        $response['message'] = 'PO header save fail';
                    }
                    //print_r($hederData);
                }
            } catch (\PDOException $e) {
                $response['status'] = 0;
                $response['message'] = $e->getMessage();
            } catch (\Exception $e) {
                $response['status'] = 0;
                $response['message'] = $e->getMessage();
            }
        } 

        echo json_encode($response);
        
    }


    public function getChartData()
    {   
        $response = array();
        $response['status'] = 0;
        $response['message'] = 'Empty request';
        $request = $this->request->getData();  

        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            $response['status'] = 0;
            $response['message'] = 'not authorized';
            echo json_encode($response);
            exit;
        }

        $conn = ConnectionManager::get('default');
        $this->loadModel('RfqDetails');
        $this->loadModel('RfqInquiries');
        $this->loadModel('Products');
        
        
            
        try{
            $rfqCounts = $conn->execute("SELECT CASE status
        when 0  then 'New'
        when 1 then 'Approved'
        when 2 then 'Rejected'
     END as 'status', count(id) total FROM `rfq_details` where buyer_seller_user_id = ".$session->read('user.id')." group by status");


        $rfqTotals = [];    
        foreach($rfqCounts as $row) {
            $tmp['label'] = ucfirst($row['status']);
            $tmp['total'] = [intval($row['total'])];
            $tmp['bgcolor'] = $this->getRandomColor(str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT));
            $rfqTotals[] = $tmp;
        }
        
        
        $response = $rfqTotals;

        } catch (\PDOException $e) {
            $response['status'] = 0;
            $response['message'] = $e->getMessage();
        } catch (\Exception $e) {
            $response['status'] = 0;
            $response['message'] = $e->getMessage();
        }

        
        echo str_replace("},","},\n",json_encode($response));
       
        
    }

    public function getRfqRespond()
    {   
        $response = array();
        $response['status'] = 0;
        $response['message'] = 'Empty request';
        $request = $this->request->getData();  

        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            $response['status'] = 0;
            $response['message'] = 'not authorized';
            echo json_encode($response);
            exit;
        }

        $conn = ConnectionManager::get('default');
        $this->loadModel('RfqDetails');
        $this->loadModel('RfqInquiries');
        $this->loadModel('Products');
        
        
            
        try{

            $result = $this->RfqDetails->find()
            ->select(['RfqDetails.id','RfqDetails.rfq_no','Products.name','RfqDetails.added_date', 'RfqInquiries.reach', 'RfqInquiries.respond'])
            ->contain(['Products'])
            ->leftJoin(
                ['RfqInquiries' => '(select rfq_id, count(seller_id) reach, count(inquiry) respond FROM rfq_inquiries group by rfq_inquiries.rfq_id)'],
                ['RfqInquiries.rfq_id = RfqDetails.id'])
            ->where(['RfqDetails.buyer_seller_user_id' => $session->read('user.id')])
            ->limit(10)->toArray();

            $response = [];
            foreach($result as $row) {

                //echo '<pre>'; print_r($row); exit;
                
                $response['label'][] =  str_pad((string)$row['rfq_no'], 5, "0", STR_PAD_LEFT);
                $response['reach'][] =  $row['RfqInquiries']['reach'];
                $response['respond'][] =  $row['RfqInquiries']['respond'];
            }
        

        } catch (\PDOException $e) {
            $response['status'] = 0;
            $response['message'] = $e->getMessage();
        } catch (\Exception $e) {
            $response['status'] = 0;
            $response['message'] = $e->getMessage();
        }

        
        echo str_replace("},","},\n",json_encode($response));
       
        
    }

    function getRandomColor($colorcode)
    {
        $randomColor = "#";
        for ($i = 0; $i < 3; $i ++) {
            $randomColor .= $colorcode;
        }
        return $randomColor;
    }

    function getVendorByCategory($category = null) {
        $this->loadModel('BuyerSellerUsers');
        $record = $this->BuyerSellerUsers->find()->select(['id', 'company_name'])->where(['user_type' => 'seller', "FIND_IN_SET(product_deals, '$category')"])->toList();

        $result = array();
        foreach($record as $key => $val) {
            $result[] = ['key' => $val['id'], 'value'=> $val['company_name']];
        }

        echo json_encode($result);  exit;
    }
}
