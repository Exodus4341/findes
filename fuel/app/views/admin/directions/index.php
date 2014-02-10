<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>

<h3 style="margin-left:15px;">Directions</h3>
<br>
<?php if ($directions): ?>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover display" id="example" width="100%" >
	<thead>
		<tr>
			<th>Directionname</th>
			<th>Jeepneyprefix</th>
			<th>Tricycleprefix</th>
			<th>Midfix</th>
			<th>Postfix</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($directions as $direction): ?>		<tr>

			<td><?php echo $direction->directionname; ?></td>
			<td><?php echo $direction->jeepneyprefix; ?></td>
			<td><?php echo $direction->tricycleprefix; ?></td>
			<td><?php echo $direction->midfix; ?></td>
			<td><?php echo $direction->postfix; ?></td>
			<td>
				<?php echo Html::anchor('admin/directions/view/'.$direction->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('admin/directions/edit/'.$direction->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('admin/directions/delete/'.$direction->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<div id="paginate" style="float:right"></div><br><br>      
<div id="status" style="float:right; margin-right:50px"></div> 

<?php else: ?>
<p>No Directions.</p>

<?php endif; ?>



<!-- Button trigger modal -->
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
 	Add Direction
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Direction</h4>
      </div>
      <div class="modal-body">
        <?php echo Form::open(array('method' => 'post', 'action' => 'admin/directions/create')); ?>

			<fieldset>
				<div class="clearfix">
					<?php echo Form::label('Direction name', 'directionname'); ?>

					<div class="input">
						<?php echo Form::input('directionname', '', array('class' => 'span4')); ?>

					</div>
				</div>
				<div class="clearfix">
					<?php echo Form::label('Jeepney prefix', 'jeepneyprefix'); ?>

					<div class="input">
						<?php echo Form::input('jeepneyprefix', '', array('class' => 'span4')); ?>

					</div>
				</div>
				<div class="clearfix">
					<?php echo Form::label('Tricycle prefix', 'tricycleprefix'); ?>

					<div class="input">
						<?php echo Form::input('tricycleprefix','', array('class' => 'span4')); ?>

					</div>
				</div>
				<div class="clearfix">
					<?php echo Form::label('Midfix', 'midfix'); ?>

					<div class="input">
						<?php echo Form::input('midfix', '', array('class' => 'span4')); ?>

					</div>
				</div>
				<div class="clearfix">
					<?php echo Form::label('Postfix', 'postfix'); ?>

					<div class="input">
						<?php echo Form::input('postfix', '', array('class' => 'span4')); ?>

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
