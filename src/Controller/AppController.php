<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;
use Cake\I18n\Date;
use Cake\Core\Configure;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{


    public $helpers = [
        'AkkaCKEditor.CKEditor' => [
        'version' => '4.4.7', // Default Option
        'distribution' => 'full' // Default Option / Other options => 'basic', 'standard', 'standard-all', 'full-all'
    ],
        'DataTables' => [
            //'className' => 'DataTables.DataTables'
        ]];

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
        $this->loadComponent('DataTables.DataTables');
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
		             'loginRedirect' => [
			     'controller' => 'Iniciativa',
			     'action' => 'index'
			     ],
			     'logoutRedirect' => [
			     'controller' => 'Pages',
			     'action' => 'Users',
			                 'login'
				]
				]);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }


          public function beforeFilter(Event $event)
	     {

             $this->Auth->allow(['login', 'lista', 'vista','detalle', 'dictamenes']);
	  
	  }


    public function beforeRender(Event $event)
    {
        //$this->viewBuilder()->theme('Gentelella');
        $this->set('theme', Configure::read('Theme'));

        // $this->viewBuilder()->setTheme('AdminLTE');

		    // Before of CakePHP 3.5
		//     $this->viewBuilder()->theme('AdminLTE');
     }
}
