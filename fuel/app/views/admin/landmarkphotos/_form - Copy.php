<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Filename', 'filename'); ?>

			<div class="input">
				<?php echo Form::input('filename', Input::post('filename', isset($landmarkphoto) ? $landmarkphoto->filename : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Size', 'size'); ?>

			<div class="input">
				<?php echo Form::input('size', Input::post('size', isset($landmarkphoto) ? $landmarkphoto->size : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Type', 'type'); ?>

			<div class="input">
				<?php echo Form::input('type', Input::post('type', isset($landmarkphoto) ? $landmarkphoto->type : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Fileurl', 'fileurl'); ?>

			<div class="input">
				<?php echo Form::textarea('fileurl', Input::post('fileurl', isset($landmarkphoto) ? $landmarkphoto->fileurl : ''), array('class' => 'span8', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Landmarkid', 'landmarkid'); ?>

			<div class="input">
				<?php echo Form::input('landmarkid', Input::post('landmarkid', isset($landmarkphoto) ? $landmarkphoto->landmarkid : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>