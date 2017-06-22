<div class="box-header">
    <h2>Sign Up</h2>
</div>

<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User'); ?>

<label for="username">Name</label>
<?php
    echo $this->Form->input('name', array('label' => false, 'id' => 'username', 'style' => 'width:350px;'));
?>
<label for="email">Email</label>
<?php 
    echo $this->Form->input('email', array('label' => false, 'id' => 'email', 'style' => 'width:350px;'));
?>
<label for="password">Password</label>
<?php
    echo $this->Form->input('password', array('label' => false, 'id' => 'password', 'style' => 'width:350px;'));
?>

<?php 
    echo $this->Form->button('Register', array(
        'type' => 'submit'
	));
?>
<br>
