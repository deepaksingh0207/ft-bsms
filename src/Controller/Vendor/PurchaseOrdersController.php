<?php
declare(strict_types=1);

namespace App\Controller\Vendor;
use Cake\View\Helper\HtmlHelper; 

/**
 * PoHeaders Controller
 *
 * @property \App\Model\Table\PoHeadersTable $PoHeaders
 * @method \App\Model\Entity\PoHeader[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchaseOrdersController extends VendorAppController
{
    var $uses = array('PoHeaders', 'DeliveryDetails');
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    { 
        $this->loadModel('PoHeaders');
        $session = $this->getRequest()->getSession();
        $poHeaders = $this->paginate($this->PoHeaders->find()->where(['sap_vendor_code' => $session->read('vendor_code')]));

        $this->set(compact('poHeaders'));
    }

    /**
     * View method
     *
     * @param string|null $id Po Header id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('PoHeaders');
        $poHeader = $this->PoHeaders->get($id, [
            'contain' => ['PoFooters'=>'DeliveryDetails'],
        ]);

        //echo '<pre>'; print_r($poHeader); exit;

        $this->set(compact('poHeader'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $poHeader = $this->PoHeaders->newEmptyEntity();
        if ($this->request->is('post')) {
            $poHeader = $this->PoHeaders->patchEntity($poHeader, $this->request->getData());
            if ($this->PoHeaders->save($poHeader)) {
                $this->Flash->success(__('The po header has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The po header could not be saved. Please, try again.'));
        }
        $this->set(compact('poHeader'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Po Header id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $poHeader = $this->PoHeaders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $poHeader = $this->PoHeaders->patchEntity($poHeader, $this->request->getData());
            if ($this->PoHeaders->save($poHeader)) {
                $this->Flash->success(__('The record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The po header could not be saved. Please, try again.'));
        }
        $this->set(compact('poHeader'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Po Header id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $poHeader = $this->PoHeaders->get($id);
        if ($this->PoHeaders->delete($poHeader)) {
            $this->Flash->success(__('The po header has been deleted.'));
        } else {
            $this->Flash->error(__('The po header could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function adddelivery()
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel("DeliveryDetails");
        //echo '<pre>'; print_r($this->request->getData()); exit;
        if ($this->request->is(['patch', 'post', 'put'])) {
            try{
                $DeliveryDetail = $this->DeliveryDetails->newEmptyEntity();
                $DeliveryDetail = $this->DeliveryDetails->patchEntity($DeliveryDetail, $this->request->getData());
                if ($this->DeliveryDetails->save($DeliveryDetail)) {
                    $response['status'] = 'success';
                    $response['message'] = 'Record save successfully';
                }
            } catch (\Exception $e) {
                $response['status'] = 'fail';
                $response['message'] = $e->getMessage();
            }
        }

        echo json_encode($response);
    }


    public function getDeliveryDetails($id = null)
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel("DeliveryDetails");
        $data = $this->DeliveryDetails->find('all', ['conditions' => ['po_footer_id' => $id]]);

        $html = '';

        if($data->count() > 0) {
            $html .= '<table class="table table-bordered table-hover" id="example1">
            <thead>
                    <tr>
                        <th>Challan No</th>
                        <th>Qty</th>
                        <th>Eway Bill No.</th>
                        <th>Einvoice No</th>
                        <th class="actions">Actions</th>
                    </tr>
            </thead>
            <tbody>';
            $totalQty = 0;
            foreach($data as $row) {
                $totalQty = $totalQty + $row->qty;
                
                $html .= "<tr>
                            <td>$row->challan_no</td>
                            <td>$row->qty</td>
                            <td>$row->eway_bill_no</td>
                            <td>$row->einvoice_no</td>
                            <td class=\"actions\">
                                
                            </td>
                        </tr>";
            
            }

            $html .= "</tbody>
            </table>

            <div>Delivered Qty :$totalQty </div>";

            $response['status'] = 'success';
            $response['message'] = 'sucees';
            $response['html'] = $html;

        } else {
            $response['status'] = 'fail';
            $response['message'] = 'no record found';
        }
        

        //echo '<pre>'; print_r($data); exit;
        

        echo json_encode($response);
    }

    public function getSchedules($id = null)
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel("PoItemSchedules");
        $data = $this->PoItemSchedules->find('all', ['conditions' => ['po_footer_id' => $id]]);

        $html = '';


        if($data->count() > 0) {
            $html .= '<table class="table table-bordered table-hover" id="example2">
            <thead>
                    <tr>
                        <th>Required Qty</th>
                        <th>Delivery Date</th>
                        <th class="actions">Actions</th>
                    </tr>
            </thead>
            <tbody>';
            $totalQty = 0;
            foreach($data as $row) {
                
                //$link = $this->Html->link(__('Dispatch'), "#", ['class' => 'dispatch_item', 'data-toggle'=> "modal", 'data-target' => "#exampleModal" ,'header-id' => $row->po_header_id, 'footer-id' => $id, 'schedule-id' => $row->id]);
                //echo $link; exit;
                $html .= "<tr>
                            <td>$row->actual_qty</td>
                            <td>$row->delivery_date</td>
                            <td class=\"actions\">
                                <a href='#' class='dispatch_item' data-toggle='modal' data-target='#exampleModal' header-id='$row->po_header_id'  footer-id='$id' schedule-id='$row->id'>Dispatch</a>
                            </td>
                        </tr>";
            
            }

            $html .= "</tbody>
            </table>";

            $response['status'] = 'success';
            $response['message'] = 'success';
            $response['html'] = $html;

        } else {
            $response['status'] = 'fail';
            $response['message'] = 'No schedules';
        }
        

        //echo '<pre>'; print_r($data); exit;
        

        echo json_encode($response);
    }
}
