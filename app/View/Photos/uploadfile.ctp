<div class="users view">
	<h2><?php echo('User'); ?></h2>
	<?php
		echo $this->Form->create('uploadFile', array('type' => 'file')); //input field of type file that allows browse your file.
		echo $this->Form->input('pdf_path', array('type' => 'file','label' => 'Pdf'));
		echo $this->Form->end('Upload file');
		$image_src = $this->webroot.'img/'.$image;
	?>
	<img src="<?php echo $image_src;?>">
</div>