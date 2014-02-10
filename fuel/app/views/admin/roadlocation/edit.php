<h2>Editing Roadlocation</h2>
<br>

<?php echo render('admin\roadlocation/_form'); ?>
<p>
	<?php echo Html::anchor('admin/roadlocation/view/'.$roadlocation->id, 'View'); ?> |
	<?php echo Html::anchor('admin/roadlocation', 'Back'); ?></p>
