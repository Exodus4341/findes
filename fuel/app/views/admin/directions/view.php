<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>
<h4 style="margin-left:15px;">Viewing :<?php echo $direction->directionname; ?></h4>
<br><br>

<p>
	<strong>Jeepneyprefix:</strong>
	<?php echo $direction->jeepneyprefix; ?></p>
<p>
	<strong>Tricycleprefix:</strong>
	<?php echo $direction->tricycleprefix; ?></p>
<p>
	<strong>Midfix:</strong>
	<?php echo $direction->midfix; ?></p>
<p>
	<strong>Postfix:</strong>
	<?php echo $direction->postfix; ?></p>

<?php echo Html::anchor('admin/directions/edit/'.$direction->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/directions', 'Back'); ?>