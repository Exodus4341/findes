<?php echo Html::img('assets/img/frame-top.png', array('class' => 'frame-top-landmark')) ?>

<div style="width:100%">
	<div class="row" style="width:500px; float:left">
		<div class="span4" id="c-img">
				<div class="inner-cont">
					<p style="font-size: 23px; border-bottom:1px groove gray; padding-top:5px; width:470px;"><b><?php echo $landmark->placename;?></b></p>
					<p style="margin-top:-20px; width:470px;"><i><?php echo $landmark->description; ?></i></p>
				</div>

				<div class="t-cont">
					<p>	
						<?php echo Html::img('uploads/landmarks/'.$landmark->placename.'/orig/'.$landmark->fileurl,array('class' => 'image')); ?>
					</p>
				</div>
		</div>


		<div class="span4" id="c-img" style="margin-top:15px">
			<div class="t-name"><p>Lanmark Photos</p></div>
			<div class = "inner-cont">
			<p>
				<?php foreach ($landmark->landmarkphotos as $landmarkphoto): ?>
					
					<span style = "position:relative;margin-left:5px;top:15px;">
					<?php echo Html::img('uploads/landmarks/'.$landmark->id.'/icon/'.$landmarkphoto->fileurl,array('class' => 'image')); ?>
					</span>

					<?php endforeach; ?>

			</p>
			</div>
		</div>


		<div class="span4" id="c-img" style="margin-top:15px">
			<div class="t-name"><p>About Landmark</p></div>
			<div class="inner-cont">
			<p style="text-indent:30px;"><?php echo $landmark->history; ?></p>
			</div>
		</div>


		<div class="span4" id="c-img" style="margin-top:15px">
			<div class="t-name"><p>Comments</p></div>
		 		<div class="inner-cont">
				<?php foreach ($landmark->comments as $comment): ?>
				 	
				   <div style="float:left;"><?php echo Html::img('assets/img/gravatar.png'); ?></div>

				   <div style="margin-left:75px"><b><?php echo $comment->name ?></b><br>
				   <span style="margin-left:10px; display:block;width:360px;word-wrap:break-word;"><?php echo $comment->message?></span><br>
				   <span style="font-size:11px;">
				   		<i>Posted at: <i style="color:red"><?php echo date("F jS, Y / h:i", strtotime($comment->created_at));?></i></i></span></div>
				 <p style="border-bottom:1px groove gray"></p>
				<?php endforeach; ?>
			</div>
 		</div>
		

 		<div class="span4" id="c-img" style="margin-top:15px">
			<div class="t-name"><p>Write a comment</p></div>
	 			<br>
				<div class="inner-cont">
				<?php echo Form::open('users/landmarks/comment/'.$landmark->slug) ?>
				

				   <!-- <label for="name">Name:</label> -->
				   <div class="input"><?php echo Form::input('name',' ',array('class' => 'span4', 'type' => 'hidden')); ?></div>
				
				 
				
				   <!-- <label for="email">Email:</label> -->
				   <div class="input"><?php echo Form::input('email',' ',array('class' => 'span4', 'type' => 'hidden')); ?></div>
				
				 
				
				   <label for="message">Comment:</label>
				   <div class="input"><?php echo Form::textarea('message','',array('class' => 'span6')); ?></div>
				
				 
				
				   <div class="input"><?php echo Form::submit('submit','Submit',array('class' => 'btn btn-primary')); ?></div>
				
				 
				<?php echo Form::close() ?>
			</div>
		</div>


		<div class="span4" id="c-img" style="margin-top:15px">
			<div class="t-name"><p>Rate this landmark</p></div>
			<div class = "inner-cont">
			<?php echo Form::open('users/landmarks/vote/'.$landmark->slug) ?>

				<fieldset>
					
					
							<?php echo Form::radio('votes', $checked = 1,Input::post('votes', isset($voteitem) ? $voteitem->votes : ''), array('class' => 'hover-star', 'title' => 'Verypoor')); ?>

							<?php echo Form::radio('votes', $checked = 2,Input::post('votes', isset($voteitem) ? $voteitem->votes : ''), array('class' => 'hover-star', 'title' => 'Poor')); ?>

							<?php echo Form::radio('votes', $checked = 3,Input::post('votes', isset($voteitem) ? $voteitem->votes : ''), array('class' => 'hover-star', 'title' => 'Ok')); ?>

							<?php echo Form::radio('votes', $checked = 4,Input::post('votes', isset($voteitem) ? $voteitem->votes : ''), array('class' => 'hover-star', 'title' => 'Good')); ?>
					
							<?php echo Form::radio('votes', $checked = 5,Input::post('votes', isset($voteitem) ? $voteitem->votes : ''), array('class' => 'hover-star', 'title' => 'Verygood')); ?>


					<span id="hover-test" style="margin:0 0 0 20px;"></span>
					<br><br>
					<div class="actions">
						<?php echo Form::submit('submit', 'Rate', array('class' => 'btn btn-primary')); ?>

					</div>
				</fieldset>
			<?php echo Form::close(); ?>
			</div>
		</div>


	</div>



	<div class="row"  style="float:right;">
		<div class="span4" id="c-img1">
			<div class="t-name1"><p>Details</p></div>

			<div class="inner-cont">
			<p>
				<strong>Category:</strong>
				<?php echo $landmark->landmarkcategory->categories; ?></p>
			
			<?php foreach ($landmark->voteitems as $voteitem): ?>
				<p>
					<strong>Reviews:</strong>
					<?php echo $voteitem->nrates; ?></p>
				<p>
					<strong>Ratings:</strong>
					<?php 
					$avg = $voteitem->votes/5; 
				    $rate = substr($avg,0, strpos($avg, '.') + 2 + 1);
				    ?></p>
				
				<?php //echo $rate ."%"; 
				echo "<div style ='position:relative; top:-31px; left:50px; width:100px; height:15px;'>"; include('includes/rates.php'); echo "</div>";
				?>
				

				
					   
				<?php endforeach; ?>

			<p>
				<strong>Posted By:</strong>
				<?php echo $landmark->user->username; ?></p>
			</div>
		</div>


		<div class="row" style="position:relative;top:15px">
				
				<div class="span4" id="c-img1">
					<div class="t-name1"><p>Location</p></div>
					<div class="inner-cont">
			
					<div id="map" style="width:385px;height:250px"></div>
					</div>
				</div>
				
			</div>

	</div>



</div>


<script>
		// create a map in the "map" div, set the view to a given place and zoom
		var map = L.map('map').setView(['<?php echo $landmark->latitude; ?>','<?php echo $landmark->longitude; ?>'], 18);

		// add an OpenStreetMap tile layer
		L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 18,
		}).addTo(map);

		// add a marker in the given location, attach some popup content to it and open the popup
		L.marker(['<?php echo $landmark->latitude; ?>','<?php echo $landmark->longitude; ?>']).addTo(map);
		    // .bindPopup('A pretty CSS3 popup. <br> Easily customizable.')
		    // .openPopup();

	</script>