<?php
App::uses('AppController', 'Controller');
/**
 * Vehicles Controller
 *
 * @property Vehicle $Vehicle
 * @property PaginatorComponent $Paginator
 */
class VehiclesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $helpers = array('Session');
	


/**
 * index method
 *
 * @return void
 */


	public function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->allow('view');
	}

	public function index() {
		$this->Vehicle->recursive = 0;
		$this->set('vehicles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	public function updatelist(){
		$this->autoRender = false;
		$this->loadModel('Vehicle');
		$created = $this->Vehicle->find('all');
		//debug(date("Y-m-d"));
		//debug($created);die;
		$testday = date("Y-m-d H:i:s", time() - (14*86400));
		debug($testday);
		foreach($created as $create => $v){
			if(strtotime($v['Vehicle']['created']) < strtotime($testday)){
				$v['Vehicle']['id'] = $v['Vehicle']['id'];
				$v['Vehicle']['available'] = '1';
				$this->Vehicle->save($v);
			}
		}
		$this->Session->setFlash(__('Listings have been updated.'));
		return $this->redirect(array('action' => 'index'));
	}

	public function view($id = null) {
		if (!$this->Vehicle->exists($id)) {
			throw new NotFoundException(__('Invalid vehicle'));
		}
		$options = array('conditions' => array('Vehicle.' . $this->Vehicle->primaryKey => $id));
		$this->set('vehicle', $this->Vehicle->find('first', $options));
		
		
		$group_id = $this->Session->read('Auth.User.group_id');
		$username = $this->Session->read('Auth.User.username');
		$this->set('group_id', $group_id);
		$this->set('username', $username);

		if ($this->request->is('post')) {
			$vehicle = $this->Vehicle->findById($id);
			
			if($this->request->data['Vehicle']['current_bid'] > $vehicle['Vehicle']['current_bid']){
					$this->Vehicle->create();
					$this->request->data['Vehicle']['id'] = $id;
					
					$this->request->data['Vehicle']['high_bidder'] = $username;
					if ($this->Vehicle->save($this->request->data)) {
						$this->Session->setFlash(__('Your bid has been placed.'));
						return $this->redirect(array('action' => 'view',$id));
					} else {
						$this->Session->setFlash(__('The vehicle could not be saved. Please, try again.'));
					}
				
			}else{
				$this->Session->setFlash(__('Your bid must be higher than the current bid.'));
				return $this->redirect(array('action' => 'view',$id));
			}
			
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Vehicle->create();
			if ($this->Vehicle->save($this->request->data)) {
				$this->Session->setFlash(__('The vehicle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vehicle could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Vehicle->exists($id)) {
			throw new NotFoundException(__('Invalid vehicle'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Vehicle->save($this->request->data)) {
				$this->Session->setFlash(__('The vehicle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vehicle could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Vehicle.' . $this->Vehicle->primaryKey => $id));
			$this->request->data = $this->Vehicle->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Vehicle->id = $id;
		if (!$this->Vehicle->exists()) {
			throw new NotFoundException(__('Invalid vehicle'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Vehicle->delete()) {
			$this->Session->setFlash(__('The vehicle has been deleted.'));
		} else {
			$this->Session->setFlash(__('The vehicle could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function isAuthorized($user){
		if($this->action==='add'){
			return true;
		}
		if($this->action==='updatelist'){
			return true;
		}
		return parent::isAuthorized($user);
	}
}
