<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Categories', 'categories'); ?>

			<div class="input">
				<?php echo Form::input('categories', Input::post('categories', isset($landmarkcategory) ? $landmarkcategory->categories : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Category icon', 'category_icon'); ?>

			<div class="input">
				<?php echo Form::textarea('category_icon', Input::post('category_icon', isset($landmarkcategory) ? $landmarkcategory->category_icon : ''), array('class' => 'span8', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php //echo Form::label('Pid', 'pid'); ?>

			<div class="input">
				<?php echo Form::input('pid', Input::post('pid', isset($landmarkcategory) ? $landmarkcategory->pid : ''), array('class' => 'span4','type'=>'hidden')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>