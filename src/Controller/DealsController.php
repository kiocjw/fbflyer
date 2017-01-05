<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

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

    public function viewadmin($id = null)
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
            $deal['status']=0; 
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

    public function indexadmin($status = null)
    {
        
            $this->paginate = [
                'contain' => ['Users']
            ];



         if($this->Auth->user('role')=='1')
         {
             if($status!=null)
             {
                $deals = $this->paginate($this->Deals->findAllByStatus($status));
             }
             else
             {
                $deals = $this->paginate($this->Deals);
             }
             $this->set(compact('deals'));
             $this->set('_serialize', ['deals']);
         }
         else 
         {
           
         }

        
    }

    public function approveadmin($id = null) {

        if($this->Auth->user('role')=='1')
        {
            $deal = $this->Deals->get($id, [
                'contain' => ['Users']
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $deal = $this->Deals->patchEntity($deal, $this->request->data, [
                'associated' => ['Users']
                ]);
                if ($this->Deals->save($deal, [ 
                    'validate' => true,
                    'associated' => ['Users']
                ])) {
                    $this->emailapproveadmin("[".$deal['id']."] ".$deal['title'], $deal->user['email'], $deal['status'], $deal['remark']);
                    $this->Flash->success(__('The deal has been saved.'));
                    return $this->redirect(['controller' => 'deals', 'action' => 'indexadmin']);
                } else {
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
            }
            $this->set(compact('deal'));
            $this->set('_serialize', ['deal']);
            if (!$this->Deals->exists($id)) 
            {
                throw new NotFoundException(__('Invalid'));
            }
        }
        else
        {
            return $this->redirect(['action' => 'index']);
        }

    }

    public function emailapproveadmin($title =null, $emailaddress= null, $status = null, $remark = null){
        try 
        {
            $strStatus="";
            $email =  new Email('default');
            switch($status)
            {
                case 0:
                $email->template('deal');
                $strStatus="PENDING";
                break;
                case 1:
                $email->template('deal');
                $strStatus="APPROVED";
                break;
                case 2:
                $email->template('deal');
                $strStatus="REWORD REQUIRED";
                break;
                case 3:
                $email->template('deal');
                $strStatus="REJECTED";
                break;

            }
            
            $email->emailFormat('html')
                  ->from(['noreply@fbflyer.com' => 'NO REPLY FBFLYER'])
                  ->to($emailaddress)
                  ->subject(sprintf('[%s] Your Deal Submission',$strStatus))
                  ->viewVars(['deal' => ['title' => $title, 'remark' => $remark]])
                  ->send();
                   //$this->Flash->success(__('Email has been sent.'));

        } 
        catch (Exception $e) {

            $this->Flash->error('Exception : '+  $e->getMessage()+"\n");

        }
    }
}
