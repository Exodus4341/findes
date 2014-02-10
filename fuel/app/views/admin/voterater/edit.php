<h2>Editing Voterater</h2>
<br>

<?php echo render('admin\voterater/_form'); ?>
<p>
	<?php echo Html::anchor('admin/voterater/view/'.$voterater->id, 'View'); ?> |
	<?php echo Html::anchor('admin/voterater', 'Back'); ?></p>
