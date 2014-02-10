<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>

<h3 style="margin-left:15px;">Roadlocations</h3>

<br>

<?php if ($roadlocations): ?>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped display" id="example" width="100%" >
	<thead>
		<tr>
			<th>Lat</th>
			<th>Lon</th>
			<th>Landmark</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

<?php foreach ($roadlocations as $roadlocation): ?>		<tr>

			<td><?php echo $roadlocation->lat; ?></td>
			<td><?php echo $roadlocation->lon; ?></td>
			<td><?php echo $roadlocation->landmark->placename; ?></td>
			<td>
				<?php echo Html::anchor('admin/roadlocation/view/'.$roadlocation->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('admin/roadlocation/edit/'.$roadlocation->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('admin/roadlocation/delete/'.$roadlocation->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>
<br><br>

<?php else: ?>
<p>No Roadlocations.</p>

<?php endif; ?>


<!-- Button trigger modal -->
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
  Add Road Location
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Road Location</h4>
      </div>
      <div class="modal-body">
        
      	<?php echo Form::open(array('method' => 'post', 'action' => 'admin/roadlocation/create')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Lat', 'lat'); ?>

			<div class="input">
				<?php echo Form::input('lat','', array('class' => 'span4', 'required' => '')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Lon', 'lon'); ?>

			<div class="input">
				<?php echo Form::input('lon','', array('class' => 'span4', 'required' => '')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Landmark id', 'landmark_id'); ?>

			<div class="input">
				<?php echo Form::select('landmark_id', Input::post('landmark_id', isset($roadlocation) ? $roadlocation->landmark_id : ''),$landmarkname, array('class' => 'span4')); ?>

			</div>
		</div>
	
	</fieldset>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
      </div>
    </div><!-- /.modal-content -->
    <?php echo Form::close(); ?>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
