<?php echo Form::open(array('onreset' => 'resetForm()', 'enctype' => 'multipart/form-data', 'method' => 'post', 'action' => 'admin/landmarks/create','id' => 'upload'));?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Placename', 'placename'); ?>

			<div class="input">
				<?php echo Form::input('placename', Input::post('placename', isset($landmark) ? $landmark->placename : ''), array('class' => 'span4', 'required' => '')); ?>

			</div>
		</div>


		<div class="clearfix">
			<?php echo Form::label('Category', 'landmarkcategory_id'); ?>

			<div class="input">
				<?php echo Form::select('landmarkcategory_id', Input::post('landmarkcategory_id', isset($landmark) ? $landmark->landmarkcategory_id : ''),$landmarkcategory, array('class' => 'span4', 'required' => '')); ?>

			</div>
		</div>


		<div class="clearfix">
			<?php echo Form::label('Reviews', 'reviews'); ?>

			<div class="input">
				<?php echo Form::input('reviews', Input::post('reviews', isset($landmark) ? $landmark->reviews : ''), array('class' => 'span4', 'required' => '')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Latitude', 'latitude'); ?>

			<div class="input">
				<?php echo Form::input('latitude', Input::post('latitude', isset($landmark) ? $landmark->latitude : ''), array('class' => 'span4', 'required' => '')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Longitude', 'longitude'); ?>

			<div class="input">
				<?php echo Form::input('longitude', Input::post('longitude', isset($landmark) ? $landmark->longitude : ''), array('class' => 'span4', 'required' => '')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Description', 'description'); ?>

			<div class="input">
				<?php echo Form::textarea('description', Input::post('description', isset($landmark) ? $landmark->description : ''), array('class' => 'span8', 'rows' => 8, 'required' => '')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('History', 'history'); ?>

			<div class="input">
				<?php echo Form::textarea('history', Input::post('history', isset($landmark) ? $landmark->history : ''), array('class' => 'span8', 'rows' => 8, 'required' => '')); ?>

			</div>
		</div>
		
		
			<div>
				<div>     
	            <label for="fileselect">Photo to upload:</label>

				<span class="btn btn-success fileinput-button">
	                            <i class="icon-plus icon-white"></i>
	                            <span>Add photo...</span>
	                
				<?php       echo Form::input('fileselect[]', 'upload', array('type' => 'file', 'multiple' =>'true', 'id' => 'fileselect')); ?> 
				</span>


	            <button type="reset" class="btn btn-warning cancel">
	                    <i class="icon-ban-circle icon-white"></i>
	                    <span>Cancel upload</span>
	            </button>

				</div>

				<div id="progress"></div>

				<div id="messages">
				<p>Status Messages</p>
				</div>
			</div>
		

		<br>


		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>