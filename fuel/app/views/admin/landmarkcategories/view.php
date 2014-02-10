<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>
<h4 style="margin-left:15px;">Viewing: <?php echo $landmarkcategory->categories; ?></h4>

<br><br>

<p>
	<strong>Categories:</strong>
	<?php echo $landmarkcategory->categories; ?></p>
<p>
	<strong>Category icon:</strong>
	<?php echo $landmarkcategory->category_icon; ?></p>
<p>
	<strong>Pid:</strong>
	<?php echo $landmarkcategory->pid; ?></p>

<?php echo Html::anchor('admin/landmarkcategories/edit/'.$landmarkcategory->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/landmarkcategories', 'Back'); ?>