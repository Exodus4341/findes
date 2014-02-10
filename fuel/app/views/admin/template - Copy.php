<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('paginate.css'); ?>
	<?php echo Asset::css('styles.css'); ?>
	<?php echo Asset::css('http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css'); ?>
	<noscript><?php echo Asset::css('jquery.fileupload-ui-noscript.css'); ?></noscript>

	
	<style>
		body { margin: 50px; }
		<style type="text/css">

		#main_container{
		font-size: 1.4em;
		}

		#map {
   	 	width: 930px; height: 300px;
		}

		.Overlay { position: relative; left: 50px; top: 80px; 
             right: 0px; height: 3px; z-index: 50 }

	</style>


	<?php echo Asset::js(array(
		'jquery.min.js',
		'bootstrap.js',
		'jquery.js',
		'filedrag.js',
		'http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js',
		'jquery.paginate.js',
		'paginate.js'
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

	<?php if ($current_user): ?>
	<div class="navbar navbar-fixed-top">
	    <div class="navbar-inner">
	        <div class="container">
	        	<?php echo Html::anchor('admin', '_Ang Bagong Daan',array('class' => 'brand')); ?>
	            <!-- <a href="#" class="brand">_Ang Bagong Daan</a> -->
	           <ul class="nav pull-right">

	            <li class="dropdown">
	              <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $current_user->username ?> <b class="caret"></b></a>
	              <ul class="dropdown-menu">
	               <li><?php echo Html::anchor('admin/logout', 'Logout') ?></li>

	                <li class="<?php echo Uri::segment(2) == '' ? 'active' : '' ?>">
						<?php echo Html::anchor('admin', 'Dashboard') ?>
					</li>

					<?php foreach (glob(APPPATH.'classes/controller/admin/*.php') as $controller): ?>

						<?php
						$section_segment = basename($controller, '.php');
						$section_title = Inflector::humanize($section_segment);
						?>

	                <li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
						<?php echo Html::anchor('admin/'.$section_segment, $section_title) ?>
					</li>
					<?php endforeach; ?>


	              </ul>
	            </li>
	          </ul>
	        </div>
	    </div>
	</div>
	<?php endif; ?>

	<div class="container">
		<div class="row">
			<div class="span12">
				<h1><?php echo $title; ?></h1>
				<hr>
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
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<?php echo Html::anchor('admin', '_Ang Bagong Daan') ?> is released under the <i>TEAM CHULUKOY</i> license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
	</div>
</body>
</html>
