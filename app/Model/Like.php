<?php 
class Like extends AppModel{
	public $belongsTo = array('User', 'Image');

	public function checkLiked($image, $user) {
		return $like = $this->Like->find('all', array(
    		'conditions' => array(
        		'user_id' => $user,
        		'image_id' => $image)
    	));
	}

	public function countLike($image) {
		return $countLike = $this->Image->find('count', 
			array('conditions' => array('image_id' => $image))
		);
	}
}

 ?>