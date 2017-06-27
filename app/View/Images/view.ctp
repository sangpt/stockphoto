<center>
<?php
echo $this->Html->image($image['Image']['images']);
?>
<br>
<h4 style="margin-top: 20px">
<?php
echo 'Uploaded by: ' . $image['User']['name'];
?>
</h4>

<?php
    echo $this->Form->postLink(
        'Delete',
        array('action' => 'delete', $image['Image']['id']),
        array('confirm' => 'Are you sure?')
    );
?>
</center>