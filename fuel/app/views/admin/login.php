<div class="container1">

	<section id="content1">

<?php echo Form::open(array()); ?>

	<?php if (isset($_GET['destination'])): ?>
		<?php echo Form::hidden('destination',$_GET['destination']); ?>
	<?php endif; ?>

	<?php if (isset($login_error)): ?>
		<div class="error"><?php echo $login_error; ?></div>
	<?php endif; ?>

	<?php echo Html::img('assets/img/fulllogo.png', array('class' => 'fulllogo')) ?>
	<?php echo Html::img('assets/img/strip.png', array('class' => 'strip')) ?>
	<div style="margin-top:-50px">
		<div class="input"><?php echo Form::input('email', Input::post('email'), array('id' => 'username', 'placeholder' => 'Username or Email', 'required' => '')); ?></div>
		
		<?php if ($val->error('email')): ?>
			<div class="error"><?php echo $val->error('email')->get_message('You must provide a username or email'); ?></div>
		<?php endif; ?>
	</div>

	<div>
		<div class="input"><?php echo Form::password('password','',array('id' => 'password', 'placeholder' => 'Password', 'required' => '')); ?></div>
		
		<?php if ($val->error('password')): ?>
			<div class="error"><?php echo $val->error('password')->get_message(':label cannot be blank'); ?></div>
		<?php endif; ?>
	</div>

	<div class="actions" style="float:left;">
		<?php echo Form::submit(array('value'=>'Login', 'name'=>'submit')); ?>
	</div>

	

<?php echo Form::close(); ?>
	
	</section>
</div>
