<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Lat', 'lat'); ?>

			<div class="input">
				<?php echo Form::input('lat', Input::post('lat', isset($roadlocation) ? $roadlocation->lat : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Lon', 'lon'); ?>

			<div class="input">
				<?php echo Form::input('lon', Input::post('lon', isset($roadlocation) ? $roadlocation->lon : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Landmark id', 'landmark_id'); ?>

			<div class="input">
				<?php echo Form::select('landmark_id', Input::post('landmark_id', isset($roadlocation) ? $roadlocation->landmark_id : ''),$landmarkname, array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>