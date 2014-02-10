<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Mapname', 'mapname'); ?>

			<div class="input">
				<?php echo Form::input('mapname', Input::post('mapname', isset($tilemap) ? $tilemap->mapname : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Source', 'source'); ?>

			<div class="input">
				<?php echo Form::input('source', Input::post('source', isset($tilemap) ? $tilemap->source : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>