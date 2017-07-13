<?php
class VideosController extends AppController {
    public $layout = "images";
    var $name = 'Videos';
    var $helpers = array('Html', 'Form');
    //var $components = array('Upload');      // nạp Component upload
       
    public function index(){
        $result = $this->Video->find("all",array(
            'order' => 'Video.id DESC'
        ));
      
        $videos = array();

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
                $videos[] = $value;
            }
        }
        else {
            foreach ($result as $value) { 
                    $value['is_like'] = 0;
                    $videos[] = $value;
            }
        }
        $this->set("videos",$videos);
    }

    public function like(){
        $this->layout = false;
        $this->autoRender = false;
        $this->loadModel('Like');
        if( $this->request->is('ajax') ) {
            $id = $this->request->data('id_article');
            $uid = $this->Auth->user('id');
        }
        $result = $this->Like->find('first',array('conditions' => array('AND' => array('Like.video_id' => $id ,'Like.user_id' => $uid))));
        if (count($result) == 0) {
            $data = array(
                'Like' => array(
                    'user_id' => $uid,
                    'video_id' => $id
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
           
        $count = $this->Like->find('all', array('conditions' => array('Like.video_id' => $id)));
        echo json_encode(array('like_count' => count($count) ,'is_like' => $is_like));
    }
    public function view($id = null) {
        $this->loadModel('Like');
        $this->loadModel('Comment');

        $user_id = $this->Auth->user('id');

        if (!$id) {
            throw new NotFoundException(__('Invalid image'));
        }

        $video = $this->Video->findById($id);
        if (!$video) {
            throw new NotFoundException(__('Invalid image'));
        }

        $conditions = array("Like.user_id" => $user_id, "video_id" => $id); 

        if ($this->Like->find('first', array('conditions' => $conditions))) {
            $this->set('liked', 1);
        } else {
            $this->set('liked', 0);
        }

        $comments = $this->Comment->find('all', array(
            'conditions' => array('video_id' => $id),
            'order' => array('Comment.id' => 'asc')
        ));

        $this->set('comments', $comments);
        $this->set('video', $video);
        $this->set('user_id', $user_id);
        $this->set('video_user_id', $video['User']['id']);   
    }
    
    public function delete($id) {
        $this->layout = false;
        $this->autoRender = false;
        
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        $video = $this->Video->find('first', array(
            'conditions' => array('Video.id' => $id)));
        $uid = $this->Auth->user('id');

        if ($video['User']['id'] == $uid) {
            if ($this->Video->delete($id)) {
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

    public function upload(){
        if ($this->request->is('post')) {
            $this->Video->create();
            //Check if image has been uploaded
            if (!empty($this->request->data['Video']['videos']['name'])) {
                $file = $this->request->data['Video']['videos'];
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('mp4', 'mp3', '3gp','flv','avi');
                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . DS . 'files' . DS . $file['name']);
                    $this->request->data['Video']['videos'] = $file['name'];
                    $this->request->data['Video']['user_id'] = $this->Auth->user('id');
                }
                if ($this->Video->save($this->request->data)) {
                    return $this->redirect(array('controller' => 'videos', 'action' => 'index'));
                } else {
                   
                }
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
            $videoId = (int) $this->request->params['pass'][0];
            if ($this->Video->isOwnedBy($videoId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
}
?>