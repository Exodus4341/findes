<h2>Viewing #<?php echo $roadlocation->id; ?></h2>

<p>
	<strong>Lat:</strong>
	<?php echo $roadlocation->lat; ?></p>
<p>
	<strong>Lon:</strong>
	<?php echo $roadlocation->lon; ?></p>
<p>
	<strong>Landmarkd id:</strong>
	<?php echo $roadlocation->landmark_id; ?></p>

<?php echo Html::anchor('admin/roadlocation/edit/'.$roadlocation->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/roadlocation', 'Back'); ?>