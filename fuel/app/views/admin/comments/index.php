<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>

<h3 style="margin-left:15px;">Comments</h3>

<br>
<?php if ($comments): ?>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover display" id="example" width="100%" >
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Message</th>
			<th>Landmark</th>
			<th>&nbsp&nbsp&nbspAction&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($comments as $comment): ?>		<tr>

			<td><?php echo $comment->name; ?></td>
			<td><?php echo $comment->email; ?></td>
			<td><p class="seemore"><?php echo $comment->message; ?></p></td>
			<td><?php echo $comment->landmark->placename; ?></td>
			<td>
				<?php echo Html::anchor('admin/comments/view/'.$comment->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('admin/comments/edit/'.$comment->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('admin/comments/delete/'.$comment->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>

</table>

<div id="paginate" style="float:right"></div><br><br>      
<div id="status" style="float:right; margin-right:50px"></div> 

<?php else: ?>
<p>No Comments.</p>

<?php endif; ?>


<!-- Button trigger modal -->
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
  Add Comment
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Comment</h4>
      </div>
      <div class="modal-body">
        <?php echo Form::open(array('method' => 'post', 'action' => 'admin/comments/create')); ?>

					<fieldset>
						<div class="clearfix">
							<?php //echo Form::label('Name', 'name'); ?>

							<div class="input">
								<?php echo Form::input('name', ' ', array('class' => 'span4', 'type' => 'hidden')); ?>

							</div>
						</div>
						<div class="clearfix">
							<?php //echo Form::label('Email', 'email'); ?>

							<div class="input">
								<?php echo Form::input('email', ' ', array('class' => 'span4', 'type' => 'hidden')); ?>

							</div>
						</div>
				
						<div class="clearfix">
							<?php echo Form::label('Message', 'message'); ?>

							<div class="input">
								<?php echo Form::textarea('message', '', array('class' => 'span6', 'rows' => 8)); ?>

							</div>
						</div>
						<div class="clearfix">
							<?php echo Form::label('Landmark id', 'landmark_id'); ?>

							<div class="input">
								<?php echo Form::select('landmark_id', '',$landmarks, array('class' => 'span4')); ?>

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

