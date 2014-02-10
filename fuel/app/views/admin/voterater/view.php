<h2>Viewing #<?php echo $voterater->id; ?></h2>

<p>
	<strong>Raters:</strong>
	<?php echo $voterater->raters; ?></p>
<p>
	<strong>Landmark id:</strong>
	<?php echo $voterater->landmark_id; ?></p>

<?php echo Html::anchor('admin/voterater/edit/'.$voterater->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/voterater', 'Back'); ?>