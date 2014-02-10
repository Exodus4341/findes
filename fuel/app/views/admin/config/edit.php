<h2>Editing Config</h2>
<br>

<?php echo render('admin\config/_form'); ?>
<p>
	<?php echo Html::anchor('admin/config/view/'.$config->id, 'View'); ?> |
	<?php echo Html::anchor('admin/config', 'Back'); ?></p>
