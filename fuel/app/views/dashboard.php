<!DOCTYPE html>
<html lang="en">
  <head>
  	<link rel="shortcut icon" href="<?php echo Config::get('base_url');?>/assets/img/fdIcon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>_Finaldestination - You Are on The Right Track!</title>
    <!-- Bootstrap core CSS -->
    <?php echo Asset::css('css/bootstrap.css'); ?>
    <!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
    <!-- Add custom CSS here -->
    <!-- <link href="css/slidefolio.css" rel="stylesheet"> -->
    <?php echo Asset::css('css/slidefolio.css'); ?>
	<!-- Font Awesome -->
    <!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
    <?php echo Asset::css('font-awesome/css/font-awesome.min.css'); ?>
    <?php echo Asset::css('css/market.css'); ?>

    <style type="text/css">
    .logo{
    	height: 200px;
    }
    .logo1{
    	height: 50px;
    }
    .logo2{
      height: 130px;
    }
    .logolink{
    	height: 30px;
    }
    .logolink1{
      height: 70px;
    }
    .chulukoy{
    	height: 50px;
    }

    .splash_screen{
      height: 430px;
      margin-top: -500px;
    }
   
   	@media (min-width: 320px) {
	  .confrm {
	    height: 350px;
	    margin-top: 5px;
	  }
	}
 	@media (min-width: 420px) {
	  .confrm {
	    height: 450px;
	    margin-top: 5px;
	  }
	}
    @media (min-width: 768px) {
	  .confrm {
	    height: 600px;
	    margin-top: 5px;
	  }
	}
	@media (min-width: 1366px) {
	  .confrm {
	    height: 600px;
	    margin-top:5px;
	  }
	}
	
	
    </style>


  </head>
  <body>
    <!-- Header Area -->
    <div id="top" class="header">
      <div class="vert-text">
      <?php echo Html::img('assets/img/fulllogo.png',array('class' => 'logo')) ?>
	  <!-- <img class="img-rounded" alt="Company Logo" src="./img/logo.jpg"/> -->
        <h3><em>... You Are on The right track! ...</em></h3>
		 <ul class="list-inline">
              <li><i class="fa fa-facebook fa-3x"></i></li>
              <li><i class="fa fa-twitter fa-3x"></i></li>
              <li><i class="fa fa-android fa-3x"></i></li>
			  <li><i class="fa fa-github-alt fa-3x"></i></li>
			   <li><i class="fa fa-map-marker fa-3x"></i></li>
            </ul>	
			<br><br>
			<a href="#about" class="btn btn-top">Learn More</a>
			<p><i class="fa fa-chevron-down fa-2x"></i></p>
      </div>
    </div>
    <!-- /Header Area -->
	  <div id="nav">
    <!-- Navigation -->

    <nav class="navbar navbar-new" role="navigation">
   <div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mobilemenu">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <?php echo Html::img('assets/img/logo.png',array('class' => 'logo1')) ?>
	<a href="#" class="navbar-brand"><?php echo Html::anchor('public',Html::img('assets/img/logo1.png',array('class' => 'logolink'))); ?></a>
  </div>
  <div class="collapse navbar-collapse" id="mobilemenu">

	  <ul class="nav navbar-nav navbar-right text-center">
	    <li><a href="#top"><i class="service-icon fa fa-home"></i>&nbsp;Home</a></li>
        <li><a href="#about"><i class="service-icon fa fa-info"></i>&nbsp;About</a></li>
        <li><a href="#services"><i class="service-icon fa fa-laptop"></i>&nbsp;Features</a></li>
        <li><a href="#portfolio"><i class="service-icon fa fa-globe"></i>&nbsp;Updates</a></li>
        <li><a href="#contact"><i class="service-icon fa fa-envelope"></i>&nbsp;Contact</a></li>
        <li><?php echo Html::anchor('users/login', ' Login',array('class' => 'service-icon fa fa-key')) ?></li>
    </ul>
  </div><!-- /.navbar-collapse -->
  </div>
</nav>
    <!-- /Navigation -->
</div>	
    <!-- About -->
    <div id="about" class="portfolio">
      <div class="container">
      	<br><br><br><br><br>
        <div class="row">
          <div class="col-md-6 col-md-offset-6">
            <p><?php echo Html::img('assets/img/logo.png',array('class' => 'logo2')) ?>&nbsp;&nbsp;&nbsp;&nbsp;<span><?php echo Html::img('assets/img/logohover.png',array('class' => 'logolink1')); ?><h1><a href="#">Beta</a></h1></span>&nbsp;</p>
            <p>_Finaldestination is a Public Utility Vehicle Offline Navigation System based on android designed for any type of users that will provide fare costs, estimated time of arrival,list of all possible routes from the specific destination you want to travel, and it also promotes different landmarks in Davao City.</p>
            <br>
            <div class="android_market">
              <a href="#" class="off">Get free on the Android Market!</a>
              <a href="#" class="on">Get free on the Android Market!</a>
            </div>
                
            <div class="app_server">
              <a href="#" class="off">Get free on the Server!</a>
              <a href="#" class="on">Get free on the Server!</a>
            </div>


          </div>
        </div>

        <div class="row">
          <div class="col-md-4 text-center">
           <?php echo Html::img('assets/img/splash_screen.jpg',array('class' => 'splash_screen')) ?>
          </div>
        </div>
        <br><br>
	  </div>
    </div>
    <!-- /About -->
    <!-- Services -->
    <div id="services" class="services">
      <br>
      <div class="container">
        <div class="row">
          <div class="features col-md-6 col-md-offset-6">
            <h3>Features:</h3>
            <ul>
              <li>Makes your phone a navigator.</li>
              <li>View different structural landmarks within Davao City.</li>
              <li>Allow user to choose single, double, or multiple jeepney or tricycle routes to ride.</li>
              <li>Gives user estimated time of arrival, fare costs, and possible routes from origin to specific destination.</li>
              <li>Send road directions through sms,wifi,email,and bluetooth.</li>
              <li>Allows user to locate his current location using global positioning system (gps).</li>
              <li>Allow user to navigate taxi routes.</li>
            </ul>
        </div>

        <div class="features col-md-6 col-md-offset-6">
          <hr>
            <h3>System Requirements:</h3>
            <ul>
              <li>Requires Android 2.3.5(ginger bread) or higher version.</li>
              <li>Requires approximnately 200MB storage.</li>
              <li>Requires at least 290MB RAM.</li>
              <li>Requires at least 240 x 320 pixels display size.</li>
              <li>Requires a minimum 830 MHz processor.</li>
            </ul>
        </div>
      
        </div>
      </div>
    </div>
    <!-- /Services -->

    <!-- Portfolio -->
    <div id="portfolio" class="portfolio">
    <br><br><br><br>
     <div class="container">
	    <div class="row">
          <div class="col-md-4 col-md-offset-4 text-center">
            <h2>Latest Updates</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 text-center">
            <div>
	              <div class="span4" id="bck">
					<div style="padding:12px">
					<h4>Jeepney Routes Updates</h4>
					
					<?php if ($jeepneyroutes): ?>

						<table class="table table-striped table-hover " >
							
							<tbody>
								<?php foreach ($jeepneyroutes as $jeepneyroute): ?>		<tr>

											<td><b><?php echo $jeepneyroute->routename; ?></b></td>
											<td><i style="font-size:12px"><?php 
                          $date = date_create($jeepneyroute->created_at);
                          echo date_format($date, 'F j, Y - l @ g:ia'); ?></i></td>
											
										</tr>
								<?php endforeach; ?>	
					     	</tbody>
							
						</table>

				<?php endif; ?>

					</div>
					
				</div>
            </div>
          </div>

          <div class="col-md-4 text-center">
            <div>
	              <div class="span4" id="bck">
					<div style="padding:12px">
					<h4>Tricycle Routes Updates</h4>
					<?php if ($tricycleroutes): ?>

							<table class="table table-striped table-hover" >
								
								<tbody>
							<?php foreach ($tricycleroutes as $tricycleroute): ?>		<tr>

										<td><b><?php echo $tricycleroute->routename; ?></b></td>
										<td><i style="font-size:12px"><?php
                        $date = date_create($tricycleroute->created_at);
                         echo date_format($date,'F j, Y - l @ g:ia'); ?></i></td>
										
									</tr>
							<?php endforeach; ?>	</tbody>
								
							</table>

					<?php endif; ?>
					</div>
			
				</div>
            </div>
          </div>

          <div class="col-md-4 text-center">
            <div>
              	<div class="span4" id="bck">
					<div style="padding:12px">
					<h4>Landmark Updates</h4>
					<?php if ($landmarks): ?>

							<table class="table table-striped table-hover" >
								<tbody>
							<?php foreach ($landmarks as $landmark): ?>		<tr>

										<td><?php echo Html::anchor('landmarks/view/'.$landmark->slug, Html::img('uploads/landmarks/'.$landmark->placename.'/icon/'.$landmark->fileurl,array('class' => 'image')));?></td>
										<td><b><?php echo $landmark->placename; ?></b><br>
											<i style="font-size:12px"><?php echo $landmark->description; ?></i>
										</td>

									<!-- 	<?php //foreach ($landmark->voteitems as $voteitem): ?>
										<td><?php //echo $voteitem->votes/100 ."%"; ?></td>
										<?php //endforeach; ?> -->
										
									</tr>
							<?php endforeach; ?>	</tbody>
								
							</table>

					<?php endif; ?>
					</div>
					
				</div>
            </div>

          </div>
        </div>
		<br><br>
		
	 </div>
    </div>
    <!-- /Portfolio -->
    <!-- Contact -->
    <div id="contact">
      <div class="container">
        <div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
            <h2>Contact Us</h2>
			<hr>
          </div>
          <div class="col-md-5 col-md-offset-3">
		  <!-- contact form starts -->
            <form action="contact" id="contact-form" class="form-horizontal">
			<fieldset>
						    <div class="form-group">
						      <label class="col-sm-4 control-label" for="name">Your Name</label>
						      <div class="col-sm-8">
						        <input type="text"  placeholder="Your Name" class="form-control" name="name" id="name">
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="col-sm-4 control-label" for="email">Email Address</label>
						      <div class="col-sm-8">
						        <input type="text" placeholder="Enter Your Email Address" class="form-control" name="email" id="email">
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="col-sm-4 control-label" for="subject">Subject</label>
						      <div class="col-sm-8">
						        <input type="text" placeholder="Subject" class="form-control" name="subject" id="subject">
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="col-sm-4 control-label" for="message">Your Message</label>
						      <div class="col-sm-8">
						        <textarea placeholder="Please Type Your Message" class="form-control" name="message" id="message" rows="3"></textarea>
						      </div>
						    </div>
	              <div class="col-sm-offset-4 col-sm-8">
			            <button type="submit" class="btn btn-success">Submit</button>
	    			      <button type="reset" class="btn btn-primary">Cancel</button>
	        			</div>
						</fieldset>
						</form>
				
				<!-- contact form ends -->		
          </div>
        </div>
      </div>
    </div>
    <!-- /Contact -->
    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center">
           <?php echo Html::img('assets/img/chul.png',array('class' => 'chulukoy')); ?>
           <em>Copyright &copy; Team Chulukoy 2014</em>
          </div>
        </div>
      </div>
    </footer>
    <!-- /Footer -->
    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->




	<?php echo Asset::js(array(
		'jquery.js',
		'jquery-scrolltofixed-min.js',
		'jquery.vegas.js',
		'jquery.mixitup.min.js',
		'jquery.validate.min.js',
		'script.js',
		'bootstrap.js',
	)); ?>



	
<!-- Slideshow Background  -->
	<script>
$.vegas('slideshow', {
  delay:5000,
  backgrounds:[
     { src:'<?php echo Config::get("base_url");?>assets/img/nature1.jpg', fade:2000 },
	 { src:'<?php echo Config::get("base_url");?>assets/img/bw1.jpg', fade:2000 },
    { src:'<?php echo Config::get("base_url");?>assets/img/portrait1.jpg', fade:2000 },
	 { src:'<?php echo Config::get("base_url");?>assets/img/portrait5.jpg', fade:2000 },
    { src:'<?php echo Config::get("base_url");?>assets/img/portrait2.jpg', fade:2000 },
    { src:'<?php echo Config::get("base_url");?>assets/img/portrait3.jpg', fade:2000 },
	 { src:'<?php echo Config::get("base_url");?>assets/img/portrait4.jpg', fade:2000 },
	   { src:'<?php echo Config::get("base_url");?>assets/img/forest.jpg', fade:2000 }
	   
  ]
})('overlay', {
src:'<?php echo Config::get("base_url");?>assets/img/overlay1.png'
});

	</script>
<!-- /Slideshow Background -->

<!-- Mixitup : Grid -->
    <script>
		$(function(){
    $('#Grid').mixitup();
      });
    </script>
<!-- /Mixitup : Grid -->	

    <!-- Custom JavaScript for Smooth Scrolling - Put in a custom JavaScript file to clean this up -->
    <script>
      $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
            || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });
    </script>
<!-- Navbar -->
<script type="text/javascript">
$(document).ready(function() {
        $('#nav').scrollToFixed();
  });
    </script>
<!-- /Navbar-->
	
  </body>

</html>