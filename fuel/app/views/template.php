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
	<?php echo Asset::css('website.css'); ?>
	<?php echo Asset::css('style.css'); ?>
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
		'jquery.tinycarousel.min.js',
		'a.js',
		'wowslider.js',
	)); ?>



<script>
	function removeOption()
	{
		var x=document.getElementById("mySelect");
		x.remove(x.selectedIndex);
	}

	function resetForm(){
		window.location.assign("");
	}

</script>


</head>
<body>

	<div class="navbar navbar-inverse navbar-fixed-top">
	   
		    					
		

	    <div class="navbar-inner">

	        <div class="container">	 
	          
	          <?php echo Html::img('assets/img/logo.png',array('class' => 'logo')) ?>
				<?php echo Html::anchor('public',Html::img('assets/img/logo1.png',array('class' => 'logo1')),array('class' => 'logolnk' )); ?>

	           <ul class="nav pull-right"> 	

	           	<li class="dropdown">
	           		<?php echo Html::anchor('#',Html::img('assets/img/home.png',array('class' => 'menu-icon')), array('data-toggle' => 'dropdown', 'class' => 'dropdown-toggle')) ?>
	           		

	           		<ul class="dropdown-menu">
	           			<li><?php echo Html::anchor('public',"Dashboard") ?></li>
	           		</ul>
	           	</li>

	        

	            <li class="dropdown">
	              
	              <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo Html::img('assets/img/menuicon.png',array('class' => 'menu-icon'))?></a>
	              
	              <ul class="dropdown-menu">
	               

	                <!-- <li class="<?php //echo Uri::segment(2) == '' ? 'active' : '' ?>">
						<?php// echo Html::anchor('admin', 'Dashboard') ?>
					</li> -->

					<!-- <li class="<?php //echo Uri::segment(2) == '' ? '' : '' ?>">
						<?php //echo Html::anchor('jeepneyroute', 'Jeepney Routes') ?>
					</li>

					<li class="<?php //echo Uri::segment(2) == '' ? '' : '' ?>">
						<?php //echo Html::anchor('tricycleroute', 'Tricycle Routes') ?>
					</li>-->

					<li class="<?php echo Uri::segment(2) == '' ? '' : '' ?>">
						<?php echo Html::anchor('landmarks', 'Landmarks') ?>
					</li> 

					
					<li class="divider"></li>
					
					<li><?php echo Html::anchor('users/login', 'Login') ?></li>

	               

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
				<small><?php echo Html::anchor('public', '_Final Destination Version 1.2') ?> is released under the  <i><?php echo Html::img('assets/img/chul.png',array('class' => 'chulukoy')); ?></i>  license.</small><br>
			</p>
		</footer>
	</div>
</body>
</html>
