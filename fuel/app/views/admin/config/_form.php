<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Default currency', 'default_currency'); ?>

			<div class="input">
				<?php echo Form::input('default_currency', Input::post('default_currency', isset($config) ? $config->default_currency : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Jeepney maxspeed', 'jeepney_maxspeed'); ?>

			<div class="input">
				<?php echo Form::input('jeepney_maxspeed', Input::post('jeepney_maxspeed', isset($config) ? $config->jeepney_maxspeed : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Jeepney minspeed', 'jeepney_minspeed'); ?>

			<div class="input">
				<?php echo Form::input('jeepney_minspeed', Input::post('jeepney_minspeed', isset($config) ? $config->jeepney_minspeed : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Tricycle maxspeed', 'tricycle_maxspeed'); ?>

			<div class="input">
				<?php echo Form::input('tricycle_maxspeed', Input::post('tricycle_maxspeed', isset($config) ? $config->tricycle_maxspeed : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Tricycle minspeed', 'tricycle_minspeed'); ?>

			<div class="input">
				<?php echo Form::input('tricycle_minspeed', Input::post('tricycle_minspeed', isset($config) ? $config->tricycle_minspeed : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Route tolerance', 'route_tolerance'); ?>

			<div class="input">
				<?php echo Form::input('route_tolerance', Input::post('route_tolerance', isset($config) ? $config->route_tolerance : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>