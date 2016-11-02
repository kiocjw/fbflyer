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
            

            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => 'Voucher_' . $id
                ]
            ]);
            $this->set('voucher', $voucher);
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
                $this->Flash->success(__('The voucher has been saved.'));
                $image = file_get_contents('https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl='.$code.'&chld=L|1&choe=UTF-8'); 
                $this->Flash->success(__($voucher->id));
                file_put_contents('files\\Vouchers\\'.$voucher->id.'.png',$image);
                return $this->redirect(['action' => 'view', $voucher->id, '_ext' => 'pdf']);
            } else {
                $this->Flash->error(__('The voucher could not be saved. Please, try again.'));
            }
        }
        $deals = $this->Vouchers->Deals->find('list', ['limit' => 200]);
        $this->set(compact('voucher', 'deals'));
        $this->set('_serialize', ['voucher']);
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
