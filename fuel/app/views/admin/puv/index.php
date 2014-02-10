<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>

<h3 style="margin-left:15px;">Fare Cost</h3>

<br>
<?php if ($puvs): ?>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover display" id="example" width="100%">
	<thead>
		<tr>
			<th>Puv type</th>
			<th>Fare type</th>
			<th>Initial succeeding fare</th>
			<th>Succeeding fare</th>
			<th>Initial distance</th>
			<th>Succeeding distance</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($puvs as $puv): ?>		<tr>

			<td><?php echo $puv->puvtype->name; ?></td>
			<td><?php echo $puv->faretype; ?></td>
			<td><?php echo $puv->initsucc; ?></td>
			<td><?php echo $puv->succfare; ?></td>
			<td><?php echo $puv->initdis .'<i> km</i>'; ?></td>
			<td><?php echo $puv->succdis .'<i> km</i>'; ?></td>
			<td>
				<?php echo Html::anchor('admin/puv/view/'.$puv->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('admin/puv/edit/'.$puv->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('admin/puv/delete/'.$puv->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<div id="paginate" style="float:right"></div><br><br>      
<div id="status" style="float:right; margin-right:50px"></div> 


<?php else: ?>
<p>No Puvs.</p>

<?php endif; ?>


<!-- Button trigger modal -->
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
  Add Fare Cost
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Fare Cost</h4>
      </div>
      <div class="modal-body">
        <?php echo Form::open(array('method' => 'post', 'action' => 'admin/puv/create')); ?>

				<fieldset>
					<div class="clearfix">
						<?php echo Form::label('Public Utility Vehicle Type', 'puv_id'); ?>

						<div class="input">
							<?php echo Form::select('puv_id','',$puvtypes,array('class' => 'span4')); ?>

						</div>
					</div>
					<div class="clearfix">
						<?php echo Form::label('Fare type', 'faretype'); ?>

						<div class="input">
							<?php echo Form::input('faretype','', array('class' => 'span4')); ?>

						</div>
					</div>
					<div class="clearfix">
						<?php echo Form::label('Initial Succeeding Fare', 'initsucc'); ?>

						<div class="input">
							<?php echo Form::input('initsucc','', array('class' => 'span4')); ?>

						</div>
					</div>
					<div class="clearfix">
						<?php echo Form::label('Succeeding Fare', 'succfare'); ?>

						<div class="input">
							<?php echo Form::input('succfare','', array('class' => 'span4')); ?>

						</div>
					</div>
					<div class="clearfix">
						<?php echo Form::label('Initial Distance', 'initdis'); ?>

						<div class="input">
							<?php echo Form::input('initdis','', array('class' => 'span4')); ?>

						</div>
					</div>
					<div class="clearfix">
						<?php echo Form::label('Succeeding Distance', 'succdis'); ?>

						<div class="input">
							<?php echo Form::input('succdis','', array('class' => 'span4')); ?>

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
