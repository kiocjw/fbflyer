<?php
namespace App\Controller;

use App\Controller\AppController;
use App\View\Helper\CouponHelper;
//use Cake\View\Helper\CouponHelper;

use Cake\Mailer\Email;
use Cake\Core\Configure;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;


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
        
        if ($this->request->is('post')) 
        {
            
            $clientId = Configure::read('PayPal.clientId');
            $clientSecret = Configure::read('PayPal.clientSecret');

            $apiContext = getApiContext($clientId, $clientSecret);

            // ### Payer
            // A resource representing a Payer that funds a payment
            // For paypal account payments, set payment method
            // to 'paypal'.
            $payer = new Payer();
            $payer->setPaymentMethod("paypal");

            // ### Itemized information
            // (Optional) Lets you specify item wise
            // information
            $item1 = new Item();         
            $itemList = new ItemList();
            $details = new Details();
            // ### Amount
            // Lets you specify a payment amount.
            // You can also specify additional details
            // such as shipping, tax.
            $amount = new Amount();
            $this->loadModel('Deals');
            $deal = $this->Deals->findById($this->request->data['deals_id']);
          
            if(!$deal->isEmpty())
            {
                    $current_deal = $deal->first();
                    if($current_deal->status==0)
                    {
                         $item1->setName($current_deal->title)
                        ->setCurrency('MYR')
                        ->setQuantity(1)
                        ->setSku($current_deal->id) // Similar to `item_number` in Classic API
                        ->setPrice($current_deal->promo_price);

                        $itemList->setItems(array($item1));


                        $details->setSubtotal($current_deal->promo_price);
                        //->setShipping(0)
                        //->setTax(0)

 
                        $amount->setCurrency("MYR")
                            ->setTotal($current_deal->promo_price)
                            ->setDetails($details);
                    }
            }

            // ### Transaction
            // A transaction defines the contract of a
            // payment - what is the payment for and who
            // is fulfilling it. 
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription("Payment description")
                ->setInvoiceNumber(uniqid());

            // ### Redirect urls
            // Set the urls that the buyer must be redirected to after 
            // payment approval/ cancellation.
            $baseUrl = getBaseUrl();
            $baseUrl= str_replace("webroot","",$baseUrl);
            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl($baseUrl."vouchers/ExecutePayment?success=true")
                ->setCancelUrl($baseUrl."vouchers/ExecutePayment?success=false");

            // ### Payment
            // A Payment Resource; create one using
            // the above types and intent set to 'sale'
            $payment = new Payment();
            $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));


            // For Sample Purposes Only.
            $request = clone $payment;

            // ### Create Payment
            // Create a payment by calling the 'create' method
            // passing it a valid apiContext.
            // (See bootstrap.php for more on `ApiContext`)
            // The return object contains the state and the
            // url to which the buyer must be redirected to
            // for payment approval
            try {
                $payment->create($apiContext);
            } catch (Exception $ex) {
                // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                $this->Flash->error(__("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex));
                exit(1);
            }

            // ### Get redirect url
            // The API response provides the url that you must redirect
            // the buyer to. Retrieve the url from the $payment->getApprovalLink()
            // method
            $approvalUrl = $payment->getApprovalLink();

            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            //$this->Flash->success("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);

            return $this->redirect($approvalUrl);
            
        }
        //$deals = $this->Vouchers->Deals->find('list', ['limit' => 200]);
        // $this->set(compact('voucher', 'deals'));
        //$this->set('_serialize', ['voucher']);
    }


    public function ExecutePayment()
    {

        // ### Approval Status
        // Determine if the user approved the payment or not
        if (isset($_GET['success']) && $_GET['success'] == 'true') {

                $clientId = Configure::read('PayPal.clientId');
                $clientSecret = Configure::read('PayPal.clientSecret');

                /**
                 * All default curl options are stored in the array inside the PayPalHttpConfig class. To make changes to those settings
                 * for your specific environments, feel free to add them using the code shown below
                 * Uncomment below line to override any default curl options.
                 */
                //PayPalHttpConfig::$defaultCurlOptions[CURLOPT_SSLVERSION] = CURL_SSLVERSION_TLSv1_2;


                /** @var \Paypal\Rest\ApiContext $apiContext */
                $apiContext = getApiContext($clientId, $clientSecret);
                // Get the payment Object by passing paymentId
                // payment id was previously stored in session in
                // CreatePaymentUsingPayPal.php
                $paymentId = $_GET['paymentId'];
                $payment = Payment::get($paymentId, $apiContext);

                // ### Payment Execute
                // PaymentExecution object includes information necessary
                // to execute a PayPal account payment.
                // The payer_id is added to the request query parameters
                // when the user is redirected from paypal back to your site
                $execution = new PaymentExecution();
                $execution->setPayerId($_GET['PayerID']);

                try {
                    // Execute the payment
                    // (See bootstrap.php for more on `ApiContext`)
                    $result = $payment->execute($execution, $apiContext);

                    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                    //$this->Flash->success("Executed Payment id: ".$payment->getId());          

                    try {
                        $payment = Payment::get($paymentId, $apiContext);
                    } catch (Exception $ex) {
                        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                        $this->Flash->error(__("Get Payment Error: ".$ex));
                        exit(1);
                    }
                } catch (Exception $ex) {
                    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                    $this->Flash->error(__("Executed Payment Error: ".$ex));
                    exit(1);
                }

                // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                //$this->Flash->success(__("Get Payment id: ".$payment->getId()));
                    
                $transactions = $payment->getTransactions();
                $transaction = $transactions[0];
                $itemList = $transaction->getItemList();
                $items = $itemList->getItems();
                $item = $items[0];

                $deals_id=$item->sku;
                $CouponH = new CouponHelper(new \Cake\View\View());
                $code=$CouponH->generate(array("length"=>8, "numbers"=>True, "letters"=>True)); 
            
                $voucher = $this->Vouchers->newEntity();
                $voucher->code = $code.'-'.sprintf('%04u', $deals_id);
                $voucher->status=0;
                $voucher->users_id=$this->Auth->user('id');
                $voucher->deals_id=$deals_id;
                if ($this->Vouchers->save($voucher)) {
                    //$this->Flash->success(__('The voucher has been saved.'));
                    $image = file_get_contents('https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl='.$code.'&chld=L|1&choe=UTF-8'); 
                
                    file_put_contents('files/Vouchers/'.$voucher->id.'.png',$image);
                    $baseUrl = getBaseUrl();
                    $baseUrl= str_replace("/webroot","",$baseUrl);
                    $this->emailuservoucher($this->Auth->user('username'), $this->Auth->user('email'), $voucher->status, $baseUrl.Router::url(['action' => 'view', $voucher->id, '_ext' => 'pdf']));
                    return $this->redirect(['action' => 'view', $voucher->id, '_ext' => 'pdf']);
                } else {
                    $this->Flash->error(__('The voucher could not be saved. Please, try again.'));
                }
                //return $payment;
            } 
            else 
            {
                // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                $this->Flash->error(__("User Cancelled the Approval"));
                return $this->redirect(['controller' => 'users', 'action' => 'index']);
                //exit;
            }
    }


    public function emailuservoucher($username =null, $emailaddress= null, $status = null, $link = null){
        try 
        {
            $strStatus="Success";
            $email =  new Email('default');
            $email->template('voucher');
            
            $email->emailFormat('html')
                  ->from(['noreply@fbflyer.com' => 'NO REPLY FBFLYER'])
                  ->to($emailaddress)
                  ->subject(sprintf('[%s] Thank you for purchase from FBFlyer',$strStatus))
                  ->viewVars(['voucher' => ['username' => $username, 'link' => $link]])
                  ->send();
                   //$this->Flash->success(__('Email has been sent.'));

        } 
        catch (Exception $e) {

            $this->Flash->error('Exception : '+  $e->getMessage()+"\n");

        }
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
                                'contain' => ['Deals']
                            ]);

                            $v->status=1;                             
                            if ($this->Vouchers->save($v)) {
                                $this->Flash->success(__("Successfully redeemed."));
                                $deal = $this->Vouchers->Deals->get($voucher->deals_id);
                                $this->Flash->info(__($deal->title));
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
