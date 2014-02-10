<h2>Editing Landmarkcategory</h2>
<br>

<?php echo render('admin\landmarkcategories/_form'); ?>
<p>
	<?php echo Html::anchor('admin/landmarkcategories/view/'.$landmarkcategory->id, 'View'); ?> |
	<?php echo Html::anchor('admin/landmarkcategories', 'Back'); ?></p>
