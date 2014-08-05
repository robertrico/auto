<?php 
	class UsersController extends AppController{
		
		public function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->allow('add', 'logout', 'login');
		}
		
		public function login(){
			if($this->Session->check('Auth.User')){
            	$this->redirect(array('controller' => 'vehicles','action' => 'index'));      
			}
			if($this->request->is('post')){
				if($this->Auth->login()){
					$this->redirect(array('controller' => 'vehicles','action' => 'index'));
				}
				$this->Session->setFlash(__('Invalid username or password'));
			}
			
		}
		
		public function logout(){
			return $this->redirect($this->Auth->logout());
		}
		
		public function index(){
			$this->User->recursive = 0;
			$this->set('users', $this->paginate());
		}
		
		public function view($id=null){
			$this->User->id = $id;
			if(!$this->User->exists()){
				throw new NotFoundException(__('Invalid User'));
			}
			$this->set('user', $this->User->read(null, $id));
		}
		
		public function add(){
			if ($this->request->is('post')){
				$this->User->create();
				if($this->User->save($this->request->data)){
					$this->Session->setFlash(__('The User has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('The user could not be saved. Try Again.'));
			}
		}
		
		public function edit($id=null){
			$this->User->id = $id;
			if(!$this->User->exists()){
				throw new NotFoundException(__('Invalid User'));
			}
			if($this->request->is('post') || $this->request->is('put')){
				if($this->User->save($this->request->data)){
					$this->Session->setFlash(__('The user has been updated.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('The user could not be updated'));
			} else {
				$this->request->data = $this->User->read(null, $id);
				unset($this->request->data['User']['password']);
			}
		}
		
		public function delete($id = null){
			$this->request->onlyAllow('post');
			
			$this->User->id = $id;
			if(!$this->User->exists()){
				throw new NotFoundException(__('Invalid User'));
			}
			if ($this->User->delete()){
				$this->Session->setFlash(__('User Deleted'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('User was not deleted'));
			return $this->redirect(array('action' => 'index'));
		}
	}
		
		