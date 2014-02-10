<h2>Viewing #<?php echo $landmarkphoto->id; ?></h2>

<p>
	<strong>Fileurl:</strong>
	<?php echo $landmarkphoto->fileurl; ?></p>
<p>
	<strong>Landmarkid:</strong>
	<?php echo $landmarkphoto->landmark->placename; ?></p>

<?php echo Html::anchor('admin/landmarkphotos/edit/'.$landmarkphoto->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/landmarkphotos', 'Back'); ?>