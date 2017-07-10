<div class="col-md-12">
	<div class="col-md-6 col-md-offset-1">
		<h4>
		<?php
		echo 'Uploaded by: ' . $image['User']['name']; 
		?>
		</h4>
		<h5>
		<?php
			if($this->Session->read('Auth.User')){
				if($user_id == $image_user_id){		    
					echo $this->Form->postLink(
						'Delete',
						array('action' => 'delete', $image['Image']['id']),
						array('confirm' => 'Are you sure?')
		    );}
			}
		?>
		<h5>
		<br>
		<?php
		echo $this->Html->image($image['Image']['images']);
		?>
		<br>
		<br>
        <?php 
            if ($liked == 1) {
                echo $this->Form->button(
                    '<span class="glyphicon glyphicon-heart"></span> Like', 
                    array('controller' => 'likes', 'action' => 'like',
                        'class' => 'btn btn-danger btn-sm',
                        'id' => $image['Image']['id'],
                        'onclick' => 'like('. $image['Image']['id'] .')',
                        'name' => 'like'),
                    array('escape' => false));
                echo $this->Form->end();

            } else {
                echo $this->Form->button(
                    '<span class="glyphicon glyphicon-heart"></span> Like', 
                    array('controller' => 'likes', 'action' => 'like',
                        'class' => 'btn btn-default btn-sm',
                        'id' => $image['Image']['id'],
                        'onclick' => 'like('. $image['Image']['id'] .')',
                        'name' => 'like'),
                    array('escape' => false));
                echo $this->Form->end();
            }

            echo "<b><div class ='like_count' id = '" . $image['Image']['id'] . "'>" . count($image['Like']) . "</div></b>";

        ?>

		<br>

		<?php
			if($this->Session->read('Auth.User')) {
				echo $this->Form->create('Comment', array(
				    'url' => array('controller' => 'comments', 'action' => 'add')));
				echo $this->Form->input('message', array('rows' => '5', 'label' => false, 'style' => 'width:350px;'));
				echo $this->Form->hidden('image_id', array('value' => $image['Image']['id']));
				echo $this->Form->hidden('user_id', array('value' => $user_id));
				echo $this->Form->button('Comment', array('style' => 'width:100px; height: 30px;'));
				echo $this->Form->end();
			}
		?>

	</div>
	<div class="col-md-4">
		<h5><b>COMMENT</b> <span class="label label-primary"><?php echo count($image['Comment']) ?></span></h5>
		<?php
			foreach ($comments as $comment) {
				echo '<div class="comment" id="' . $comment['Comment']['id'] . '">';
				echo '<b>' .  $comment['User']['name'] . '</b><br>';
				echo '<p style="font-size: 18px;">' . $comment['Comment']['message'] . '<p>';
				echo '<i style="font-size: 12px;">' . $comment['Comment']['created'] . '</i>';

				if($this->Session->read('Auth.User')){
					if($user_id == $comment['User']['id']){		    
						echo $this->Form->postLink(
							'Delete',
							array('controller' => 'comments', 'action' => 'delete', $comment['Comment']['id']),
							array('confirm' => 'Are you sure?')
				    	);
				    }
				}
				echo '</div>';
			}
		?>
	</div>
</div>