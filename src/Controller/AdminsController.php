<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class AdminsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($status = null)
    {
        if($status==null)
        {
            return $this->redirect(['controller' => 'admins', 'action' => 'index']);
        }
        else
        {
            return $this->redirect(['controller' => 'users', 'action' => 'indexadmin',$status]);
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if($this->Auth->user('role')=='1')
        {
            return $this->redirect(['controller' => 'admins', 'action' => 'index']);
        }

        $fields['role']=1;
        if ($this->request->is('post')) 
        {
            $user = $this->Auth->identify();
            if ($user) 
            {
                $this->Auth->setUser($user);
                //return $this->redirect(['controller' => 'admins', 'action' => 'index']);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        $role = $this->Auth->user('role');
        $role = $role <= 0 ? -$role : $role ;
        
        if($role==1)
        {
        $this->Auth->logout();
        return $this->redirect(['controller' => 'admins','action' => 'login']);
        }
        elseif($role==2)
        {
        $this->Auth->logout();
        return $this->redirect(['controller' => 'users','action' => 'loginmerchant']);
        }
        else
        {
        $this->Auth->logout();
        return $this->redirect(['controller' => 'users','action' => 'index']);
        }
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'add']);
        $this->Auth->allow(['logout', 'login']);
       
    }

   
    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->layout('default_admin');
    }



}
