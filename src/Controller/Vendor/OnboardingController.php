<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Routing\Router;

use Cake\Event\EventInterface;

/**
 * VendorTemps Controller
 *
 * @property \App\Model\Table\VendorTempsTable $VendorTemps
 * @method \App\Model\Entity\VendorTemp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OnboardingController extends VendorAppController
{
    
    public function initialize(): void
    {
        parent::initialize();

        date_default_timezone_set('Asia/Kolkata'); 
        
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->set('title', 'Vendor Portal');
    }

    public function beforeFilter(EventInterface $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('vendor_default');  //admin is our new layout name
    }

    public function verify($request = null)
    {
        if($request == null) {
            echo 'Bad request';
            exit;
        }

        $this->loadModel("VendorTemps");
        $this->loadModel("VendorTempOtps");
        $requestQry = explode('||', base64_decode($request));
        $id = $requestQry[1];
        $vendorTemp = $this->VendorTemps->get($id, [
            'contain' => [],
        ]);

        $validDate = $vendorTemp->valid_date->format('Y-m-d H:i:s');
        $today = date('Y-m-d H:i:s');

        if($validDate < $today) {
             //echo 'less';
        }

        if($vendorTemp->status) {
            //echo 'filled';
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $data = $this->request->getData();
            //print_r($data);
            $vendorTempOtp = $this->VendorTempOtps->find('all',['conditions' => ['vendor_temp_id' => $id], 'order' => ['id desc'], 'limit' => 1])->toArray();
            if($vendorTempOtp[0]->otp == $data['otp']) {
                echo 'match';
                return $this->redirect(['action' => 'create', $request]);
            } else {
                $this->Flash->error(__('Invalid otp'));
            }
            //print_r($vendorTempOtp);
            
        } else {
            $otp = random_int(100000, 999999);
            $data = array();

            $data['vendor_temp_id'] =$id;
            $data['otp'] =$otp;
            $data['expire_date'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' +5 minutes'));

            $t = $this->Sms->sendOTP($vendorTemp->mobile, 'Onboarding OTP :: '. $otp);

            $VendorTempOtp = $this->VendorTempOtps->newEmptyEntity();
            $vendorOtp = $this->VendorTempOtps->patchEntity($VendorTempOtp, $data);
            if ($this->VendorTempOtps->save($vendorOtp)) {
                $mailer = new Mailer('default');
                    $mailer
                        ->setTransport('smtp')
                        ->setFrom(['helpdesk@fts-pl.com' => 'FT Portal'])
                        ->setTo($vendorTemp->email)
                        ->setEmailFormat('html')
                        ->setSubject('Verify New Account otp')
                        ->deliver('Hi '.$vendorTemp->name.'<br/>OTP : ' . $otp);
            }
        }

        //print_r($vendorTemp);

        $this->set(compact('vendorTemp'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel("VendorTemps");
        $vendorTemp = $this->VendorTemps->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['buyer_id'] = $this->getRequest()->getSession()->read('adminuser.id');
            $data['valid_date'] = $stop_date = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' +1 day'));;
            $vendorTemp = $this->VendorTemps->patchEntity($vendorTemp, $data);
            //echo '<pre>'; print_r($data); exit;
            if ($this->VendorTemps->save($vendorTemp)) {

                $link = Router::url(['prefix' => false, 'controller' => 'onboarding', 'action' => 'create', base64_encode($data['email']), '_full' => true, 'escape' => true]);

                $mailer = new Mailer('default');
                $mailer
                    ->setTransport('smtp')
                    ->setFrom(['helpdesk@fts-pl.com' => 'FT Portal'])
                    ->setTo($data['email'])
                    ->setEmailFormat('html')
                    ->setSubject('Verify New Account')
                    ->deliver('Hi '.$data['name'].'<br/>Welcome to Code The Pixel.' . $link);

                $this->Flash->success(__('The vendor temp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            print_r($vendorTemp);
            exit;
            $this->Flash->error(__('The vendor could not be saved. Please, try again.'));
        }
        $purchasingOrganizations = $this->VendorTemps->PurchasingOrganizations->find('list', ['limit' => 200])->all();
        $accountGroups = $this->VendorTemps->AccountGroups->find('list', ['limit' => 200])->all();
        $schemaGroups = $this->VendorTemps->SchemaGroups->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorTemp', 'purchasingOrganizations', 'accountGroups', 'schemaGroups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Temp id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function create($request = null)
    {
        $this->loadModel("VendorTemps");
        $request = explode('||', base64_decode($request));
        $id = $request[1];
        $vendorTemp = $this->VendorTemps->get($id, [
            'contain' => [],
        ]);

        $validDate = $vendorTemp->valid_date->format('Y-m-d H:i:s');
        $today = date('Y-m-d H:i:s');

        if($validDate < $today) {
             //echo 'less';
        }

        if($vendorTemp->status) {
            //echo 'filled';
        }
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['status'] = 1;
            //echo '<pre>'; print_r($data); exit;
            $vendorTemp = $this->VendorTemps->patchEntity($vendorTemp, $data);
            if ($this->VendorTemps->save($vendorTemp)) {
                $this->Flash->success(__('The request sent for approval.'));

                return $this->redirect(['prefix' => false, 'controller' => 'users','action' => 'login']);
            }
            $this->Flash->error(__('The vendor temp could not be saved. Please, try again.'));
        }
        $purchasingOrganizations = $this->VendorTemps->PurchasingOrganizations->find('list', ['limit' => 200])->all();
        $accountGroups = $this->VendorTemps->AccountGroups->find('list', ['limit' => 200])->all();
        $schemaGroups = $this->VendorTemps->SchemaGroups->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorTemp', 'purchasingOrganizations', 'accountGroups', 'schemaGroups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Temp id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorTemp = $this->VendorTemps->get($id);
        if ($this->VendorTemps->delete($vendorTemp)) {
            $this->Flash->success(__('The vendor temp has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor temp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
