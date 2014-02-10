<h2>Viewing #<?php echo $voteitem->id; ?></h2>

<p>
	<strong>Landmark id:</strong>
	<?php echo $voteitem->landmark_id; ?></p>
<p>
	<strong>Votes:</strong>
	<?php echo $voteitem->votes; ?></p>
<p>
	<strong>Nrates:</strong>
	<?php echo $voteitem->nrates; ?></p>

<?php echo Html::anchor('admin/voteitems/edit/'.$voteitem->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/voteitems', 'Back'); ?>