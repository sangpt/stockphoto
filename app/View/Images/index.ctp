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
                    </div>
                    <div class="row">
                        <div class="col-md-3">
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

                            echo "<b><div class ='like_count' id = '" . $image['Image']['id'] . "'>" . count($image['Like']) . "</div></b>";

                        ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                                echo $this->HTML->link(
                                '<span class="glyphicon glyphicon-comment"></span> Comment', 
                                array('controller' => 'images', 'action' => 'view', $image['Image']['id']),
                                array('class' => 'btn btn-default btn-sm',
                                    'id' => $image['Image']['id'],
                                    'escape' => false));
                            ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
