<?php echo Form::open(array('onreset' => 'resetForm()','enctype' => 'multipart/form-data', 'method' => 'post', 'action' => 'admin/landmarkphotos/create','id' => 'upload' ));?>

<fieldset>

<div class="clearfix">
            <?php echo Form::label('Select Landmark', 'landmark_id'); ?>

            <div class="input">
                <?php echo Form::select('landmark_id', Input::post('landmark_id', isset($landmarkphoto) ? $landmarkphoto->landmark_id : ''),$landmarks, array('class' => 'span4')); ?>

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
<?php  echo Form::close(); ?>
