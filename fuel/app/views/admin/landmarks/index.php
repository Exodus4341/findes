<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>

<h3 style="margin-left:15px;">Landmarks</h3>

<br>
<?php if ($landmarks): ?>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped display" id="example" width="100%" >
	<thead>
		<tr>
			<th></th>
			<th>Reviews</th>
			<th>Category</th>
			<th>Action&nbsp</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($landmarks as $landmark): ?>		<tr>

			<td style="padding-bottom:20px;">
				<div>
				<p style="font-size: 20px; border-bottom:1px solid #B3B3B3; padding-top:5px; width:500px;"><b><?php echo Html::anchor('admin/landmarks/view/'.$landmark->slug, $landmark->placename) ; ?></b></p>
				<p style="margin-top:-20px; width:500px;"><i><?php echo $landmark->description; ?></i></p>
				</div>	
					<div class="span4">
						<div><?php echo Html::anchor('admin/landmarks/view/'.$landmark->slug, Html::img('uploads/landmarks/'.$landmark->placename.'/thumb/'.$landmark->fileurl,array('class' => 'image')));?></div>
					</div>
			</td>
			<td><?php $numrates = 0; 
					foreach ($landmark->voteitems as $voteitem): ?>
			 			<?php
			 			$numrates = $voteitem->nrates;
			 			?>
			   <?php endforeach; 
			   echo $numrates?>
			</td>
			
			<td><?php echo $landmark->landmarkcategory->categories; ?></td>
			
			<td>
				<?php echo Html::anchor('admin/landmarks/view/'.$landmark->slug, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('admin/landmarks/edit/'.$landmark->id,'<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('admin/landmarks/delete/'.$landmark->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<div id="paginate" style="float:right"></div><br><br>      
<div id="status" style="float:right; margin-right:50px"></div> 

<?php else: ?>
<p>No Landmarks.</p>

<?php endif; ?>



<!-- Button trigger modal -->
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
  Add Landmark
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
        
      	<?php echo Form::open(array('onreset' => 'resetForm()', 'enctype' => 'multipart/form-data', 'method' => 'post', 'action' => 'admin/landmarks/create','id' => 'upload'));?>

					<fieldset>
						<div class="clearfix">
							<?php echo Form::label('Placename', 'placename'); ?>

							<div class="input">
								<?php echo Form::input('placename', '', array('class' => 'span4', 'required' => '')); ?>

							</div>
						</div>

						<div class="clearfix">
							<?php echo Form::label('Category', 'landmarkcategory_id'); ?>

							<div class="input">
								<?php echo Form::select('landmarkcategory_id', '',$landmarkcategory, array('class' => 'span4', 'required' => '')); ?>

							</div>
						</div>

						<div class="clearfix">
							<?php echo Form::label('Latitude', 'latitude'); ?>

							<div class="input">
								<?php echo Form::input('latitude', '', array('class' => 'span4', 'required' => '')); ?>

							</div>
						</div>
						<div class="clearfix">
							<?php echo Form::label('Longitude', 'longitude'); ?>

							<div class="input">
								<?php echo Form::input('longitude', '', array('class' => 'span4', 'required' => '')); ?>

							</div>
						</div>
						<div class="clearfix">
							<?php echo Form::label('Description', 'description'); ?>

							<div class="input">
								<?php echo Form::textarea('description', '', array('class' => 'span6', 'rows' => 8, 'required' => '')); ?>

							</div>
						</div>
						<div class="clearfix">
							<?php echo Form::label('History', 'history'); ?>

							<div class="input">
								<?php echo Form::textarea('history', '', array('class' => 'span6', 'rows' => 8, 'required' => '')); ?>

							</div>
						</div>

						<div class="clearfix">
							<?php //echo Form::label('Posted by', 'user_id'); ?>

							<div class="input">
								<?php echo Form::input('user_id', '',array('class' => 'span4', 'type'=>'hidden')); ?>

							</div>
						</div>
						
							<div>
								<div>     
					            <label for="fileselect">Photo to upload:</label>

								<span class="btn btn-success fileinput-button">
					                            <i class="icon-plus icon-white"></i>
					                            <span>Add photo...</span>
					                
								<?php       echo Form::input('fileselect', 'upload', array('type' => 'file', 'id' => 'fileselect', 'required' => '')); ?> 
								</span>


								</div>

								<!-- <div id="progress"></div> -->

								<div id="messages" style ="height:380px;">
								<p>Status Messages</p>
								</div>
							</div>
						

						<br>

					</fieldset>
				

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
      </div>
      <?php echo Form::close(); ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


