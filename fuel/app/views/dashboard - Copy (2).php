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

    <style type="text/css">
    .logo{
    	height: 200px;
    }
    .logo1{
    	height: 50px;
    }
    .logolink{
    	height: 30px;
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
        <li><a href="#services"><i class="service-icon fa fa-laptop"></i>&nbsp;Services</a></li>
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
    <div id="about" class="about_us">
      <div class="container">
      	<br><br>
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
            <h3><em>"A PUV Offline Navigation System Educating Davaoeños, Local and International Tourists About the Different Landmarks"</em></h3>
            <hr>
            <h3><em><b>--- General Objective ---</b></em></h3>
            <p class="lead">To develop an offline mobile android application that is capable of educating Davaoeños, Local and International Tourists about the different structural landmarks in Davao City.</p>
          	<br>
          	<h3><em><b>--- Conceptual Framework ---</b></em></h3>

          	<?php echo Html::img('assets/img/CF.png',array('class' => 'confrm')) ?>

          </div>
        </div>
	  </div>
    </div>
    <!-- /About -->
    <!-- Services -->
    <div id="services" class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 text-center">
            <h2>Our Services</h2>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 text-center">
            <div class="service-item">
              <i class="service-icon fa fa-camera-retro fa-3x"></i>
              <h3>Portrait</h3>
              <p>Ad has dicat ridens consetetur, eos eu option persius. Mollis cotidieque conclusionemque per id, ne nam alienum liberavisse. </p>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div class="service-item">
			<i class="service-icon fa fa-camera fa-3x"></i>
              <h3>Black & white</h3>
              <p>In mea similique vulputate, ea cum amet malorum dissentiunt. Qui deleniti aliquando cu, ullum soluta his an, id inani salutatus sit.</p>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div class="service-item">
              <i class="service-icon fa fa-globe fa-3x"></i>
              <h3>Web Design</h3>
              <p>Ad has dicat ridens consetetur, eos eu option persius. Mollis cotidieque conclusionemque per id, ne nam alienum liberavisse.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Services -->

    <!-- Portfolio -->
    <div id="portfolio" class="portfolio">
    <div class="container">
    <div class="row push50">
          <div class="col-md-4 col-md-offset-4 text-center">
            <h2>Our Work</h2>
			<h3>
			<span class="filter label label-default" data-filter="all">ALL</span>
	<span class="filter label label-default" data-filter="bw">B&amp;W</span>
	<span class="filter label label-default" data-filter="nature">Nature</span>
	<span class="filter label label-default" data-filter="portraits">Portraits</span>
	</h3>
            <hr>
          </div>
        </div>
		
		<div class="row">
		
		<div class="gallery">
		
    		  <ul id="Grid" class="gcontainer">
    		    <li class="col-md-4 col-sm-4 col-xs-12 mix bw portraits" data-cat="graphics">
              <a data-toggle="modal" data-target="#portrait1" class="mix-cover">
                <img class="horizontal" src="<?php echo Config::get('base_url');?>assets/img/portrait1-sm.jpg" alt="placeholder">
      		      <span class="overlay"><span class="valign"></span><span class="title">Portrait 1</span></span>
              </a>                
      		  </li>
    		    <li class="col-md-4 col-sm-4 col-xs-12 mix portraits" data-cat="graphics">
                <a data-toggle="modal" data-target="#portrait2" class="mix-cover">
                  <img class="horizontal" src="<?php echo Config::get('base_url');?>assets/img/portrait2.jpg" alt="placeholder">

        		      <span class="overlay"><span class="valign"></span><span class="title">Portrait 2</span></span>
                </a>                
      		  </li>
			  <li class="col-md-4 col-sm-4 col-xs-12 mix nature" data-cat="nature">
                <a data-toggle="modal" data-target="#nature1" class="mix-cover">
                  <img class="horizontal" src="<?php echo Config::get('base_url');?>assets/img/nature1.jpg" alt="placeholder">
                  
        		      <span class="overlay"><span class="valign"></span><span class="title">Nature 1</span></span>
        		    </a>
      		  </li>
      		  <li class="col-md-4 col-sm-4 col-xs-12 mix portraits" data-cat="portraits">
                <a data-toggle="modal" data-target="#portrait3" class="mix-cover">
                  <img class="horizontal" src="<?php echo Config::get('base_url');?>assets/img/portrait3.jpg" alt="placeholder">

        		      <span class="overlay"><span class="valign"></span><span class="title">Portrait 3</span></span>
        		    </a>
      		  </li>
			  <li class="col-md-4 col-sm-4 col-xs-12 mix portraits" data-cat="portraits">
                <a data-toggle="modal" data-target="#portrait5" class="mix-cover">
                  <img class="horizontal" src="<?php echo Config::get('base_url');?>assets/img/portrait5.jpg" alt="placeholder">

        		       <span class="overlay"><span class="valign"></span><span class="title">Portrait 5</span></span>
        		    </a>
      		  </li>
			  <li class="col-md-4 col-sm-4 col-xs-12 mix nature" data-cat="nature">
                <a data-toggle="modal" data-target="#nature" class="mix-cover">
                  <img class="horizontal" src="<?php echo Config::get('base_url');?>assets/img/nature.jpg" alt="placeholder">

        		      <span class="overlay"><span class="valign"></span><span class="title">Nature</span></span>
        		    </a>
      		  </li>
      		  <li class="col-md-4 col-sm-4 col-xs-12 mix portraits" data-cat="portrait">
                <a data-toggle="modal" data-target="#portrait4" class="mix-cover green">
                  <img class="vertical" src="<?php echo Config::get('base_url');?>assets/img/portrait4.jpg" alt="portrait 4">

                  <span class="overlay"><span class="valign"></span><span class="title">Portrait 4</span></span>           
        		    </a>
      		  </li>
			  <li class="col-md-4 col-sm-4 col-xs-12 mix bw nature all" data-cat="portrait">
                <a data-toggle="modal" data-target="#forest" class="mix-cover green">
                  <img class="vertical" src="<?php echo Config::get('base_url');?>assets/img/forest.jpg" alt="Forest">

                   <span class="overlay"><span class="valign"></span><span class="title">Forest</span></span>                    
        		    </a>
      		  </li>
			  <li class="col-md-4 col-sm-4 col-xs-12 mix bw nature all" data-cat="bw">
                <a data-toggle="modal" data-target="#bw1" class="mix-cover green">
                  <img class="vertical" src="<?php echo Config::get('base_url');?>assets/img/bw1.jpg" alt="Black and White">

                   <span class="overlay"><span class="valign"></span><span class="title">Black &amp; White</span></span>                  
        		    </a>
      		  </li>
    		  </ul>   
			  
<!-- Load Photo in Modal -->			  
   <div class="modal fade" id="portrait1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Portrait 1</h4>
      </div>
      <div class="modal-body">
       <img class="thumbnail" alt="Portrait1" src="<?php echo Config::get('base_url');?>assets/img/portrait1.jpg"/>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  <div class="modal fade" id="portrait2" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Portrait 2</h4>
      </div>
      <div class="modal-body">
       <img class="thumbnail" alt="Portrait1" src="<?php echo Config::get('base_url');?>assets/img/portrait2.jpg"/>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="portrait3" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Portrait 3</h4>
      </div>
      <div class="modal-body">
       <img class="thumbnail" alt="Portrait1" src="<?php echo Config::get('base_url');?>assets/img/portrait3.jpg"/>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="portrait4" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Portrait 4</h4>
      </div>
      <div class="modal-body">
       <img class="thumbnail" alt="Portrait1" src="<?php echo Config::get('base_url');?>assets/img/portrait4.jpg"/>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="portrait5" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Portrait 5</h4>
      </div>
      <div class="modal-body">
       <img class="thumbnail" alt="Portrait1" src="<?php echo Config::get('base_url');?>assets/img/portrait5.jpg"/>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="nature" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Nature</h4>
      </div>
      <div class="modal-body">
       <img class="thumbnail" alt="nature" src="<?php echo Config::get('base_url');?>assets/img/nature.jpg"/>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="nature1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Nature 1</h4>
      </div>
      <div class="modal-body">
       <img class="thumbnail" alt="nature" src="<?php echo Config::get('base_url');?>assets/img/nature1.jpg"/>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="forest" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Forest</h4>
      </div>
      <div class="modal-body">
       <img class="thumbnail" alt="forest" src="<?php echo Config::get('base_url');?>assets/img/forest.jpg"/>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="bw1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Black and White</h4>
      </div>
      <div class="modal-body">
       <img class="thumbnail" alt="forest" src="<?php echo Config::get('base_url');?>assets/img/bw1.jpg"/>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- /Load Photo in Modal -->	
		</div>	
      </div>
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