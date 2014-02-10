<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>

<h3 style="margin-left:15px;">Jeepney Routes</h3>

<br>
<?php if ($jeepneyroutes): ?>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover display" id="example" width="100%" >
	<thead>
		<tr>
			<th>Route Name</th>
			<th>Size</th>
			<th>Type</th>
			<th>Route Description</th>
			<th>Uploaded at</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($jeepneyroutes as $jeepneyroute): ?>		<tr>

			<td><?php echo Html::anchor('admin/jeepneyroute/view/'.$jeepneyroute->id,$jeepneyroute->routename); ?></td>
			<td><?php echo $jeepneyroute->size." "."KB"; ?></td>
			<td><?php echo $jeepneyroute->type; ?></td>

			<!-- parse jeepney route descriptions !-->
			<td>
				<p class="seemore">
			<?php
			    $route = simplexml_load_file(Config::get('base_url').'/uploads/jeepneyroute/'.$jeepneyroute->filename);
			   
			    $strnames = array();

			    for($x=0; $x<sizeof($route); $x++){
			    	
			        if($route->rte[$x]['name'] == ' '){
			            echo " ";
			        }
			        else if($x != 0){
			             if(!isDupss($strnames, $route->rte[$x]['name'])){
			                array_push($strnames, $route->rte[$x]['name']);
			             }
			        }
			        else{
			            if(!isDupss($strnames, $route->rte[$x]['name'])){
			                array_push($strnames, $route->rte[$x]['name']);
			            }
			        }

			    }

			    foreach ($strnames as $strname) {
			           echo $strname.' ';
			    }   

			       
			 ?>
				</p>
			</td>
			<!-- END parse jeepney route descriptions !-->

			<td><?php $date =date_create($jeepneyroute->created_at);
			echo date_format($date, 'F j, Y - l @ g:ia') ?></td>
			<td>
				<?php echo Html::anchor('admin/jeepneyroute/view/'.$jeepneyroute->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('admin/jeepneyroute/edit/'.$jeepneyroute->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('admin/jeepneyroute/delete/'.$jeepneyroute->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>


	
</table>

<div id="paginate" style="float:right"></div><br><br>      
<div id="status" style="float:right; margin-right:50px"></div> 


<?php else: ?>
<p>No Jeepneyroutes.</p>

<?php endif; ?>
<p>
	<?php echo Html::anchor('#inline_content', 'Upload Jeepney Route', array('class' => 'inline btn btn-success')); ?>

</p>



<!--ADD JeepneyRoute using inline CSS!-->
<div style="display:none">
		<div id="inline_content">

			<h4>Upload Jeepney Route</h4>

		<?php echo Form::open(array('onreset' => 'resetForm()', 'enctype' => 'multipart/form-data', 'method' => 'post', 'action' => 'admin/jeepneyroute/create','id' => 'upload'));?>

		<fieldset>

		 <div>
		 <div class="clearfix">
			<?php echo Form::label('Route Name', 'routename'); ?>

			<div class="input">
				<?php echo Form::input('routename','',array('class' => 'span4', 'required' => '')); ?>

			</div>
		 </div>

		 <!-- Parse the GPX !-->

		 <div class="clearfix">
			<?php //echo Form::label('Route Description', 'routedesc'); ?>

			<div class="input">
				<?php echo Form::input('routedesc','',array('class' => 'span6', 'type' => 'hidden')); ?>

			</div>
		 </div>     
		


		<label for="fileselect">Files to upload:</label>

		<span class="btn btn-success fileinput-button">
		                            <i class="icon-plus icon-white"></i>
		                            <span>Add files...</span>
		                
		<?php       echo Form::input('fileselect[]', 'upload', array('type' => 'file', 'multiple' =>'true', 'id' => 'fileselect')); ?> 
		</span>



		            <button type="submit" class="btn btn-primary start">
		                    <i class="icon-upload icon-white"></i>
		                    <span>Start upload</span>
		            </button>

		            <!-- <button type="reset" class="btn btn-warning cancel">
		                    <i class="icon-ban-circle icon-white"></i>
		                    <span>Cancel upload</span>
		            </button> -->

		</div>
		                    

		</fieldset>
		<?php  echo Form::close(); ?>

		<div id="progress"></div>

		<div id="messages">
		<p>Status Messages</p>
		</div>


		<br>	

		<?php echo Html::anchor('admin/jeepneyroute/draw', 'Or Draw it on the Map', array('class' => 'btn btn-success')); ?>
</div>
</div>