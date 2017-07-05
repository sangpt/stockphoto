<?php
class ImagesController extends AppController {
    public $layout = "images";

    public function like(){
        $this->layout = false;
        $this->autoRender = false;
        if( $this->request->is('ajax') ) {
            $id = $this->request->data('id_article');
            $this->log($id);
            // $result = $this->Book->find('first', array(
            //                                            'conditions' => array('id' => $id)
            //                             ));
            // echo json_encode($result);
        }
    }