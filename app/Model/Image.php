<?php
class Image extends AppModel {
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Like' => array(
			'className' => 'Like',
			'foreignKey' => 'image_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

    public function isOwnedBy($image, $user) {
	    return $this->field('id', array('id' => $image, 'user_id' => $user)) !== false;
	}

}
?>