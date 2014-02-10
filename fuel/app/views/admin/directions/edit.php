<h2>Editing Direction</h2>
<br>

<?php echo render('admin\directions/_form'); ?>
<p>
	<?php echo Html::anchor('admin/directions/view/'.$direction->id, 'View'); ?> |
	<?php echo Html::anchor('admin/directions', 'Back'); ?></p>
