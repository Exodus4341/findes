<h2>Listing Voteitems</h2>
<br>
<?php if ($voteitems): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Landmark id</th>
			<th>Votes</th>
			<th>Nrates</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($voteitems as $voteitem): ?>		<tr>

			<td><?php echo $voteitem->landmark->placename; ?></td>
			<td><?php echo $voteitem->votes/100 ."%" ; ?></td>
			<td><?php echo $voteitem->nrates; ?></td>
			<td>
				<?php echo Html::anchor('admin/voteitems/view/'.$voteitem->id, 'View'); ?> |
				<?php echo Html::anchor('admin/voteitems/edit/'.$voteitem->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/voteitems/delete/'.$voteitem->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Voteitems.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/voteitems/create', 'Add new Voteitem', array('class' => 'btn btn-success')); ?>

</p>
