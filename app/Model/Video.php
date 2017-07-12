<?php
class Video extends AppModel {
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
			'foreignKey' => 'video_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Comment' 
	);

    public function isOwnedBy($video, $user) {
	    return $this->field('id', array('id' => $video, 'user_id' => $user)) !== false;
	}

}
?>