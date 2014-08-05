<?php
App::uses('AppController', 'Controller');
/**
 * Bids Controller
 *
 * @property Bid $Bid
 * @property PaginatorComponent $Paginator
 */
class BidsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Bid->recursive = 0;
		$this->set('bids', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bid->exists($id)) {
			throw new NotFoundException(__('Invalid bid'));
		}
		$options = array('conditions' => array('Bid.' . $this->Bid->primaryKey => $id));
		$this->set('bid', $this->Bid->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bid->create();
			if ($this->Bid->save($this->request->data)) {
				$this->Session->setFlash(__('The bid has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bid could not be saved. Please, try again.'));
			}
		}
		$vehicles = $this->Bid->Vehicle->find('list');
		$this->set(compact('vehicles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Bid->exists($id)) {
			throw new NotFoundException(__('Invalid bid'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Bid->save($this->request->data)) {
				$this->Session->setFlash(__('The bid has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bid could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Bid.' . $this->Bid->primaryKey => $id));
			$this->request->data = $this->Bid->find('first', $options);
		}
		$vehicles = $this->Bid->Vehicle->find('list');
		$this->set(compact('vehicles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Bid->id = $id;
		if (!$this->Bid->exists()) {
			throw new NotFoundException(__('Invalid bid'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Bid->delete()) {
			$this->Session->setFlash(__('The bid has been deleted.'));
		} else {
			$this->Session->setFlash(__('The bid could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
