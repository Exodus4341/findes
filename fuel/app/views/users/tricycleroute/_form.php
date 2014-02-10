<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('Filename', 'filename', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('filename', Input::post('filename', isset($tricycleroute) ? $tricycleroute->filename : ''), array('class' => 'span4', 'placeholder'=>'Filename')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Size', 'size', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('size', Input::post('size', isset($tricycleroute) ? $tricycleroute->size : ''), array('class' => 'span4', 'placeholder'=>'Size')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Type', 'type', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('type', Input::post('type', isset($tricycleroute) ? $tricycleroute->type : ''), array('class' => 'span4', 'placeholder'=>'Type')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Fileurl', 'fileurl', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('fileurl', Input::post('fileurl', isset($tricycleroute) ? $tricycleroute->fileurl : ''), array('class' => 'span4', 'placeholder'=>'Fileurl')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>