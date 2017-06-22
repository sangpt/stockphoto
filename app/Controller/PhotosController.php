<?php
class PhotosController extends AppController{
    var $components = array("Upload");
    public function uploadfile() {
        $file_name1 = '';
        if ($this->request->is('post')) {
            $file_name1=$this->Upload->start_upload($this->data['uploadFile']['pdf_path']);
            $data=array();
            $data['User']['id'] = CakeSession::read("Auth.User.id");
            $data['User']['imagename'] = $file_name1;
            $this->User->save($data); // save the file path in database
            
            echo $data['User']['id']." + ".$data['User']['imagename'];
        }
        $this->set('image',$file_name1);
    }
}