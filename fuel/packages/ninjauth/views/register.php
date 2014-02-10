<h4>Register</h4>


<?php echo Form::open(null, array('id' => 'register')); ?>

	<?php if (isset($error)): ?>
		<span class="error"><?php echo $error; ?></span>
	<?php endif; ?>


	<div class="clearfix">
		<label for="username">Username</label><br>
		<?php echo Form::input('username', $user->username) ?>
	</div>
	<br>
	<div class="clearfix">
		<label for="full_name">Full Name</label><br>
		<?php echo Form::input('full_name', $user->full_name) ?>
	</div>
	<br>
	<div class="clearfix">
		<label for="email">Email</label><br>
		<?php echo Form::input('email', $user->email) ?>
	</div>
	<br>
	<div class="clearfix">
		<label for="password">Password</label><br>
		<?php echo Form::password('password') ?>
	</div>
	<?php echo Form::submit('submit') ?>

<?php echo Form::close() ?>