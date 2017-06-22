<div class="box-header">
    <h2>Log In</h2>
</div>

<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User'); ?>

<label for="username">Email</label>
<?php 
    echo $this->Form->input('email', array('label' => false, 'id' => 'username', 'style' => 'width:350px;'));
?>
<label for="password">Password</label>
<?php
    echo $this->Form->input('password', array('label' => false, 'id' => 'password', 'style' => 'width:350px;'));
?>

<?php 
    echo $this->Form->button('Log In', array(
        'type' => 'submit'
	));
?>
<br>
<p>New user? 
<?php echo $this->Html->link('Create an account', array('action' => 'signup')); ?>    
</p>
