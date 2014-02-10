<h2>Listing Puvtypes</h2>
<br>
<?php if ($puvtypes): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Icon url</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($puvtypes as $puvtype): ?>		<tr>

			<td><?php echo $puvtype->name; ?></td>
			<td><?php echo $puvtype->icon_url; ?></td>
			<td>
				<?php echo Html::anchor('admin/puvtype/view/'.$puvtype->id, 'View'); ?> |
				<?php echo Html::anchor('admin/puvtype/edit/'.$puvtype->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/puvtype/delete/'.$puvtype->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Puvtypes.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/puvtype/create', 'Add new Puvtype', array('class' => 'btn btn-success')); ?>

</p>
