<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>StockPhotos &mdash;</title>

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Google Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
<?php echo $this->element("/photo/css"); ?>
	
	<?php echo $this->Html->css('customs'); ?>
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
     <?php echo $this->Html->script('like_image'); ?>
     <?php echo $this->Html->script('js-comments'); ?>
     <?php echo $this->Html->script('test-1'); ?>
     <?php echo $this->Html->script('comt-2'); ?>


     <style>
		div.scroll {
		    width: 450px;
		    height: 450px;
		    overflow: scroll;
		}	
	</style>

	</head>
	<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=1366704526733080";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
			<div id="fh5co-offcanvass">
		<a href="#" class="fh5co-offcanvass-close js-fh5co-offcanvass-close">Menu <i class="icon-cross"></i> </a>
		<h4 style="margin-left: 5px; margin-bottom: 15px;">
		<?php
			if($this->Session->read('Auth.User')){
			    echo 'Hello, ' . $this->Session->read('Auth.User.name');
			}
		?>
		</h4>
		<ul>
			<li><?php echo $this->Html->link('Home', '/images/index'); ?></li>
			
			<?php if ($this->Session->read('Auth.User')) { ?>
				<li><?php echo $this->Html->link('Upload Images', '/images/upload'); ?></li>
				<li><?php echo $this->Html->link('Upload Videos', '/videos/upload'); ?></li>
				<li><?php echo $this->Html->link('Log Out',
					array('controller' => 'users', "action" => "logout")); ?></li>
			<?php } else { ?>
				<li><?php echo $this->Html->link('Log In',
					array('controller' => 'users', "action" => "login")); ?></li>
			<?php } ?>

		</ul>
		<h3 class="fh5co-lead">Connect with us</h3>
		<p class="fh5co-social-icons">
			<a href="#"><i class="icon-twitter"></i></a>
			<a href="#"><i class="icon-facebook"></i></a>
			<a href="#"><i class="icon-instagram"></i></a>
			<a href="#"><i class="icon-dribbble"></i></a>
			<a href="#"><i class="icon-youtube"></i></a>
		</p>
	</div>
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="#" class="fh5co-menu-btn js-fh5co-menu-btn">Menu <i class="icon-menu"></i></a>
					<a class="navbar-brand" <?php echo $this->Html->link('StockPhotos', '/images/index');?> </a>
					<a class="navbar-brand" <?php echo $this->Html->link('StockVideos', '/videos/index');?> </a>
				</div>
			</div>
		</div>
	</header>
	<!-- END .header -->
	
	<?php echo $this->fetch("content"); ?>

	<footer id="fh5co-footer" style="padding-top: 100px;">
		
		<div class="container">
			<div class="row row-padded">
				<div class="col-md-12 text-center">
					<p class="fh5co-social-icons">
						<a href="#"><i class="icon-twitter"></i></a>
						<a href="#"><i class="icon-facebook"></i></a>
						<a href="#"><i class="icon-instagram"></i></a>
						<a href="#"><i class="icon-dribbble"></i></a>
						<a href="#"><i class="icon-youtube"></i></a>
					</p>
					<p><small>&copy; StockPhotos. All Rights Reserved. <br>Designed by: <a href="#" target="_blank">InternshipTeamC</a> | Images by: <a href="http://pexels.com" target="_blank">Pexels</a> </small></p>
				</div>
			</div>
		</div>
	</footer>

	<?php echo $this->element("/photo/js"); ?>
	</body>
</html>
