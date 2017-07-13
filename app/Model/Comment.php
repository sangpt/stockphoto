<?php 
class Comment extends AppModel{
	public $belongsTo = array('User', 'Image', 'Video');



    public $validate = array(
        'message' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A username is required'
            )
        )
    );
}
?>