<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ShoppingCarts Controller
 *
 * @property \App\Model\Table\ShoppingCartsTable $ShoppingCarts
 */
class ShoppingCartsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $shoppingCarts = $this->ShoppingCarts->find('all', array('conditions' => array('ShoppingCarts.users_id' =>$this->Auth->user('id'))))->contain([
             'Users', 'Deals'
            ]);

        $points=$this->Auth->user('points');

        $this->set(compact('points','shoppingCarts'));
        $this->set('_serialize', ['points','shoppingCarts']);
    }

    /**
     * View method
     *
     * @param string|null $id Shopping Cart id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shoppingCart = $this->ShoppingCarts->get($id, [
            'contain' => ['Users', 'Deals']
        ]);

        $this->set('shoppingCart', $shoppingCart);
        $this->set('_serialize', ['shoppingCart']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shoppingCart = $this->ShoppingCarts->newEntity();
        if ($this->request->is('post')) {
            $this->loadModel('Deals');
          
            $deals = $this->Deals->findById($this->request->data['deals_id']);
            $deal = $deals->first();
            $ShoppingCarts = $this->ShoppingCarts->find('all', array('conditions'=>array('ShoppingCarts.users_id' =>$this->Auth->user('id'),'ShoppingCarts.deals_id' =>$deal['id'])));
            $numShoppingCarts = sizeof($ShoppingCarts);
            if(!$deals->isEmpty())
            {
                $this->request->data['users_id']=$this->Auth->user('id');
                if($numShoppingCarts>0)
                {
                    $shoppingCart = $ShoppingCarts->first();
                    $this->request->data['quantity']=$shoppingCart['quantity']+1;
                }
                else
                {
                     $this->request->data['quantity']=1;
                }
                $shoppingCart = $this->ShoppingCarts->patchEntity($shoppingCart, $this->request->data);

                if ($this->ShoppingCarts->save($shoppingCart)) {
                    $this->Flash->success(__('The shopping cart has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The shopping cart could not be saved. Please, try again.'));
                }
            }
        }
        $users = $this->ShoppingCarts->Users->find('list', ['limit' => 200]);
        $deals = $this->ShoppingCarts->Deals->find('list', ['limit' => 200]);
        $this->set(compact('shoppingCart', 'users', 'deals'));
        $this->set('_serialize', ['shoppingCart']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shopping Cart id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $quantity = null)
    {
        $shoppingCart = $this->ShoppingCarts->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shoppingCart = $this->ShoppingCarts->patchEntity($shoppingCart, $this->request->data);
            if ($this->ShoppingCarts->save($shoppingCart)) {
                $this->Flash->success(__('The shopping cart has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The shopping cart could not be saved. Please, try again.'));
            }
        }
        $users = $this->ShoppingCarts->Users->find('list', ['limit' => 200]);
        $deals = $this->ShoppingCarts->Deals->find('list', ['limit' => 200]);
        $this->set(compact('shoppingCart', 'users', 'deals'));
        $this->set('_serialize', ['shoppingCart']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shopping Cart id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shoppingCart = $this->ShoppingCarts->get($id);
        if ($this->ShoppingCarts->delete($shoppingCart)) {
            $this->Flash->success(__('The shopping cart has been deleted.'));
        } else {
            $this->Flash->error(__('The shopping cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
