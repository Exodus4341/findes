<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>

<h3 style="margin-left:15px;">Configurations</h3>

<br>
<?php if ($configs): ?>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover display" id="example" width="100%" >
	<thead>
		<tr>
			<th>Default currency</th>
			<th>Jeepney maxspeed</th>
			<th>Jeepney minspeed</th>
			<th>Tricycle maxspeed</th>
			<th>Tricycle minspeed</th>
			<th>Route tolerance</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($configs as $config): ?>		<tr>

			<td><?php echo $config->default_currency; ?></td>
			<td><?php echo $config->jeepney_maxspeed; ?></td>
			<td><?php echo $config->jeepney_minspeed; ?></td>
			<td><?php echo $config->tricycle_maxspeed; ?></td>
			<td><?php echo $config->tricycle_minspeed; ?></td>
			<td><?php echo $config->route_tolerance; ?></td>
			<td>
				<?php echo Html::anchor('admin/config/view/'.$config->id, 'View'); ?> |
				<?php echo Html::anchor('admin/config/edit/'.$config->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/config/delete/'.$config->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<div id="paginate" style="float:right"></div><br><br>      
<div id="status" style="float:right; margin-right:50px"></div> 


<?php else: ?>
<p>No Configs.</p>

<?php endif; ?>


<!-- Button trigger modal -->
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
  Add Configuration
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Configuration</h4>
      </div>
      <div class="modal-body">
        <?php echo Form::open(array('method' => 'post', 'action' => 'admin/config/create')); ?>

				<fieldset>
					<div class="clearfix">
						<?php echo Form::label('Default currency', 'default_currency'); ?>

						<div class="input">
							<?php echo Form::input('default_currency','', array('class' => 'span4')); ?>

						</div>
					</div>
					<div class="clearfix">
						<?php echo Form::label('Jeepney maxspeed', 'jeepney_maxspeed'); ?>

						<div class="input">
							<?php echo Form::input('jeepney_maxspeed', '', array('class' => 'span4')); ?>

						</div>
					</div>
					<div class="clearfix">
						<?php echo Form::label('Jeepney minspeed', 'jeepney_minspeed'); ?>

						<div class="input">
							<?php echo Form::input('jeepney_minspeed', '', array('class' => 'span4')); ?>

						</div>
					</div>
					<div class="clearfix">
						<?php echo Form::label('Tricycle maxspeed', 'tricycle_maxspeed'); ?>

						<div class="input">
							<?php echo Form::input('tricycle_maxspeed', '', array('class' => 'span4')); ?>

						</div>
					</div>
					<div class="clearfix">
						<?php echo Form::label('Tricycle minspeed', 'tricycle_minspeed'); ?>

						<div class="input">
							<?php echo Form::input('tricycle_minspeed', '', array('class' => 'span4')); ?>

						</div>
					</div>
					<div class="clearfix">
						<?php echo Form::label('Route tolerance', 'route_tolerance'); ?>

						<div class="input">
							<?php echo Form::input('route_tolerance', '', array('class' => 'span4')); ?>

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
