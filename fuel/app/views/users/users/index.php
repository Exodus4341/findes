<h3>User Profile</h3>
<br>
<?php if ($users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th>Email</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $user): ?>		<tr>

			<td><?php echo $user->username; ?></td>
			<td><?php echo $user->password; ?></td>
			<td><?php echo $user->email; ?></td>
			<td>
				<?php //echo Html::anchor('users/users/view/'.$user->id, 'View'); ?>
				<?php echo Html::anchor('users/users/edit/'.$user->id, 'Edit'); ?> 
				<?php //echo Html::anchor('users/users/delete/'.$user->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<div id="paginate" style="float:right"></div><br><br>      
<div id="status" style="float:right; margin-right:-150px"></div>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?><p>
	<?php //echo Html::anchor('users/users/create', 'Add new User', array('class' => 'btn btn-success')); ?>

</p>
