<h2>Editing Tilemap</h2>
<br>

<?php echo render('admin\tilemaps/_form'); ?>
<p>
	<?php echo Html::anchor('admin/tilemaps/view/'.$tilemap->id, 'View'); ?> |
	<?php echo Html::anchor('admin/tilemaps', 'Back'); ?></p>
