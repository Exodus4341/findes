<h2>Editing Voteitem</h2>
<br>

<?php echo render('admin\voteitems/_form'); ?>
<p>
	<?php echo Html::anchor('admin/voteitems/view/'.$voteitem->id, 'View'); ?> |
	<?php echo Html::anchor('admin/voteitems', 'Back'); ?></p>
