<div id="fh5co-main">
    <div class="container">
        <div class="row">
            <div id="fh5co-board" data-columns>
            <?php foreach ($videos as $video): ?>
            <?php $string = $video['Video']['videos']; ?>
                <div class="item">        
                    <div class="animate-box"> 
                    <?php
                        // echo $this->Html->style(array('width' => '600px',
                        //                               'height' => '800px')
                        //                         );

                            
                        echo $this->Html->media($string, array(
                            'type' => 'videos/mp4',
                            'controls',
                            'style'=>'width:300px; height:400px;'
                            
                            ));
                    ?>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        <?php 
                            if ($video['is_like'] == 1) {
                                echo $this->Form->button(
                                    '<span class="glyphicon glyphicon-heart"></span> Like', 
                                    array('controller' => 'likes', 'action' => 'like',
                                        'class' => 'btn btn-danger btn-sm',
                                        'id' => $video['Video']['id'],
                                        'onclick' => 'like('. $video['Video']['id'] .')',
                                        'name' => 'like'),
                                    array('escape' => false));
                                echo $this->Form->end();

                            } else {
                                echo $this->Form->button(
                                    '<span class="glyphicon glyphicon-heart"></span> Like', 
                                    array('controller' => 'likes', 'action' => 'like',
                                        'class' => 'btn btn-default btn-sm',
                                        'id' => $video['Video']['id'],
                                        'onclick' => 'like('. $video['Video']['id'] .')',
                                        'name' => 'like'),
                                    array('escape' => false));
                                echo $this->Form->end();
                            }

                            echo "<b><div class ='like_count' id = '" . $video['Video']['id'] . "'>" . count($video['Like']) . "</div></b>";

                        ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                                echo $this->HTML->link(
                                '<span class="glyphicon glyphicon-comment"></span> Comment', 
                                array('controller' => 'videos', 'action' => 'view', $video['Video']['id']),
                                array('class' => 'btn btn-succes btn-sm',
                                    'id' => $video['Video']['id'],
                                    'escape' => false));
                                echo "<b> &nbsp &nbsp" .count($video['Comment'])."</b>";
                            ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>\
style