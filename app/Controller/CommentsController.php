<?php
class CommentsController extends AppController {
	public function add() {
		$this->layout = false;
		$this->autoRender =false;
		if( $this->request->is('ajax') ) {
            $message = $this->request->data('message');
            $user_id = $this->request->data('user_id');
            $image_id = $this->request->data('image_id'); 
        }

        $data = array(
            'Comment' => array(
                'user_id' => $user_id,
                'image_id' => $image_id,
                'message' => $message
            )
        );

        // prepare the model for adding a new entry
        $this->Comment->create();

        // save the data
        $this->Comment->save($data);

        $comment = $this->Comment->find('first', 
        	array('conditions' => array(
            'AND' => array(
				'Comment.message' => $message,
				'Comment.user_id' =>$user_id,
				'Comment.image_id' => $image_id
				)
        	
        )));

        $this->log( $comment);

        $this->loadModel('Image');
        
       	$image = $this->Image->find('first', array('conditions' => array('Image.id' => $image_id)));

       	echo json_encode(array('comment' =>$comment , 'comment_count' =>count($image['Comment'])));
	}

	public function delete() {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        $this->layout = false;
        $this->autoRender =false;

        if( $this->request->is('ajax') ) {
            $id = $this->request->data('id');
        }
    
        $this->Comment->delete($id);
        
        echo json_encode(array('result' => $id));
    }
}
?>