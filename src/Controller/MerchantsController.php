<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Merchants Controller
 *
 * @property \App\Model\Table\MerchantsTable $Merchants
 */
class MerchantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

            $this->paginate = [
                'contain' => ['Users']
            ];



         if($this->Auth->user('role')=='1')
         {
             $merchants = $this->paginate($this->Merchants);
             $this->set(compact('merchants'));
            $this->set('_serialize', ['merchants']);
         }
         else if($this->Auth->user('role')=='2')
         {
            $merchants = $this->paginate($this->Merchants->findByUsers_id(2));
            $this->set(compact('merchants'));
            $this->set('_serialize', ['merchants']);
         }

        
    }

    /**
     * View method
     *
     * @param string|null $id Merchant id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $merchant = $this->Merchants->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('merchant', $merchant);
        $this->set('_serialize', ['merchant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $merchant = $this->Merchants->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['users_id'] =$this->Auth->user('id');
            $this->request->data['status'] =0;
            $merchant = $this->Merchants->patchEntity($merchant, $this->request->data);
            if ($this->Merchants->save($merchant)) {
                $this->Flash->success(__('The merchant has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The merchant could not be saved. Please, try again.'));
            }
        }
        $users = $this->Merchants->Users->find('list', ['limit' => 200]);
        $this->set(compact('merchant', 'users'));
        $this->set('_serialize', ['merchant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Merchant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $merchant = $this->Merchants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchant = $this->Merchants->patchEntity($merchant, $this->request->data);
            if ($this->Merchants->save($merchant)) {
                $this->Flash->success(__('The merchant has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The merchant could not be saved. Please, try again.'));
            }
        }
        $users = $this->Merchants->Users->find('list', ['limit' => 200]);
        $this->set(compact('merchant', 'users'));
        $this->set('_serialize', ['merchant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Merchant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $merchant = $this->Merchants->get($id);
        if ($this->Merchants->delete($merchant)) {
            $this->Flash->success(__('The merchant has been deleted.'));
        } else {
            $this->Flash->error(__('The merchant could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function initialize()
    {
        parent::initialize();
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if($this->Auth->user('role')==='1')
        {
            return true;
        }
        else if($this->Auth->user('role')==='2')
        {
            return true;
        }
        else{
            return false;
        }
    }
}
