<h2>Viewing #<?php echo $puvtype->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $puvtype->name; ?></p>
<p>
	<strong>Icon url:</strong>
	<?php echo $puvtype->icon_url; ?></p>

<?php echo Html::anchor('admin/puvtype/edit/'.$puvtype->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/puvtype', 'Back'); ?>