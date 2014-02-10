<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>

<h3 style="margin-left:15px;">Tricycle Routes</h3>

<br>
<?php if ($tricycleroutes): ?>
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
<?php foreach ($tricycleroutes as $tricycleroute): ?>		<tr>

			<td><?php echo Html::anchor('admin/tricycleroute/view/'.$tricycleroute->id,$tricycleroute->routename); ?></td>
			<td><?php echo $tricycleroute->size." KB"; ?></td>
			<td><?php echo $tricycleroute->type; ?></td>

			<!-- parse tricycle route descriptions !-->
			<td>
				<p class="seemore">
			<?php
			    $route = simplexml_load_file(Config::get('base_url').'/uploads/tricycleroute/'.$tricycleroute->filename);
			   
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
			           echo $strname.', ';
			    }   

			       
			 ?>
			 	</p>
			</td>
			<!-- END parse tricycle route descriptions !-->

			<td><?php
			$date = date_create($tricycleroute->created_at); 
			echo date_format($date, 'F j, Y - l @ g:ia')?></td>
			<td>
				<?php echo Html::anchor('admin/tricycleroute/view/'.$tricycleroute->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('admin/tricycleroute/edit/'.$tricycleroute->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('admin/tricycleroute/delete/'.$tricycleroute->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>

</table>

<div id="paginate" style="float:right"></div><br><br>      
<div id="status" style="float:right; margin-right:50px"></div> 

<?php else: ?>
<p>No Tricycleroutes.</p>

<?php endif; ?>


<!-- Button trigger modal -->
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
  Upload Tricycle Route
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tricycle Route</h4>
      </div>
      <div class="modal-body">
       

      	<?php echo Form::open(array('onreset' => 'resetForm()','enctype' => 'multipart/form-data', 'method' => 'post', 'action' => 'admin/tricycleroute/create','id' => 'upload' ));?>

			<fieldset>

			 <div>

			 <div class="clearfix">
			<?php echo Form::label('Route Name', 'routename'); ?>

			<div class="input">
				<?php echo Form::input('routename','',array('class' => 'span4', 'required' => '')); ?>

			</div>
		 </div>

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

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo Html::anchor('admin/tricycleroute/draw', 'Or Draw it on the Map', array('class' => 'btn btn-success')); ?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



