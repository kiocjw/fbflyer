<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Deals Controller
 *
 * @property \App\Model\Table\DealsTable $Deals
 */
class DealsController extends AppController
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
        if($this->Auth->user('role')=='2')
         {
            $deals = $this->paginate($this->Deals->findByUsers_id($this->Auth->user('id')));
            $this->set(compact('deals'));
            $this->set('_serialize', ['deals']);
         }
    }

    /**
     * View method
     *
     * @param string|null $id Deal id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deal = $this->Deals->get($id, [
            'contain' => ['Users', 'Merchants']
        ]);

        $this->set('deal', $deal);
        $this->set('_serialize', ['deal']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->Auth->user('role')=='2')
        {
            $deal = $this->Deals->newEntity();
            if ($this->request->is('post')) {
                $this->request->data['users_id'] =$this->Auth->user('id');
                $this->request->data['status'] =0;
                $this->request->data['purchased_number'] =0;
                $deal = $this->Deals->patchEntity($deal, $this->request->data);
                if ($this->Deals->save($deal)) {
                    $this->Flash->success(__('The deal has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The deal could not be saved. Please, try again.'));
                }
            }
            $users = $this->Deals->Users->find('list', ['limit' => 200]);
            $categories = $this->Deals->Categories->find('list', ['limit' => 200, 'valueField' => 'category']);
            //$merchants = $this->Deals->Merchants->find('list', ['limit' => 200]);
            $merchants = $this->Deals->Merchants->find('list',  array('keyField' => 'id','valueField' => 'company_name','conditions' => array('Merchants.Users_id' => $this->Auth->user('id'))));
            $this->set(compact('deal', 'users','categories', 'merchants'));
            $this->set('_serialize', ['deal']);
        }
        else
        {
            return $this->redirect(['controller' => 'users','action' => 'loginmerchant']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Deal id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deal = $this->Deals->get($id, [
            'contain' => ['Merchants']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deal = $this->Deals->patchEntity($deal, $this->request->data);
            if ($this->Deals->save($deal)) {
                $this->Flash->success(__('The deal has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The deal could not be saved. Please, try again.'));
            }
        }
        $users = $this->Deals->Users->find('list', ['limit' => 200]);
        $categories = $this->Deals->Categories->find('list', ['limit' => 200, 'valueField' => 'category']);
        //$merchants = $this->Deals->Merchants->find('list', ['limit' => 200]);
        $merchants = $this->Deals->Merchants->find('list',  array('keyField' => 'id','valueField' => 'company_name','conditions' => array('Merchants.Users_id' => $this->Auth->user('id'))));
        $this->set(compact('deal', 'users','categories', 'merchants'));
        $this->set('_serialize', ['deal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Deal id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deal = $this->Deals->get($id);
        if ($this->Deals->delete($deal)) {
            $this->Flash->success(__('The deal has been deleted.'));
        } else {
            $this->Flash->error(__('The deal could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
