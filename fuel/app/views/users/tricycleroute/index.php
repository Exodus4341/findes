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

			<td><?php echo Html::anchor('users/tricycleroute/view/'.$tricycleroute->id,$tricycleroute->routename); ?></td>
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
				<?php echo Html::anchor('users/tricycleroute/view/'.$tricycleroute->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('users/tricycleroute/download/'.$tricycleroute->id, '<i class="icon-download" title="Download"></i>'); ?> 
				

			</td>
		</tr>
<?php endforeach; ?>	</tbody>

</table>

<div id="paginate" style="float:right"></div><br><br>      
<div id="status" style="float:right; margin-right:50px"></div> 

<?php else: ?>
<p>No Tricycleroutes.</p>

<?php endif; ?>
