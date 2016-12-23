<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Mailer\Email;
use App\Form\ContactForm;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 */
class ContactsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
      $emailaddress= "topkittechnology@gmail.com";
      $contact = new ContactForm();
      if ($this->request->is('post')) 
      {


                $strStatus="Success";
                $email =  new Email('default');
                $email->template('default');
            
                $email->emailFormat('html')
                      ->from(['noreply@fbflyer.com' => 'NO REPLY FBFLYER'])
                      ->to($emailaddress)
                      ->subject('Contact FBFlyer')
                      ->viewVars(['content' => 'Name:<br>'.$this->request->data['name'].'<br><br>Email:<br>'.$this->request->data['email'].'<br><br>Message:<br>'.$this->request->data['message']])
                      ->send();
                // Display the success.ctp page instead of the form again
                 $this->Flash->success(__('Your message has been sent.'));

        }
        $this->set('contact', $contact);
    }


    
    
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event); 
        $this->Auth->allow('index'); 
    }

}