
<?php echo Form::open(array('onreset' => 'resetForm()', 'enctype' => 'multipart/form-data', 'method' => 'post', 'action' => 'admin/jeepneyroute/create','id' => 'upload'));?>

        <fieldset>

         <div>
         <div class="clearfix">
            <?php echo Form::label('Route Name', 'routename'); ?>

            <div class="input">
                <?php echo Form::input('routename',Input::post('routename', isset($jeepneyroute) ? $jeepneyroute->routename : ''),array('class' => 'span4', 'required' => '')); ?>

            </div>
         </div>

         <div class="clearfix">
            <?php echo Form::label('Route Description', 'routedesc'); ?>

            <div class="input">
                <?php echo Form::textarea('routedesc',Input::post('routedesc', isset($jeepneyroute) ? $jeepneyroute->routedesc : ''),array('class' => 'span6', 'required' => '')); ?>

            </div>
         </div>     
                    <label for="fileselect">Files to upload:</label>

        <span class="btn btn-success fileinput-button">
                                    <i class="icon-plus icon-white"></i>
                                    <span>Add files...</span>
                        
        <?php       echo Form::input('fileselect[]', 'upload', array('type' => 'file', 'multiple' =>'true', 'id' => 'fileselect')); ?> 
        </span>



                    <button type="submit" class="btn btn-primary start">
                            <i class="icon-upload icon-white"></i>
                            <span>Start upload</span>
                    </button>

                    <!-- <button type="reset" class="btn btn-warning cancel">
                            <i class="icon-ban-circle icon-white"></i>
                            <span>Cancel upload</span>
                    </button> -->

        </div>
                            

        </fieldset>
        <?php  echo Form::close(); ?>

        <div id="progress"></div>

            <div id="messages">
            <p>Status Messages</p>
            </div>







