<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>

<h3 style="margin-left:15px;">Users</h3>

<br>
<?php if ($users): ?>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover display" id="example" width="100%" >
	<thead>
		<tr>
			<th>Username</th>
			<th>Group</th>
			<th>Email</th>
			<th>Active</th>
			<th>Type</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $user): ?>		<tr>

			<td><?php echo $user->username; ?></td>
			<td><?php echo $user->group; ?></td>
			<td><?php echo $user->email; ?></td>
			<td><?php echo $user->active; ?></td>
			<td><?php echo $user->type; ?></td>
			<td>
				<?php echo Html::anchor('admin/users/view/'.$user->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('admin/users/edit/'.$user->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('admin/users/delete/'.$user->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>

<tfoot>
		<tr>
			<th>Username</th>
			<th>Group</th>
			<th>Email</th>
			<th>Active</th>
			<th>Type</th>
			<th></th>
		</tr>
</tfoot>

</table>

<div id="paginate" style="float:right"></div><br><br>      
<div id="status" style="float:right; margin-right:-150px"></div> 

<?php else: ?>
<p>No Users.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/users/create', 'Add User', array('class' => 'btn btn-success')); ?>

</p>
