<h2>Editing User</h2>
<br>

<?php echo render('users\users/_form'); ?>
<p>
	<?php echo Html::anchor('users/users/view/'.$user->id, 'View'); ?> |
	<?php echo Html::anchor('users/users', 'Back'); ?></p>
