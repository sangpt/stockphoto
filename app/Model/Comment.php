<?php 
class Comment extends AppModel{
	public $belongsTo = array('User', 'Image');

	public function checkComment($image, $user) {
		return $like = $this->Comment->find('all', array(
    		'conditions' => array(
        		'user_id' => $user,
        		'image_id' => $image)
    	));
	}

	public function countComment($image) {
		return $countComment = $this->Image->find('count', 
			array('conditions' => array('image_id' => $image))
		);
	}
}
?>