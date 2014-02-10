<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>

<h3 style="margin-left:15px;">Landmarks</h3>

<br>
<?php if ($landmarks): ?>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped display" id="example" width="100%" >
	<thead>
		<tr>
			<th></th>
			<th>Reviews</th>
			<th>Category</th>
			<th>Action&nbsp</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($landmarks as $landmark): ?>		<tr>

			<td style="padding-bottom:20px;">
				<div>
				<p style="font-size: 20px; border-bottom:1px solid #B3B3B3; padding-top:5px; width:500px;"><b><?php echo Html::anchor('users/landmarks/view/'.$landmark->slug, $landmark->placename) ; ?></b></p>
				<p style="margin-top:-20px; width:500px;"><i><?php echo $landmark->description; ?></i></p>
				</div>	
					<div class="span4">
						<div><?php echo Html::anchor('landmarks/view/'.$landmark->slug, Html::img('uploads/landmarks/'.$landmark->placename.'/thumb/'.$landmark->fileurl,array('class' => 'image')));?></div>
					</div>
			</td>
			<td><?php $numrates = 0; 
					foreach ($landmark->voteitems as $voteitem): ?>
			 			<?php
			 			$numrates = $voteitem->nrates;
			 			?>
			   <?php endforeach; 
			   echo $numrates?>
			</td>
			
			<td><?php echo $landmark->landmarkcategory->categories; ?></td>
			
			<td>
				<?php echo Html::anchor('landmarks/view/'.$landmark->slug, '<i class="icon-eye-open" title="View"></i>'); ?>
				

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<div id="paginate" style="float:right"></div><br><br>      
<div id="status" style="float:right; margin-right:50px"></div> 

<?php else: ?>
<p>No Landmarks.</p>

<?php endif; ?>