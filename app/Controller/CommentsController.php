<?php
class CommentsController extends AppController {
	public function add() {
		if ($this->request->is('post')) {
		    $this->Comment->create();
            if($this->Comment->save($this->request->data)) {
            	return $this->redirect(array('controller' => 'images', 'action' => 'view', 
            		$this->request->data['Comment']['image_id']));
            }
        }
	}

	public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        $comment = $this->Comment->find('first', array(
            'conditions' => array('Comment.id' => $id)));

        $uid = $this->Auth->user('id');

        if ($comment['User']['id'] == $uid) {
            if ($this->Comment->delete($id)) {
        		return $this->redirect(array('controller' => 'images', 'action' => 'view', $comment['Image']['id']));
        	}
        }
    }
}
?>