
<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Landmark id', 'landmark_id'); ?>

			<div class="input">
				<?php echo Form::select('landmark_id', Input::post('landmark_id', isset($voteitem) ? $voteitem->landmark_id : ''),$landmarks, array('class' => 'span4')); ?>

			</div>
		</div>
		
				<?php echo Form::radio('vote', $checked = 1,Input::post('vote', isset($voteitem) ? $voteitem->votes : ''), array('class' => 'hover-star', 'title' => 'Verypoor')); ?>

				<?php echo Form::radio('vote', $checked = 2,Input::post('vote', isset($voteitem) ? $voteitem->votes : ''), array('class' => 'hover-star', 'title' => 'Poor')); ?>

				<?php echo Form::radio('vote', $checked = 3,Input::post('vote', isset($voteitem) ? $voteitem->votes : ''), array('class' => 'hover-star', 'title' => 'Ok')); ?>

				<?php echo Form::radio('vote', $checked = 4,Input::post('vote', isset($voteitem) ? $voteitem->votes : ''), array('class' => 'hover-star', 'title' => 'Good')); ?>
		
				<?php echo Form::radio('vote', $checked = 5,Input::post('vote', isset($voteitem) ? $voteitem->votes : ''), array('class' => 'hover-star', 'title' => 'Verygood')); ?>


		<span id="hover-test" style="margin:0 0 0 20px;">Rate</span>
		<br><br>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>
