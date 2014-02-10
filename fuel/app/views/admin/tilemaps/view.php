<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>
<h4 style="margin-left:15px;">Viewing :<?php echo $tilemap->mapname; ?></h4>

<br><br>

<p>
	<strong>Mapname:</strong>
	<?php echo $tilemap->mapname; ?></p>
<p>
	<strong>Source:</strong>
	<?php echo $tilemap->source; ?></p>

<?php echo Html::anchor('admin/tilemaps/edit/'.$tilemap->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/tilemaps', 'Back'); ?>