<?php
namespace App\Controller;

use App\Controller\AppController;
use App\View\Helper\CouponHelper;
//use Cake\View\Helper\CouponHelper;


/**
 * Vouchers Controller
 *
 * @property \App\Model\Table\VouchersTable $Vouchers
 */
class VouchersController extends AppController
{

     public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Deals']
        ];
        $vouchers = $this->paginate($this->Vouchers);

        $this->set(compact('vouchers'));
        $this->set('_serialize', ['vouchers']);
    }

    /**
     * View method
     *
     * @param string|null $id Voucher id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
         
            $voucher = $this->Vouchers->get($id, [
                    'contain' => ['Deals']
                ]);
            
            if($voucher->users_id ==$this->Auth->user('id'))
            {
                $this->viewBuilder()->options([
                    'pdfConfig' => [
                        'orientation' => 'portrait',
                        'filename' => 'Voucher_' . $id
                    ]
                ]);
            
                $this->set('voucher', $voucher);
            }
            else
            {
                return $this->redirect(['controller' => 'users', 'action' => 'index']);
            }
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $voucher = $this->Vouchers->newEntity();
        if ($this->request->is('post')) {
            //$this->request->data['deals_id'] =$deals_id;
            $this->request->data['users_id'] =$this->Auth->user('id');
            $CouponH = new CouponHelper(new \Cake\View\View());
            $code=$CouponH->generate(array("length"=>8, "numbers"=>True, "letters"=>True)); 
            
            $this->request->data['code'] =$code.'-'.sprintf('%04u', $this->request->data['deals_id']);
            $this->request->data['status'] =0;
            $voucher = $this->Vouchers->patchEntity($voucher, $this->request->data);
            if ($this->Vouchers->save($voucher)) {
                //$this->Flash->success(__('The voucher has been saved.'));
                $image = file_get_contents('https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl='.$code.'&chld=L|1&choe=UTF-8'); 
                
                file_put_contents('files/Vouchers/'.$voucher->id.'.png',$image);
                return $this->redirect(['action' => 'view', $voucher->id, '_ext' => 'pdf']);
            } else {
                $this->Flash->error(__('The voucher could not be saved. Please, try again.'));
            }
        }
        $deals = $this->Vouchers->Deals->find('list', ['limit' => 200]);
        $this->set(compact('voucher', 'deals'));
        $this->set('_serialize', ['voucher']);
    }

    public function redeem()
    {
        if($this->Auth->user('role')=='2')
        {
            if ($this->request->is('post')) {
            
            
                $vouchers = $this->Vouchers->findByCode($this->request->data['code']);
                //$vouchers = $this->Vouchers->find('all',  array('keyField' => 'id','valueField' => 'code','conditions' => array('Vouchers.Users_id' => $this->Auth->user('id'))));
                $vouchers->matching('Deals', function ($q) {
                    return $q->where(['Deals.Users_id' => $this->Auth->user('id')]);
                });
                if(!$vouchers->isEmpty())
                {
                   $voucher = $vouchers->first();
                    if($voucher->status==0)
                    {
                        if($this->request->data['btn'] == 'Validate') 
                        {
                            $this->Flash->success(__("This is Valid Voucher Code."));     
                        }
                        elseif($this->request->data['btn'] == 'Redeem') 
                        {
                            $v = $this->Vouchers->get($voucher->id, [
                                'contain' => []
                            ]);

                            $v->status=1;                             
                            if ($this->Vouchers->save($v)) {
                                $this->Flash->success(__("Successfully redeemed."));
                            } else {
                                $this->Flash->error(__('Fail to redeeem this voucher.'));
                            }
                        
                        }
                    }
                    else
                    {
                        $this->Flash->error(__('Voucher had been redeemed!'));
                    }
            }
                else
                {
                    $this->Flash->error(__('Invalid Voucher Code!'));
                }
            }
        }
        else
        {
            return $this->redirect(['controller' => 'users', 'action' => 'index']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Voucher id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $voucher = $this->Vouchers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $voucher = $this->Vouchers->patchEntity($voucher, $this->request->data);
            if ($this->Vouchers->save($voucher)) {
                $this->Flash->success(__('The voucher has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The voucher could not be saved. Please, try again.'));
            }
        }
        $deals = $this->Vouchers->Deals->find('list', ['limit' => 200]);
        $this->set(compact('voucher', 'deals'));
        $this->set('_serialize', ['voucher']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Voucher id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $voucher = $this->Vouchers->get($id);
        if ($this->Vouchers->delete($voucher)) {
            $this->Flash->success(__('The voucher has been deleted.'));
        } else {
            $this->Flash->error(__('The voucher could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
