<div id="fh5co-main">
    <div class="container">
        <div class="row">
            <div id="fh5co-board" data-columns>
            <?php foreach ($images as $image): ?>
            <?php $string = $image['Image']['images']; ?>
                <div  class="item">        
                    <div class="animate-box"> 
                        <?php echo $this->Html->link(
                            $this->Html->image($string, array('height'=>'200px')),
                            array('controller' => 'images', 'action' => 'view', $image['Image']['id']),
                            array('escape' => false)
                        );
                        ?>

                        <?php 
                            if ($image['is_like'] == 1) {
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
                            echo "<div class ='like_count' id = '" . $image['Image']['id'] . "'>" . count($image['Like']) . "</div>";
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">
      <p>Some text in the modal.</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
  
</div>
</div