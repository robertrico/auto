<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppHelper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class LoggedHelper extends AppHelper {
	public $helpers = array('Html','Form','Session');
	public function check($user){
		if (!$user){
			echo $this->Html->link('Login',array('controller'=>'users','action'=>'login'));
		}else{
			echo $this->Html->link('Logout',array('controller'=>'users','action'=>'logout'));
		}
				
	}

	public function bidcheck($user,$vehicle){
		
		if($user['User']['group_id'] && $vehicle['Vehicle']['available'] == 0){
			echo $this->Form->create('Vehicle',array('onsubmit'=>'return check()'));
			echo '<fieldset>';
			echo '<legend>';
			echo "Place Bid"; 
			echo '</legend>';
			echo '<b style="color:grey;font-size:15px;"><i>';
			echo 'Username</br>'; 
			echo '</i></b>'; 
			echo '<b style="color:blue;font-size:25px;"><i>';
			echo $user['User']['username']; 
			echo '</i></b>';
			echo $this->Form->input('current_bid',array('label'=>'Bid Amount'));
			echo '</fieldset>';
			echo $this->Form->end(__('Place Bid')); 
		}
		else if($vehicle['Vehicle']['available'] == 1) {
			echo "This vehicle has been sold.";
		}
		else{
			echo "Please login to place a bid.";
		}
	}
}

