<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>

<h3 style="margin-left:15px;">Landmark Categories</h3>

<br>
<?php if ($landmarkcategories): ?>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover display" id="example" width="100%" >
	<thead>
		<tr>
			<th>Categories</th>
			<th>Category icon</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($landmarkcategories as $landmarkcategory): ?>		<tr>

			<td><?php echo $landmarkcategory->categories; ?></td>
			<td><?php echo $landmarkcategory->category_icon; ?></td>
			<td>
				<?php echo Html::anchor('admin/landmarkcategories/view/'.$landmarkcategory->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('admin/landmarkcategories/edit/'.$landmarkcategory->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('admin/landmarkcategories/delete/'.$landmarkcategory->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>

</table>


<div id="paginate" style="float:right"></div><br><br>      
<div id="status" style="float:right; margin-right:50px"></div> 

<?php else: ?>
<p>No Landmarkcategories.</p>

<?php endif; ?>


<!-- Button trigger modal -->
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
  Add Landmark Category
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Landmark Category</h4>
      </div>
      <div class="modal-body">
       
      	<?php echo Form::open(array('method' => 'post', 'action' => 'admin/landmarkcategories/create')); ?>

				<fieldset>
					<div class="clearfix">
						<?php echo Form::label('Categories', 'categories'); ?>

						<div class="input">
							<?php echo Form::input('categories', '', array('class' => 'span4')); ?>

						</div>
					</div>
					<div class="clearfix">
						<?php echo Form::label('Category icon', 'category_icon'); ?>

						<div class="input">
							<?php echo Form::input('category_icon', '', array('class' => 'span4')); ?>

						</div>
					</div>
					<div class="clearfix">
						<?php //echo Form::label('Pid', 'pid'); ?>

						<div class="input">
							<?php echo Form::input('pid', '', array('class' => 'span4','type'=>'hidden')); ?>

						</div>
					</div>
					
				</fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
      </div>
      <?php echo Form::close(); ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


