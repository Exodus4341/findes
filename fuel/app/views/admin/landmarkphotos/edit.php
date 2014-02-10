<h2>Editing Landmarkphoto</h2>
<br>

<?php echo render('admin\landmarkphotos/_form'); ?>
<p>
	<?php echo Html::anchor('admin/landmarkphotos/view/'.$landmarkphoto->id, 'View'); ?> |
	<?php echo Html::anchor('admin/landmarkphotos', 'Back'); ?></p>
