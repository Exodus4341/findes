<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Directionname', 'directionname'); ?>

			<div class="input">
				<?php echo Form::input('directionname', Input::post('directionname', isset($direction) ? $direction->directionname : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Jeepneyprefix', 'jeepneyprefix'); ?>

			<div class="input">
				<?php echo Form::input('jeepneyprefix', Input::post('jeepneyprefix', isset($direction) ? $direction->jeepneyprefix : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Tricycleprefix', 'tricycleprefix'); ?>

			<div class="input">
				<?php echo Form::input('tricycleprefix', Input::post('tricycleprefix', isset($direction) ? $direction->tricycleprefix : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Midfix', 'midfix'); ?>

			<div class="input">
				<?php echo Form::input('midfix', Input::post('midfix', isset($direction) ? $direction->midfix : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Postfix', 'postfix'); ?>

			<div class="input">
				<?php echo Form::input('postfix', Input::post('postfix', isset($direction) ? $direction->postfix : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>