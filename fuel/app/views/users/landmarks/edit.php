<h2>Editing Landmark</h2>
<br>

<?php echo render('admin\landmarks/_form'); ?>
<p>
	<?php echo Html::anchor('admin/landmarks/view/'.$landmark->id, 'View'); ?> |
	<?php echo Html::anchor('admin/landmarks', 'Back'); ?></p>
