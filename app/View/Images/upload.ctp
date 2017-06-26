<style type="text/css">
    .upload-image {
        margin-left: 100px;
    }
</style>

<div class="upload-image">
<h2>Upload An Image</h2>
<form action="<?php echo $this->Html->url('/images/upload'); ?>" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>
            Images
        </legend>
        <ul>
            <li>
                <?php echo $this->Form->file('Image.filedata');?>
            </li>
        </ul>
    </fieldset>
    <p><input type="submit" name="add" value="Add Image" /></p>
</form>
</div>