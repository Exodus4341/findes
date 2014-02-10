<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>
<h4 style="margin-left:15px;">Viewing :<?php echo $puv->puvtype->name; ?></h4>
<br><br>

<p>
	<strong>Fare type:</strong>
	<?php echo $puv->faretype; ?></p>
<p>
	<strong>Initial succeeding fare:</strong>
	<?php echo $puv->initsucc; ?></p>
<p>
	<strong>Succeeding fare:</strong>
	<?php echo $puv->succfare; ?></p>
<p>
	<strong>Initial distance:</strong>
	<?php echo $puv->initdis; ?></p>
<p>
	<strong>Succeeding distance:</strong>
	<?php echo $puv->succdis; ?></p>

<?php echo Html::anchor('admin/puv/edit/'.$puv->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/puv', 'Back'); ?>