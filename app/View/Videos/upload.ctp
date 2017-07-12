<style type="text/css">
    .upload-video {
        margin-left: 100px;
    }
</style>

<div class="upload-video">
<h2>Upload An Video</h2>
<form action="<?php echo $this->Html->url('/videos/upload'); ?>" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>
            Videos
        </legend>
        <ul>
            <li>
                <?php echo $this->Form->file('Video.videos');?>
            </li>
        </ul>
    </fieldset>
    <p><input type="submit" name="add" value="Add Video" /></p>
</form>
</div>