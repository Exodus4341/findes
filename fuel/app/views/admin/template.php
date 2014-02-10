<?php
///For download draw file sa draw jeepneyroute..
if(isset($_POST['text']) && isset( $_POST['filename'] ))
 {
   $filename = $_POST['filename'];
   header('Content-disposition: attachment; filename='.$filename.'.gpx');
   header('Content-type: application/txt');
   echo $_POST['text'];
   exit; //stop writing
 }
?>

<!DOCTYPE html>
<html>
<head>
	
	<link rel="shortcut icon" href="<?php echo Config::get('base_url');?>/assets/img/fdIcon.ico"/>

	<meta charset="utf-8">
	<title>_Final Destination - <?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php //echo Asset::css('bootstrap-responsive.css'); ?>
	<?php echo Asset::css('paginate.css'); ?>
	<?php echo Asset::css('styles.css'); ?>
	<?php echo Asset::css('login.css'); ?>
	<?php echo Asset::css('leaflet.css'); ?>
	<?php echo Asset::css('leaflet.draw.css'); ?>
	<?php echo Asset::css('custom.css'); ?>
	<?php echo Asset::css('demo_table.css'); ?>
	<?php echo Asset::css('colorbox.css'); ?>
	<?php echo Asset::css('liteaccordion.css'); ?>
	<?php echo Asset::css('l.geosearch.css'); ?>
	<?php echo Asset::css('jquery.rating.css'); ?>
	<noscript><?php echo Asset::css('jquery.fileupload-ui-noscript.css'); ?></noscript>

	<?php echo Asset::js(array(
		'jquery.min.js',
		'bootstrap.js',
		'jquery.js',
		'filedrag.js',
		'http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js',
		'gpx.js',
		'jquery.paginate.js',
		'jquery.dataTables.js',
		'jquery.colorbox.js',
		'jquery.easing.1.3.js',
		'liteaccordion.jquery.js',
		'leaflet.draw.js',
		'l.control.geosearch.js',
		'l.geosearch.provider.google.js',
		'jquery.MetaData.js',
		'jquery.rating.js',
		'XMLWriter-min.js',
		'seemore.js',
		//'http://maps.google.com/maps/api/js?sensor=true',
		//'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js',
	)); ?>

<script>
	function resetForm(){
		window.location.assign("");
	}
</script>


<style type="text/css">
      #googlemap {
        width: 100%;
        height: 400px;
        margin-top: 10px;
      }
  
    </style>

</head>
<body>
<!-- function for parsing route descriptions!-->	
<?php include('includes/isdupps.php');  ?>
<!-- end!-->

	<?php if ($current_user): ?>



	<div class="navbar navbar-inverse navbar-fixed-top">

		<div style="border:1px solid white; width:100%;background:#F0FFFF">
	   

	    <div class="navbar-inner">



	        <div class="container">	 

	        	<?php echo Html::img('assets/img/logo.png',array('class' => 'logo')) ?>
		    	<?php echo Html::anchor('admin',Html::img('assets/img/logo1.png',array('class' => 'logo1')),array('class' => 'logolnk' )); ?></li>
	          	

	           <ul class="nav pull-right"> 	

	           	<li class="dropdown">
	           		<?php echo Html::anchor('#',Html::img('assets/img/home.png',array('class' => 'menu-icon')), array('data-toggle' => 'dropdown', 'class' => 'dropdown-toggle')) ?>
	           		

	           		<ul class="dropdown-menu">
	           			<li><?php echo Html::anchor('admin',"Dashboard") ?></li>
	           		</ul>
	           	</li>
	           	<li class="dropdown">
	           		<a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo Html::img('assets/img/user.png',array('class' => 'menu-icon'))?></a>

	           		<ul class="dropdown-menu">
	           			<li><?php echo Html::anchor('admin/users',"Users") ?></li>
	           		</ul>
	           	</li>


	           	<li class="dropdown">
	           		<?php echo "<a class='dropdown-toggle'>".$current_user->username."</a>";?>
	           	</li>


	            <li class="dropdown">
	              
	              <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo Html::img('assets/img/menuicon.png',array('class' => 'menu-icon'))?></a>
	              
	             <ul class="dropdown-menu">
	               

	                <!-- <li class="<?php //echo Uri::segment(2) == '' ? 'active' : '' ?>">
						<?php// echo Html::anchor('admin', 'Dashboard') ?>
					</li> -->

					<li class="<?php echo Uri::segment(2) == '' ? '' : '' ?>">
						<?php echo Html::anchor('admin/jeepneyroute',Html::img('assets/img/jeepney.png',array('class' => 'menu-icon1')).'<span class="menuSpacing">Jeepney Routes</span>') ?>
					</li>

					<li class="<?php echo Uri::segment(2) == '' ? '' : '' ?>">
						<?php echo Html::anchor('admin/tricycleroute', Html::img('assets/img/tricycle.png',array('class' => 'menu-icon1')).'<span>Tricycle Routes</span>') ?>
					</li>

					<li class="<?php echo Uri::segment(2) == '' ? '' : '' ?>">
						<?php echo Html::anchor('admin/taxiroute', Html::img('assets/img/taxi.png',array('class' => 'menu-icon1')).'<span>Taxi Routes</span>') ?>
					</li>

					<li class="<?php echo Uri::segment(2) == '' ? '' : '' ?>">
						<?php echo Html::anchor('admin/landmarks',Html::img('assets/img/landmarkicon.png',array('class' => 'menu-icon1')).'<span>Landmarks</span>') ?>
					</li>

					<li class="<?php echo Uri::segment(2) == '' ? '' : '' ?>">
						<?php echo Html::anchor('admin/landmarkphotos',Html::img('assets/img/landmarkphotosicon.png',array('class' => 'menu-icon1')).'<span>Landmark Photos</span>') ?>
					</li>

					<li class="<?php echo Uri::segment(2) == '' ? '' : '' ?>">
						<?php echo Html::anchor('admin/landmarkcategories',Html::img('assets/img/landmarkcaticon.png',array('class' => 'menu-icon1')).'<span>Landmark Categories</span>') ?>
					</li>

					<li class="<?php echo Uri::segment(2) == '' ? '' : '' ?>">
						<?php echo Html::anchor('admin/roadlocation',Html::img('assets/img/roadlocationicon.png',array('class' => 'menu-icon1')).'<span>Road Locations</span>') ?>
					</li>

					<li class="<?php echo Uri::segment(2) == '' ? '' : '' ?>">
						<?php echo Html::anchor('admin/directions',Html::img('assets/img/directionsicon.png',array('class' => 'menu-icon1')).'<span>Directions</span>') ?>
					</li>

					<li class="<?php echo Uri::segment(2) == '' ? '' : '' ?>">
						<?php echo Html::anchor('admin/comments',Html::img('assets/img/commentsicon.png',array('class' => 'menu-icon1')).'<span>Comments</span>') ?>
					</li>

					<li class="<?php echo Uri::segment(2) == '' ? '' : '' ?>">
						<?php echo Html::anchor('admin/tilemaps',Html::img('assets/img/tilemapsicon.png',array('class' => 'menu-icon1')).'<span>Tile Maps</span>') ?>
					</li>

					<li class="<?php echo Uri::segment(2) == '' ? '' : '' ?>">
						<?php echo Html::anchor('admin/config',Html::img('assets/img/configurationicon.png',array('class' => 'menu-icon1')).'<span>Configurations</span>') ?>
					</li>

					<li class="<?php echo Uri::segment(2) == '' ? '' : '' ?>">
						<?php echo Html::anchor('admin/puv',Html::img('assets/img/farecosticon.png',array('class' => 'menu-icon1')).'<span>Fare Costs</span>') ?>
					</li>


					<li class="divider"></li>
					
					<li><?php echo Html::anchor('users/logout',Html::img('assets/img/logouticon.png',array('class' => 'menu-icon1')).'<span>Logout</span>') ?></li>

	               

					<?php //foreach (glob(APPPATH.'classes/controller/admin/*.php') as $controller): ?>

						<?php
						//$section_segment = basename($controller, '.php');
						//$section_title = Inflector::humanize($section_segment);
						?>

	                <!-- <li class="<?php //echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
						<?php //echo Html::anchor('admin/'.$section_segment, $section_title) ?>
					</li> -->
					<?php //endforeach; ?>


	              </ul>
	            
	            </li>
	          </ul>
	        </div>
	    </div>
	</div>

</div>

	<?php endif; ?>

	<div class="container">
		<div class="row">
			<div class="span12">
				<!-- <h1><?php //echo $title; ?></h1> -->
				<!-- <hr> -->
				<br><br>
<?php if (Session::get_flash('success')): ?>
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">×</button>
					<p><?php echo implode('</p><p>', (array) Session::get_flash('success')); ?></p>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert alert-error">
					<button class="close" data-dismiss="alert">×</button>
					<p><?php echo implode('</p><p>', (array) Session::get_flash('error')); ?></p>
				</div>
<?php endif; ?>
			</div>
			<div class="span12">
<?php echo $content; ?>
			</div>
		</div>
		<hr/>
		<footer>
			<p class="pull-right"><small>Page rendered in {exec_time}s using {mem_usage}mb of memory.</small></p>
			<p>
				<small><?php echo Html::anchor('public', '_Final Destination') ?> is released under the  <i><?php echo Html::img('assets/img/chul.png',array('class' => 'chulukoy')); ?></i>  license.</small><br>
			</p>
		</footer>
	</div>
</body>
</html>
