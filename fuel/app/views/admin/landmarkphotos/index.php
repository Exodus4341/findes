<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>

<h3 style="margin-left:15px;">Landmark Photos</h3>

<?php if ($landmarkphotos): ?>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover display" id="example" width="100%" >
	<thead>
		<tr>
			<th></th>
			<th>Landmark</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($landmarkphotos as $landmarkphoto): ?>		<tr>

			<td><br><?php echo Html::img('uploads/landmarks/'.$landmarkphoto->landmark_id.'/thumb/'.$landmarkphoto->fileurl,array('class' => 'image')); ?></td>
			<td><?php echo $landmarkphoto->landmark->placename; ?></td>
			<td>
				<?php echo Html::anchor('admin/landmarkphotos/view/'.$landmarkphoto->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('admin/landmarkphotos/edit/'.$landmarkphoto->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('admin/landmarkphotos/delete/'.$landmarkphoto->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<div id="paginate" style="float:right"></div><br><br>      
<div id="status" style="float:right; margin-right:-150px"></div> 

<?php else: ?>
<p>No Landmarkphotos.</p>

<?php endif; ?>



<!-- Button trigger modal -->
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
  Upload Landmark Photos
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Landmark</h4>
      </div>
      <div class="modal-body">
        

      	<?php echo Form::open(array('onreset' => 'resetForm()','enctype' => 'multipart/form-data', 'method' => 'post', 'action' => 'admin/landmarkphotos/create','id' => 'upload' ));?>

			<fieldset>

				<div class="clearfix">
				            <?php echo Form::label('Select Landmark', 'landmark_id'); ?>

				            <div class="input">
				                <?php echo Form::select('landmark_id', '',$landmarks, array('class' => 'span4')); ?>

				            </div>
				</div>
				  

				 <div>     
				            <label for="fileselect">Select file to upload:</label>

				<span class="btn btn-success fileinput-button">
				                            <i class="icon-plus icon-white"></i>
				                            <span>Add files...</span>
				                 
				<?php echo Form::input('fileselect[]', 'upload', array('type' => 'file', 'id' => 'fileselect')); ?> 
				</span>
				    


<!-- 
				            <button type="reset" class="btn btn-warning cancel">
				                    <i class="icon-ban-circle icon-white"></i>
				                    <span>Cancel upload</span>
				            </button> -->


				                    
				</div>
			</fieldset>

			<!-- <div id="progress"></div> -->

			<div id="messages" style ="height:200px;">
			<p>Status Messages</p>
			</div>
			



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
				            <button type="submit" class="btn btn-primary start">
				                    <i class="icon-upload icon-white"></i>
				                    <span>Start upload</span>
				            </button>
      </div>
      <?php  echo Form::close(); ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




