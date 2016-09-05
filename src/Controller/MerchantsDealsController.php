<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MerchantsDeals Controller
 *
 * @property \App\Model\Table\MerchantsDealsTable $MerchantsDeals
 */
class MerchantsDealsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Merchants', 'Deals']
        ];
        $merchantsDeals = $this->paginate($this->MerchantsDeals);

        $this->set(compact('merchantsDeals'));
        $this->set('_serialize', ['merchantsDeals']);
    }

    /**
     * View method
     *
     * @param string|null $id Merchants Deal id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $merchantsDeal = $this->MerchantsDeals->get($id, [
            'contain' => ['Merchants', 'Deals']
        ]);

        $this->set('merchantsDeal', $merchantsDeal);
        $this->set('_serialize', ['merchantsDeal']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $merchantsDeal = $this->MerchantsDeals->newEntity();
        if ($this->request->is('post')) {
            $merchantsDeal = $this->MerchantsDeals->patchEntity($merchantsDeal, $this->request->data);
            if ($this->MerchantsDeals->save($merchantsDeal)) {
                $this->Flash->success(__('The merchants deal has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The merchants deal could not be saved. Please, try again.'));
            }
        }
        $merchants = $this->MerchantsDeals->Merchants->find('list', ['limit' => 200]);
        $deals = $this->MerchantsDeals->Deals->find('list', ['limit' => 200]);
        $this->set(compact('merchantsDeal', 'merchants', 'deals'));
        $this->set('_serialize', ['merchantsDeal']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Merchants Deal id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $merchantsDeal = $this->MerchantsDeals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchantsDeal = $this->MerchantsDeals->patchEntity($merchantsDeal, $this->request->data);
            if ($this->MerchantsDeals->save($merchantsDeal)) {
                $this->Flash->success(__('The merchants deal has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The merchants deal could not be saved. Please, try again.'));
            }
        }
        $merchants = $this->MerchantsDeals->Merchants->find('list', ['limit' => 200]);
        $deals = $this->MerchantsDeals->Deals->find('list', ['limit' => 200]);
        $this->set(compact('merchantsDeal', 'merchants', 'deals'));
        $this->set('_serialize', ['merchantsDeal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Merchants Deal id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $merchantsDeal = $this->MerchantsDeals->get($id);
        if ($this->MerchantsDeals->delete($merchantsDeal)) {
            $this->Flash->success(__('The merchants deal has been deleted.'));
        } else {
            $this->Flash->error(__('The merchants deal could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
