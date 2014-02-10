<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>

<h3 style="margin-left:15px;">Tilemaps</h3>

<br>
<?php if ($tilemaps): ?>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover display" id="example" width="100%" >
	<thead>
		<tr>
			<th>Mapname</th>
			<th>Source</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($tilemaps as $tilemap): ?>		<tr>

			<td><?php echo $tilemap->mapname; ?></td>
			<td><?php echo $tilemap->source; ?></td>
			<td>
				<?php echo Html::anchor('admin/tilemaps/view/'.$tilemap->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('admin/tilemaps/edit/'.$tilemap->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('admin/tilemaps/delete/'.$tilemap->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>


<div id="paginate" style="float:right"></div><br><br>      
<div id="status" style="float:right; margin-right:50px"></div> 

<?php else: ?>
<p>No Tilemaps.</p>

<?php endif; ?>


<!-- Button trigger modal -->
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
  Add Tilemap
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tilemap</h4>
      </div>
      <div class="modal-body">
      	<i>Note: You can upload up to 10MB.</i>
        <?php echo Form::open(array('onreset' => 'resetForm()','enctype' => 'multipart/form-data', 'method' => 'post', 'action' => 'admin/tilemaps/create','id' => 'upload' ));?>

		<fieldset>
			<div class="clearfix">
				<?php echo Form::label('Mapname', 'mapname'); ?>

				<div class="input">
					<?php echo Form::input('mapname','', array('class' => 'span4')); ?>

				</div>
			</div>

			 <div>     
			            <label for="fileselect">Files to upload:</label>

			<span class="btn btn-success fileinput-button">
			                            <i class="icon-plus icon-white"></i>
			                            <span>Add files...</span>
			                 
			<?php echo Form::input('fileselect[]', 'upload', array('type' => 'file', 'multiple' =>'true', 'id' => 'fileselect')); ?> 
			</span>
			    
			                    
			</div>

		</fieldset>


		<div id="progress"></div>

		<div id="messages">
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
    </div><!-- /.modal-content -->
    <?php echo Form::close(); ?>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->