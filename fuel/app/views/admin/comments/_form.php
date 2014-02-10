<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php //echo Form::label('Name', 'name'); ?>

			<div class="input">
				<?php echo Form::input('name', Input::post('name', isset($comment) ? $comment->name : ' '), array('class' => 'span4', 'type' => 'hidden')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php //echo Form::label('Email', 'email'); ?>

			<div class="input">
				<?php echo Form::input('email', Input::post('email', isset($comment) ? $comment->email : ' '), array('class' => 'span4', 'type' => 'hidden')); ?>

			</div>
		</div>
		
		<div class="clearfix">
			<?php echo Form::label('Message', 'message'); ?>

			<div class="input">
				<?php echo Form::textarea('message', Input::post('message', isset($comment) ? $comment->message : ''), array('class' => 'span8', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Landmark id', 'landmark_id'); ?>

			<div class="input">
				<?php echo Form::select('landmark_id', Input::post('landmark_id', isset($comment) ? $comment->landmark_id : ''),$landmarks, array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>