<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Puv type', 'puv_id'); ?>

			<div class="input">
				<?php echo Form::select('puv_id', Input::post('puv_id', isset($puv) ? $puv->puv_id : ''),$puvtypes, array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Fare type', 'faretype'); ?>

			<div class="input">
				<?php echo Form::input('faretype', Input::post('faretype', isset($puv) ? $puv->faretype : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Initial succeeding ', 'initsucc'); ?>

			<div class="input">
				<?php echo Form::input('initsucc', Input::post('initsucc', isset($puv) ? $puv->initsucc : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Succeeding fare', 'succfare'); ?>

			<div class="input">
				<?php echo Form::input('succfare', Input::post('succfare', isset($puv) ? $puv->succfare : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Initial distance', 'initdis'); ?>

			<div class="input">
				<?php echo Form::input('initdis', Input::post('initdis', isset($puv) ? $puv->initdis : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Succeeding distance', 'succdis'); ?>

			<div class="input">
				<?php echo Form::input('succdis', Input::post('succdis', isset($puv) ? $puv->succdis : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>