<?php echo Form::open(array('enctype' => 'multipart/form-data','onreset' => 'resetForm()', 'method' => 'post', 'action' => 'admin/tilemaps/create','id' => 'upload' ));?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Mapname', 'mapname'); ?>

			<div class="input">
				<?php echo Form::input('mapname', Input::post('mapname', isset($tilemap) ? $tilemap->mapname : ''), array('class' => 'span4')); ?>

			</div>
		</div>





		 <div>     
		            <label for="fileselect">Files to upload:</label>

		<span class="btn btn-success fileinput-button">
		                            <i class="icon-plus icon-white"></i>
		                            <span>Add files...</span>
		                 
		<?php echo Form::input('fileselect[]', 'upload', array('type' => 'file', 'multiple' =>'true', 'id' => 'fileselect')); ?> 
		</span>
		    


		            <button type="submit" class="btn btn-primary start">
		                    <i class="icon-upload icon-white"></i>
		                    <span>Start upload</span>
		            </button>

		            <button type="reset" class="btn btn-warning cancel">
		                    <i class="icon-ban-circle icon-white"></i>
		                    <span>Cancel upload</span>
		            </button>


		                    
		</div>

	</fieldset>



<div id="progress"></div>

<div id="messages">
<p>Status Messages</p>
</div>

<?php echo Form::close(); ?>