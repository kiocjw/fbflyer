<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    }

    public function indexadmin($status = null)
    {
        
            $this->paginate = [
                'contain' => ['Companies']
            ];



         if($this->Auth->user('role')=='1')
         {
             if($status!=null)
             {
                $users = $this->paginate($this->Users->findAllByStatusAndRole($status,2));
             }
             else
             {
                  $users = $this->paginate($this->Users->findAllByRole(2));
             }
             $this->set(compact('users'));
             $this->set('_serialize', ['users']);
         }
         else 
         {
           
         }

        
    }

    public function editmerchant($id = null)
    {

        $user = $this->Users->get($id, [
            'contain' => ['Companies']
        ]);

        if( $user->company['users_id'] == $this->Auth->user('id'))
        { 
             
                if( $user['status']==2)
                {
                        $this->Flash->warning('Your account required rework on your info.');
                        if($user['remark'])
                            if($user['remark'] != "")
                            {
                                $this->Flash->info($user['remark']);
                            }       
                            if ($this->request->is(['patch', 'post', 'put'])) {
                                $user = $this->Users->patchEntity($user, $this->request->data);
                                $user['status']=0; 
                                if ($this->Users->save($user)) {
                                    $this->Flash->success(__('The user has been saved.'));
                                    $this->logout();
                                } else {
                                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                                }
                            }
                            $this->set(compact('user'));
                            $this->set('_serialize', ['user']);             
                }
                else
                {
                    $this->logout();
                }
            
        }
        else
        {

            return $this->redirect(['action' => 'index']);
        }

    }

    public function approveadmin($id = null) {

        if($this->Auth->user('role')=='1')
        {
            $user = $this->Users->get($id, [
                'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->data, [
                'associated' => ['Companies']
                ]);
                if ($this->Users->save($user, [ 
                    'validate' => true,
                    'associated' => ['Companies']
                ])) {
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'indexadmin']);
                } else {
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
            }
            $this->set(compact('user'));
            $this->set('_serialize', ['user']);
            if (!$this->Users->exists($id)) 
            {
                throw new NotFoundException(__('Invalid'));
            }
        }
        else
        {
            return $this->redirect(['action' => 'index']);
        }

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

     public function addmerchant()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data, [
                'associated' => ['Companies']
            ]);
            if ($this->Users->save($user, [ 
                'validate' => true,
                'associated' => ['Companies']
            ])) {
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
     /*
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
    */

    public function login()
    {
     
        $fields['role']=3;   
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'users','action' => 'index']);
                //return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }
    
    public function loginmerchant()
    {
        
        $fields['role']=2;
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) 
            {
                switch($user['status'])
                {
                    case 0:
                        $this->Flash->info('Your account still pending for approval.');
                        if($user['remark'])
                            if($user['remark'] != "")
                            {
                                $this->Flash->info($user['remark']);
                            }
                        break;
                    case 1:
                        $this->Auth->setUser($user);
                        return $this->redirect(['controller' => 'merchants','action' => 'index']);
                        break;
                    case 2:
                         $user['role']=-2;
                         $this->Auth->setUser($user);
                        return $this->redirect(['controller' => 'users','action' => 'editmerchant',$this->Auth->user('id')]);
                        break;
                    case 3:
                        $this->Flash->alert('Your account had been rejected.');
                        if($user['remark'])
                            if($user['remark'] != "")
                            {
                                $this->Flash->info($user['remark']);
                            }
                    break;
                }
                //return $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
                $this->Flash->error('Your username or password is incorrect.');
            }
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
        //return $this->redirect($this->Auth->logout());
    }

    public function initialize()
    {
        parent::initialize();
        //$this->Auth->allow(['logout', 'index']);

        $this->Auth->allow(['logout', 'add']);
        $this->Auth->allow(['logout', 'login']);

        $this->Auth->allow(['logout', 'loginmerchant']);
        $this->Auth->allow(['logout', 'addmerchant']);

    }

    public function beforeRender(Event $event)
    {
        
        $action = $this->request->params['action'];

        if (strpos($action, 'merchant') !== false) 
        {
            $this->viewBuilder()->layout('default_merchant');
        }
        elseif  (strpos($action, 'admin') !== false) 
        {
            $this->viewBuilder()->layout('default_admin');
        }
        else
        {
            $this->viewBuilder()->layout('default');
        }
    }
}
