
<?php
class ImagesController extends AppController {
    public $layout = "photo";
    var $name = 'Images';
    var $helpers = array('Html', 'Form');
    var $components = array('Upload');      // nạp Component upload
       
    public function index(){
        $images = $this->Image->find("all",array(
            'order' => 'Image.id DESC'
       ));
        $this->set("images",$images);
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid image'));
        }

        $image = $this->Image->findById($id);
        if (!$image) {
            throw new NotFoundException(__('Invalid image'));
        }
        $this->set('image', $image);
    }
    
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Image->delete($id)) {
            $this->Flash->success(
                __('The post with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->error(
                __('The post with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }

    public function upload() {
        if (empty($this->data)) {
            $this->render();
        } else {
            $data = $this->data;

            // đường dẫn tới thu mục upload file ảnh
            $destination = realpath('../../app/webroot/img/') . '/';

            // grab the file
            $file = $this->data['Image']['filedata'];

            // cấu hình upload
            $rule = array(
                            'type' => 'resizemin',
                            'size' => array('400', '300'),
                            'output' => 'jpg',
                        );
    
            $result = $this->Upload->upload($file, $destination, NULL, $rule);

            if (!$this->Upload->errors){

                    $data['Image']['images'] = $this->Upload->result;

            } else {
                    // display error
                    $errors = $this->Upload->errors;

                    // piece together errors
                    if(is_array($errors)){ $errors = implode("<br />",$errors); }

                            $this->Session->setFlash($errors);
                            $this->redirect('/images/upload');
                            exit();
            }

            $data['Image']['user_id'] = $this->Auth->user('id');
            if ($this->Image->save($data)) {
                    $this->Session->setFlash('Image has been added.');
                    $this->redirect('/images/index');
            } else {
                    $this->Session->setFlash('Please correct errors below.');
                    unlink($destination.$this->Upload->result);
            }
        }
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'upload') {
            return true;
        }

        // The owner of a post can edit and delete it
        if (in_array($this->action, array('delete'))) {
            $imageId = (int) $this->request->params['pass'][0];
            if ($this->Image->isOwnedBy($imageId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
}
?>