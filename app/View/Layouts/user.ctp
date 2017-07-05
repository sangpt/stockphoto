<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Stock Photos Team C</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('animate');

		echo $this->Html->css('styles');
	?>
</head>

<body>
	<?php echo $this->Flash->render(); ?>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">Stock <span>Photos</span></span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>