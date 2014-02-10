<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>
<h4 style="margin-left:15px;">Viewing :<?php echo $comment->name; ?></h4>
<br><br>
<p>
	<strong>Name:</strong>
	<?php echo $comment->name; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $comment->email; ?></p>

<p>
	<strong>Message:</strong>
	<?php echo $comment->message; ?></p>
<p>
	<strong>Landmark id:</strong>
	<?php echo $comment->landmark->placename; ?></p>

<?php echo Html::anchor('admin/comments/edit/'.$comment->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/comments', 'Back'); ?>