<?php
class Image extends AppModel {
	public $belongsTo = 'User';
    var $name = "Image";//tên của model

    public function isOwnedBy($image, $user) {
	    return $this->field('id', array('id' => $image, 'user_id' => $user)) !== false;
	}
}
?>