<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Mailer\Email;

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
            $category = null;
            $text = null;

            if (isset($_GET['title'])) {
                $text =$_GET['title'];
            }

            if(isset($_GET['category'])){  
                $category = $_GET['category'];
            }

            $this->paginate = [
                'contain' => ['Users']
            ];
            #if($this->Auth->user('role')=='3')
            #{
                $this->loadModel('Deals');
                if($text != null)
                {
                    if($category!=null)
                    {
                        $deals = $this->paginate($this->Deals->find('all', array('conditions' => array('Deals.title LIKE' => "%". $text ."%", 'Deals.categories_id' => $category))));
                    }
                    else
                    {
                        $deals = $this->paginate($this->Deals->find('all', array('conditions' => array('Deals.title LIKE' => "%". $text ."%"))));
                    }
                }
                else
                {
                    if($category!=null)
                    {
                        $deals = $this->paginate($this->Deals->findAllByCategories_id($category));
                    }
                    else
                    {
                        $deals = $this->paginate($this->Deals->find('all'));
                    }
                }
                $this->set(compact('deals'));
                $this->set('_serialize', ['deals']);
            #}
            #else
            #{
                #return $this->redirect(['controller' => 'users','action' => 'login']);
            #}
        
    }

    public function result()
    {
            $category = null;
            $text = null;

            if (isset($_GET['title'])) {
                $text =$_GET['title'];
            }

            if(isset($_GET['category'])){  
                $category = $_GET['category'];
            }

            $this->paginate = [
                'contain' => ['Users']
            ];
            #if($this->Auth->user('role')=='3')
            #{
                $this->loadModel('Deals');
                if($text != null)
                {
                    if($category!=null)
                    {
                        $deals = $this->paginate($this->Deals->find('all', array('conditions' => array('Deals.title LIKE' => "%". $text ."%", 'Deals.categories_id' => $category))));
                    }
                    else
                    {
                        $deals = $this->paginate($this->Deals->find('all', array('conditions' => array('Deals.title LIKE' => "%". $text ."%"))));
                    }
                }
                else
                {
                    if($category!=null)
                    {
                        $deals = $this->paginate($this->Deals->findAllByCategories_id($category));
                    }
                    else
                    {
                        $deals = $this->paginate($this->Deals->find('all'));
                    }
                }
                $this->set(compact('deals'));
                $this->set('_serialize', ['deals']);
            #}
            #else
            #{
                #return $this->redirect(['controller' => 'users','action' => 'login']);
            #}
        
    }
    public function view($id = null)
    {
            #if($this->Auth->user('role')=='3')
            #{
                $this->loadModel('Deals');

                $deal = $this->Deals->get($id, [
                    'contain' => ['Users', 'Merchants']
                ]);

                $this->set('deal', $deal);
                $this->set('_serialize', ['deal']);
            #}
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
                'contain' => ['Companies']
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->data, [
                'associated' => ['Companies']
                ]);
                if ($this->Users->save($user, [ 
                    'validate' => true,
                    'associated' => ['Companies']
                ])) {
                    $this->emailapproveadmin($user->company['company_name'], $user['email'], $user['status'], $user['remark']);
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

    public function emailapproveadmin($username =null, $emailaddress= null, $status = null, $remark = null){
        try 
        {
            $strStatus="";
            $email =  new Email('default');
            switch($status)
            {
                case 0:
                $email->template('pending');
                $strStatus="PENDING";
                break;
                case 1:
                $email->template('approved');
                $strStatus="APPROVED";
                break;
                case 2:
                $email->template('reworked');
                $strStatus="REWORD REQUIRED";
                break;
                case 3:
                $email->template('rejected');
                $strStatus="REJECTED";
                break;

            }
            
            $email->emailFormat('html')
                  ->from(['noreply@fbflyer.com' => 'NO REPLY FBFLYER'])
                  ->to($emailaddress)
                  ->subject(sprintf('[%s] Thank you for joining FBFlyer',$strStatus))
                  ->viewVars(['user' => ['username' => $username, 'remark' => $remark]])
                  ->send();
                   //$this->Flash->success(__('Email has been sent.'));

        } 
        catch (Exception $e) {

            $this->Flash->error('Exception : '+  $e->getMessage()+"\n");

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
                $this->emailapproveadmin($user->company['company_name'], $user['email'], $user['status'], $user['remark']);
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else 
            {
                if($user->errors()){
                     // This shows all the error messages except the one specified in the  buildRules for unique email.
                     
                    foreach($user->errors()as $row)
                    {
                        foreach($row as $key => $val)
                        {
                            if(!is_array($val))
                            {
                                $this->Flash->error(__($val)); 
                            }
                            else
                            {
                                $this->Flash->error(__('The user could not be saved. Please, try again.'));
                            }
                        }
                    }
                  }
                  else
                  {
                       $this->Flash->error(__('The user could not be saved. Please, try again.'));
                  }
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
        $this->Auth->allow(['logout']);

        $this->Auth->allow(['add']);
        $this->Auth->allow(['login']);

        $this->Auth->allow(['loginmerchant']);
        $this->Auth->allow(['addmerchant']);

    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event); 
        $this->Auth->allow('index'); 
        $this->Auth->allow('result'); 
        $this->Auth->allow('view');
        $this->set("role",$this->Auth->user('role'));
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
            $this->loadModel('Categories');
            $categories = $this->Categories->find('list',  ['limit' => 200, 'valueField' => 'category']);
            $this->set(compact('categories'));
            $this->viewBuilder()->layout('default');
        }
    }
}
