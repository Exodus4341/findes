<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Raters', 'raters'); ?>

			<div class="input">
				<?php echo Form::input('raters', Input::post('raters', isset($voterater) ? $voterater->raters : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Landmark id', 'landmark_id'); ?>

			<div class="input">
				<?php echo Form::input('landmark_id', Input::post('landmark_id', isset($voterater) ? $voterater->landmark_id : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>