<div id="fh5co-main">
    <div class="container">
        <div class="row">
            <div id="fh5co-board" data-columns>
            <?php foreach ($videos as $video): ?>
            <?php $string = $video['Video']['videos']; ?>
                <div class="item">        
                    <div class="animate-box"> 
                    <?php       
                        echo $this->Html->media($string, array(
                            'type' => 'videos/mp4',
                            'controls',
                            'style'=>'width:300px; height:400px;'
                            
                            ));
                    ?>
                        <div class="playbutton">
                        <?php
                            echo $this->HTML->link(
                            $this->Html->image("https://doky.io/v3/images/play-button.png"),
                            array('controller' => 'videos', 'action' => 'view', $video['Video']['id']),
                            array('escape' => false));
                        ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        <?php 
                            if ($video['is_like'] == 1) {
                                echo $this->Form->button(
                                    '<span class="glyphicon glyphicon-heart"></span> Like', 
                                    array(
                                        'class' => 'btn btn-danger btn-sm',
                                        'id' => $video['Video']['id'],
                                        'onclick' => 'like_video('. $video['Video']['id'] .')',
                                        'name' => 'like'),
                                    array('escape' => false));
                                echo $this->Form->end();

                            } else {
                                echo $this->Form->button(
                                    '<span class="glyphicon glyphicon-heart"></span> Like', 
                                    array(
                                        'class' => 'btn btn-default btn-sm',
                                        'id' => $video['Video']['id'],
                                        'onclick' => 'like_video('. $video['Video']['id'] .')',
                                        'name' => 'like'),
                                    array('escape' => false));
                                echo $this->Form->end();
                            }

                            echo "<b><div class ='like_count' id = '" . $video['Video']['id'] . "'>" . count($video['Like']) . "</div></b>";

                        ?>
                        </div>
                        <div class="col-md-5">
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
                        <div class="col-md-4">
                            <div class="fb-share-button" data-href="http://192.168.33.10/STOCK_PHOTO_teamC/" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F192.168.33.10%2FSTOCK_PHOTO_teamC%2F&amp;src=sdkpreparse">Share</a></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>