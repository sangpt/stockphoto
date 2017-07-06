
<?php
class ImagesController extends AppController {
    public $layout = "images";
    var $name = 'Images';
    var $helpers = array('Html', 'Form');
    var $components = array('Upload');      // nạp Component upload
       
    public function index(){
        $result = $this->Image->find("all",array(
            'order' => 'Image.id DESC'
        ));
      
        $images = array();

        $user_id = $this->Auth->user('id');

        // check user_id da like image hay chua
        if (isset($user_id)) {
            foreach ($result as $value) { 
                if (count($value['Like']) == 0) {
                    $value['is_like'] = 0;
                }
                else {
                    $value['is_like'] = 0;
                    foreach ($value['Like'] as $like) {
                        if ($like['user_id'] == $user_id ) {
                            $value['is_like'] = 1;
                            break;
                        }
                    }
                }
                $images[] = $value;
            }
        }
        else {
            foreach ($result as $value) { 
                    $value['is_like'] = 0;
                    $images[] = $value;
            }
        }
        $this->set("images",$images);
    }

    public function like(){
        $this->layout = false;
        $this->autoRender = false;
        $this->loadModel('Like');
        if( $this->request->is('ajax') ) {
            $id = $this->request->data('id_article');
            $uid = $this->Auth->user('id');
        }
        $result = $this->Like->find('first',array('conditions' => array('AND' => array('Like.image_id' => $id ,'Like.user_id' => $uid))));
        if (count($result) == 0) {
            $data = array(
                'Like' => array(
                    'user_id' => $uid,
                    'image_id' => $id
                )
            );

            // prepare the model for adding a new entry
            $this->Like->create();

            // save the data
            $this->Like->save($data);
            $is_like = true;
        } else {
            $this->Like->delete($result['Like']['id']);
            $is_like = false;
        }
           
        $count = $this->Like->find('all', array('conditions' => array('Like.image_id' => $id)));
        echo json_encode(array('like_count' => count($count) ,'is_like' => $is_like));
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

        $image = $this->Image->find('first', array(
            'conditions' => array('Image.id' => $id)));
        $uid = $this->Auth->user('id');

        if ($image['User']['id'] == $uid) {
            if ($this->Image->delete($id)) {
                $this->Flash->success(
                    __('The post with id: %s has been deleted.', h($id))
                );
            } else {
                $this->Flash->error(
                    __('The post with id: %s could not be deleted.', h($id))
                );
            }
        } else {
            $this->Flash->success(
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