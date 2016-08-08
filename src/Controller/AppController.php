<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [

            'authorize'=> 'Controller',

            'authenticate' => [

                'Form' => [

                    'fields' => [

                        'role' => 'role',

                        'username' => 'email',

                        'password' => 'password'

                    ]

                ]

            ]

        ]);



         $this->loadComponent('AkkaFacebook.Graph', [

        'app_id' => '1718259035081270',

        'app_secret' => '1ad77e703f40f0020c08bbfe164d8c17',

        'app_scope' => 'email,public_profile', // https://developers.facebook.com/docs/facebook-login/permissions/v2.4

        'redirect_url' => Router::url( ['controller' => 'users','action' => 'login'], TRUE), // This should be enabled by default

        'post_login_redirect' => Router::url(['controller' => 'users', 'action' => 'index'], TRUE),

        'user_columns' => ['first_name' => 'first_name','middle_name' => 'middle_name', 'last_name' => 'last_name', 'username' => 'username', 'password' => 'password'] //not required

        ]);



        // Allow the display action so our pages controller
        // continues to work.

        $this->Auth->allow(['display']);

    }



    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
  
        $this->set("role",$this->Auth->user('role'));


        if($this->Auth->user('role')==1)
        {
            $this->viewBuilder()->layout('default_admin');

        }
        elseif($this->Auth->user('role')==2)
        {
            $this->viewBuilder()->layout('default_merchant');

        }
        else
        {
            $this->set("role",3);
            $this->viewBuilder()->layout('default');          

        }
        

        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }


    public function isAuthorized($user)
    {
        $this->set("role",$this->Auth->user('role'));
        return true;
    }
}
