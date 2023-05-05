<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * RfqInquiries Controller
 *
 * @property \App\Model\Table\RfqInquiriesTable $RfqInquiries
 * @method \App\Model\Entity\RfqInquiry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RfqInquiriesController extends AdminAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['BuyerSellerUsers'],
        ];
        $rfqInquiries = $this->paginate($this->RfqInquiries);

        $this->set(compact('rfqInquiries'));
    }

    /**
     * View method
     *
     * @param string|null $id Rfq Inquiry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rfqInquiry = $this->RfqInquiries->get($id, [
            'contain' => ['BuyerSellerUsers'],
        ]);

        $this->set(compact('rfqInquiry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rfqInquiry = $this->RfqInquiries->newEmptyEntity();
        if ($this->request->is('post')) {
            $rfqInquiry = $this->RfqInquiries->patchEntity($rfqInquiry, $this->request->getData());
            if ($this->RfqInquiries->save($rfqInquiry)) {
                $this->Flash->success(__('The rfq inquiry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfq inquiry could not be saved. Please, try again.'));
        }
        $buyerSellerUsers = $this->RfqInquiries->BuyerSellerUsers->find('list', ['limit' => 200])->all();
        $this->set(compact('rfqInquiry', 'buyerSellerUsers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rfq Inquiry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rfqInquiry = $this->RfqInquiries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rfqInquiry = $this->RfqInquiries->patchEntity($rfqInquiry, $this->request->getData());
            if ($this->RfqInquiries->save($rfqInquiry)) {
                $this->Flash->success(__('The rfq inquiry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfq inquiry could not be saved. Please, try again.'));
        }
        $buyerSellerUsers = $this->RfqInquiries->BuyerSellerUsers->find('list', ['limit' => 200])->all();
        $this->set(compact('rfqInquiry', 'buyerSellerUsers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rfq Inquiry id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rfqInquiry = $this->RfqInquiries->get($id);
        if ($this->RfqInquiries->delete($rfqInquiry)) {
            $this->Flash->success(__('The rfq inquiry has been deleted.'));
        } else {
            $this->Flash->error(__('The rfq inquiry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
