<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top')) ?>
<h4 style="margin-left:15px;"><?php echo $jeepneyroute->routename; ?></h4>
<br><br>
<div id="map"></div>
<br>

<div class="row">
	<div class="span4" id="c-img">
		<div class="inner-cont">
			<p>
				<strong>Filename:</strong>
				<?php echo $jeepneyroute->filename; ?></p>
			<p>
				<strong>Size:</strong>
				<?php echo $jeepneyroute->size.'KB'; ?></p>
			<p>
				<strong>Type:</strong>
				<?php echo $jeepneyroute->type; ?></p>
			<p>
				<strong>Route Description:</strong>
				
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

			<p>
				<strong>Uploaded at:</strong>
				<?php $date = date_create($jeepneyroute->created_at); 
				echo date_format($date,'F j, Y - l @ g:ia') ?></p>
		</div>
	</div>
</div>

<script>

		var map = L.map('map').setView([7.06819, 125.55725], 9);

		L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 18,
		}).addTo(map);


		var gpx = '<?php echo Config::get("base_url")?>'+'/uploads/jeepneyroute/'+'<?php echo $jeepneyroute->filename; ?>'; // URL to your GPX file or the GPX itself
		new L.GPX(gpx, {async: true}).on('loaded', function(e) {
		  map.fitBounds(e.target.getBounds());
		}).addTo(map);

</script>


<?php echo Html::anchor('admin/jeepneyroute/edit/'.$jeepneyroute->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/jeepneyroute', 'Back'); ?>