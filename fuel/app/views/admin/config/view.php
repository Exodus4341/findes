<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>
<h4 style="margin-left:15px;">Viewing :<?php echo  $config->id; ?></h4>
<br><br>

<p>
	<strong>Default currency:</strong>
	<?php echo $config->default_currency; ?></p>
<p>
	<strong>Jeepney maxspeed:</strong>
	<?php echo $config->jeepney_maxspeed; ?></p>
<p>
	<strong>Jeepney minspeed:</strong>
	<?php echo $config->jeepney_minspeed; ?></p>
<p>
	<strong>Tricycle maxspeed:</strong>
	<?php echo $config->tricycle_maxspeed; ?></p>
<p>
	<strong>Tricycle minspeed:</strong>
	<?php echo $config->tricycle_minspeed; ?></p>
<p>
	<strong>Route tolerance:</strong>
	<?php echo $config->route_tolerance; ?></p>

<?php echo Html::anchor('admin/config/edit/'.$config->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/config', 'Back'); ?>