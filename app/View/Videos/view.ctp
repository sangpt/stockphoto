<div class="col-md-12" style="margin-bottom: 100px;">
	<div class="col-md-6 col-md-offset-1">
		<h4>
		<?php
		echo 'Uploaded by: ' . $video['User']['name']; 
		?>
		</h4>
		<h5>
		<?php
			if($this->Session->read('Auth.User')){
				if($user_id == $video_user_id){		    
					echo $this->Form->postLink(
						'Delete',
						array('action' => 'delete', $video['Video']['id']),
						array('confirm' => 'Are you sure?')
		    );}
			}
		?>
		<h5>
		<br>
		<?php
        echo $this->Html->media($video['Video']['videos'], array(
            'type' => 'videos/mp4',
            'controls',
            'style' => 'width:600px; height:450px;'
            ));
		?>
		<br>
		<br>
        <?php 
            if ($liked == 1) {
                echo $this->Form->button(
                    '<span class="glyphicon glyphicon-heart"></span> Like', 
                    array('controller' => 'likes', 'action' => 'like',
                        'class' => 'btn btn-danger btn-sm',
                        'id' => $video['Video']['id'],
                        'onclick' => 'like_video('. $video['Video']['id'] .')',
                        'name' => 'like'),
                    array('escape' => false));
                echo $this->Form->end();

            } else {
                echo $this->Form->button(
                    '<span class="glyphicon glyphicon-heart"></span> Like', 
                    array('controller' => 'likes', 'action' => 'like',
                        'class' => 'btn btn-default btn-sm',
                        'id' => $video['Video']['id'],
                        'onclick' => 'like_video('. $video['Video']['id'] .')',
                        'name' => 'like'),
                    array('escape' => false));
                echo $this->Form->end();
            }

            echo "<b><div class ='like_count' id = '" . $video['Video']['id'] . "'>" . count($video['Like']) . "</div></b>";

        ?>

		<br>

		<?php
			if($this->Session->read('Auth.User')) {
			?>
				<div class="addComment input-group">
					<textarea rows="5" cols="50" class="comment-input" placeholder="Add your comment..."></textarea>
					<div>
						<button class="btn-primary" type="submit" onclick="comment_video(<?php echo $video['Video']['id'] ?>, <?php echo $user_id ?>)">
							Comment
						</button>
					</div>
				</div>
			<?php 

			}
		?>

	</div>
	<div class="col-md-4">
		<h5><b>COMMENT</b></h5>
		<div class="show-comment scroll">
		<?php
			foreach ($comments as $comment) {
				echo '<div class="comment" id="comment-' . $comment['Comment']['id'] . '">';
				echo '<b>' .  $comment['User']['name'] . '</b><br>';
				echo '<p style="font-size: 16px;">' . $comment['Comment']['message'] . '<p>';
				echo '<i style="font-size: 10px;">' . $comment['Comment']['created'] . '</i>';

				if($this->Session->read('Auth.User')){
					if($user_id == $comment['User']['id']){		
				?> 
				  	<a href="javascript:void(0)" onclick="delete_comment(<?php echo $comment['Comment']['id'] ?>);">Delete</a>
				<?php 
				    }
				}
				echo '</div>';
			}
		?>
		</div>
	</div>
</div>