<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('signup', 'logout');
	}

	public function login() {
        if($this->Session->check('Auth.User')){
            $this->redirect(array('controller' => 'photos', 'action' => 'index'));     
        }

	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            $this->redirect(array('controller' => 'photos', 'action' => 'index'));
	        }
	        $this->Flash->error(__('Invalid email or password, try again'));
	    }
	}

	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}

    public function signup() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'login'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        }
    }
}
?>