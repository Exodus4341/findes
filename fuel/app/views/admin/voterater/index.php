<h2>Listing Voteraters</h2>
<br>
<?php if ($voteraters): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Raters</th>
			<th>Landmark id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($voteraters as $voterater): ?>		<tr>

			<td><?php echo $voterater->raters; ?></td>
			<td><?php echo $voterater->landmark_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/voterater/view/'.$voterater->id, 'View'); ?> |
				<?php echo Html::anchor('admin/voterater/edit/'.$voterater->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/voterater/delete/'.$voterater->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Voteraters.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/voterater/create', 'Add new Voterater', array('class' => 'btn btn-success')); ?>

</p>
