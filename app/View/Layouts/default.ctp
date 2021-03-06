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



</head>
<body>
	<style type="text/css">
		.bgimg {
		    background-image: url('https://static.pexels.com/photos/10651/photo-1432821596592-e2c18b78144f.jpeg');
		}
	</style>

	<div id="container" class="bgimg">
		<div id="">
			<nav class="navbar navbar-inverse">
			    <div class="container-fluid">
				    <div class="navbar-header">
				            <?php echo $this->Html->link(
				            	'<h3 style="margin-top:10px; color:white;">StockPhotos_TeamC</h3>', 
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
		<div>
			<?php echo $this->Flash->render(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">

		</div>
	</div>
</body>
</html>
