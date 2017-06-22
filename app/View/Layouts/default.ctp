<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
	<div id="container">
		<div id="header">
			<nav class="navbar navbar-inverse">
			    <div class="container-fluid">
				    <div class="navbar-header">
				            <?php echo $this->Html->link(
				            	'<h3 style="margin-top:10px;">StockPhotos_TeamC</h3>', 
				            	array('controller' => 'photos', 'action' => 'index'),
				            	array('escape' => false)); ?>
				   
				    </div>
				    <ul class="nav navbar-nav navbar-right">
				        <li>
				            <?php echo $this->Html->link(
				            	'<span class="glyphicon glyphicon-user"></span> Sign Up', 
				            	array('controller' => 'users', 'action' => 'signup'),
				            	array('escape' => false)); ?>
				        </li>
				        <li>
				        	<?php 
					        	if($this->Session->read('Auth.User')) {   
						        	echo $this->Html->link(
						            	'<span class="glyphicon glyphicon-log-out"></span> Log Out', 
						            	array('controller' => 'users', 'action' => 'logout'),
						            	array('escape' => false)); 
					        	} else {
					        		echo $this->Html->link(
						            	'<span class="glyphicon glyphicon-log-in"></span> Log In', 
						            	array('controller' => 'users', 'action' => 'login'),
						            	array('escape' => false)); 
					        	}

				            ?>
				        </a></li>
				    </ul>
			    </div>
			</nav>
		</div>
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'https://cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
