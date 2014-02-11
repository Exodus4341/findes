<?php

class Controller_Api extends Controller_Rest{

	public function get_users(){
		$data['users'] = Model_User::find('all');
		return $this->response($data);

	}

	public function get_jeepneyroutes(){
		$data['jeepneyroutes'] = Model_Jeepneyroute::find('all');
		return $this->response($data);
	}

	public function get_tricycleroutes(){
		$data['tricycleroutes'] = Model_Tricycleroute::find('all');
		//$data['tricycleroutes'] = Model_Tricycleroute::find('all', array('limit' => 3, 'order_by' => array('created_at' => 'desc')));
		return $this->response($data);
	}


	public function get_landmarks($datetime){

	$host = 'localhost';
	$user = 'root'; 
	$passwd = '';
	$db = 'findes';
	$mysqli = new mysqli($host,$user,$passwd,$db);

	$landmarks_query = "SELECT * FROM landmarks WHERE updated_at > '$datetime' ORDER BY updated_at DESC";
	$landmarks = $mysqli->query($landmarks_query);
	$landmarks_result = $landmarks->fetch_all(MYSQLI_ASSOC);

    $query_roadlocation = "SELECT * FROM roadlocations GROUP BY id";
    $roadlocations = $mysqli->query($query_roadlocation);
    $roadlocations_result = $roadlocations->fetch_all(MYSQLI_ASSOC);

    $query_ratings = "SELECT * FROM voteitems GROUP BY id";
    $ratings = $mysqli->query($query_ratings);
    $ratings_result = $ratings->fetch_all(MYSQLI_ASSOC);

    $query_categories = "SELECT * FROM landmarkcategories GROUP BY id";
    $categories = $mysqli->query($query_categories);
    $categories_result = $categories->fetch_all(MYSQLI_ASSOC);

    $query_landmarkphotos = "SELECT * FROM landmarkphotos GROUP BY id";
    $landmarkphotos = $mysqli->query($query_landmarkphotos);
    $landmarkphotos_result = $landmarkphotos->fetch_all(MYSQLI_ASSOC);

	if(sizeof($landmarks_result) == 0){
		echo "";
	}
	
	else{
	$writer = new XMLWriter();
	    $writer->openMemory();

	    $writer->setIndent(true);

	    $writer->setIndentString(" ");

	    $writer->startDocument("1.0", "UTF-8");

	    $writer->startElement('landmarks');
	    
	    for($x = 0 ; $x < sizeof($landmarks_result); $x++){
	    		$id = $landmarks_result[$x]['id'];
	    		$landmarkid = $landmarks_result[$x]['landmarkcategory_id'];
	            $placename = $landmarks_result[$x]['placename'];
	            $lat = $landmarks_result[$x]['latitude'];
	            $lon = $landmarks_result[$x]['longitude'];

	        $writer->startElement("landmark");
	          
	            $writer->startElement("placename");
	             	$writer->writeAttribute("lat", $lat);
	             	$writer->writeAttribute("lng", $lon);
	            	$writer->text($placename);
	            $writer->endElement();
	    	
	    	$writer->startElement("roadlocations");
	    		$isFound = false;
		    	for($y = 0 ; $y < sizeof($roadlocations_result); $y++){
		    		if($id == $roadlocations_result[$y]['landmark_id']){
			    		$latitude = $roadlocations_result[$y]['lat'];
			    		$longitude = $roadlocations_result[$y]['lon'];

				    		$writer->startElement("roadlocation");
				             	$writer->writeAttribute("lat", $latitude);
				             	$writer->writeAttribute("lng", $longitude);
				            $writer->endElement();

				        $isFound = true;
			        }
			        else if($isFound){
			        	break;
			        }
		    	}
	    	$writer->endElement();

	    	$writer->startElement("ratings");
	    		$isFound = false;
	    		
	    		$rate = 0;
		    	
		    	for($y = 0 ; $y < sizeof($ratings_result); $y++){
		    		
		    		if($id == $ratings_result[$y]['landmark_id']){
			    		$votes = $ratings_result[$y]['votes'];
			    		$nrates = $ratings_result[$y]['nrates'];
			    		
			    		$avg = $votes/$nrates;

			    		$rate = substr($avg,0, strpos($avg, '.') + 2 + 1);

				        $isFound = true;
			        }

			        else if($isFound){
			        	break;
			        }

		    	}

		    	$writer->text($rate);

	    	$writer->endElement();

	    	$writer->startElement("category");
	    		$isFound = false;
		    	for($y = 0 ; $y < sizeof($categories_result); $y++){
		    		if($landmarkid == $categories_result[$y]['id']){
			    		$category = $categories_result[$y]['categories'];
			    		
			    		$writer->text($category);
			    		
				        $isFound = true;
			        }
			        else if($isFound){
			        	break;
			        }
		    	}
	    	$writer->endElement();

			$desc = $landmarks_result[$x]['description'];

			$writer->startElement("description");
		       	$writer->text($desc);
		    $writer->endElement();

    		$histo = $landmarks_result[$x]['history'];

    		$writer->startElement("history");
               	$writer->text($histo);
            $writer->endElement();

          	$url = Config::get('base_url').'uploads/landmarks/'.$landmarks_result[$x]['placename'].'/'.$landmarks_result[$x]['fileurl'];

          	 $writer->startElement("fileurls");
            	
            	$writer->startElement("fileurl");
            		$writer->writeAttribute("url", $url);
		    	$writer->endElement();//end element of fileurl
		    		
		    	$isFound = false;
		    	for($y = 0 ; $y < sizeof($landmarkphotos_result); $y++){
		    		if($id == $landmarkphotos_result[$y]['landmark_id']){

			    		$landmarkphotos = Config::get('base_url').'uploads/landmarks/'.$landmarkphotos_result[$y]['landmark_id'].'/'.$landmarkphotos_result[$y]['fileurl'];
			    		
			    		$writer->startElement("fileurl");
			    			$writer->writeAttribute("url", $landmarkphotos);
			    		$writer->endElement();//end element of fileurl
			    		
				        $isFound = true;
			        }
			        else if($isFound){
			        	break;
			        }
		    	}
               		
               	
            $writer->endElement();//end element of fileurls

        $writer->endElement(); //end element of landmarks
        }

	    $writer->endElement();

	 	$writer->endDocument();

	    header('Content-type: text/xml');


	echo $writer->outputMemory();
	    // $filename = "example.xml";
	    // $file = $writer->outputMemory();
	    // file_put_contents($filename,$file);
		}
	}

	public function get_gpx($datetime){

	$host = 'localhost';
    $user = 'root';
    $passwd = '';
    $db = 'findes';
    $mysqli = new mysqli($host,$user,$passwd,$db);

	$query_jeepneyroutes = "SELECT filename FROM jeepneyroutes WHERE updated_at > '$datetime' ORDER BY updated_at DESC";
    $jeepneyroutes = $mysqli->query($query_jeepneyroutes);   
    $jeepneyroutes_result = $jeepneyroutes->fetch_all(MYSQLI_ASSOC);

    $query_tricycleroutes = "SELECT filename FROM tricycleroutes WHERE updated_at > '$datetime' ORDER BY updated_at DESC";
    $tricycleroutes = $mysqli->query($query_tricycleroutes);
    $tricycleroutes_result = $tricycleroutes->fetch_all(MYSQLI_ASSOC);   


    if(sizeof($jeepneyroutes_result) == 0 && sizeof($tricycleroutes_result) == 0){
    	echo "";
    }
	else{

	$writer = new XMLWriter();
    $writer->openMemory();

    $writer->setIndent(true);

    $writer->setIndentString(" ");

    $writer->startDocument("1.0", "UTF-8");

    $writer->startElement('gpx');
//////////////////////////////////////////////////////
    	
	    $writer->startElement("jeepneys");	
	        for($x = 0; $x < sizeof($jeepneyroutes_result); $x++){
	        	$jeepurl = 'http://192.168.49.1/finaldestination/public/uploads/jeepneyroute/'.$jeepneyroutes_result[$x]['filename'];
	    		$writer->startElement("jeepney");
	             	$writer->writeAttribute("url", $jeepurl);
	            $writer->endElement();
	            }
        $writer->endElement();//end of element jeepneys
//////////////////////////////////////////////////////
	    
	    $writer->startElement("tricycles");	 	    	
			  for($x = 0; $x < sizeof($tricycleroutes_result); $x++){
			  	$tricycleurl = 'http://192.168.49.1/finaldestination/public/uploads/tricycleroute/'.$tricycleroutes_result[$x]['filename'];
	    		$writer->startElement("tricycle");
	             	$writer->writeAttribute("url", $tricycleurl);
	            $writer->endElement();
              }
          $writer->endElement();//end of element tricycles
//////////////////////////////////////////////////////
   
    $writer->endElement();//end of element gpx

    $writer->endDocument();//end of document gpx

    header('Content-type: text/xml');

	echo $writer->outputMemory();
	    // $filename = "example.xml";
	    // $file = $writer->outputMemory();
	    // file_put_contents($filename,$file);
		}
	}




	public function get_tilemaps($datetime){

	$host = 'localhost';
    $user = 'root';
    $passwd = '';
    $db = 'findes';
    $mysqli = new mysqli($host,$user,$passwd,$db);

	$query_tilemaps = "SELECT * FROM tilemaps WHERE updated_at > '$datetime' ORDER BY updated_at DESC";
    $tilemaps = $mysqli->query($query_tilemaps);   
    $tilemaps_result = $tilemaps->fetch_all(MYSQLI_ASSOC);


    if(sizeof($tilemaps_result) == 0){
    	echo "";
    }
	else{

	$writer = new XMLWriter();
    $writer->openMemory();

    $writer->setIndent(true);

    $writer->setIndentString(" ");

    $writer->startDocument("1.0", "UTF-8");

    
//////////////////////////////////////////////////////
    	
	    $writer->startElement("tilemaps");	
	        for($x = 0; $x < sizeof($tilemaps_result); $x++){
	        	$tilemapurl = 'http://192.168.49.1/finaldestination/public/uploads/tilemaps/'.$tilemaps_result[$x]['mapname'].'/'.$tilemaps_result[$x]['source'];
	    		$writer->startElement("tilemap");
	             	$writer->writeAttribute("url", $tilemapurl);
	            $writer->endElement();
	            }
        $writer->endElement();//end of element jeepneys
//////////////////////////////////////////////////////
	      
    $writer->endDocument();//end of document

    header('Content-type: text/xml');

	echo $writer->outputMemory();
	    // $filename = "example.xml";
	    // $file = $writer->outputMemory();
	    // file_put_contents($filename,$file);
		}	
		
	}



	public function get_configs($datetime){

	$host = 'localhost';
    $user = 'root';
    $passwd = '';
    $db = 'findes';
    $mysqli = new mysqli($host,$user,$passwd,$db);

	$query_configs = "SELECT * FROM configs WHERE updated_at > '$datetime' ORDER BY updated_at DESC";
    $configs = $mysqli->query($query_configs);   
    $configs_result = $configs->fetch_all(MYSQLI_ASSOC);

    $query_puvs = "SELECT * FROM puvs WHERE updated_at > '$datetime' ORDER BY updated_at DESC";
    $puvs = $mysqli->query($query_puvs);   
    $puvs_result = $puvs->fetch_all(MYSQLI_ASSOC);

    $query_puvtypes = "SELECT * FROM puvtypes WHERE updated_at > '$datetime' ORDER BY updated_at DESC";
    $puvtypes = $mysqli->query($query_puvtypes);   
    $puvtypes_result = $puvtypes->fetch_all(MYSQLI_ASSOC);

    $query_directions = "SELECT * FROM directions WHERE updated_at > '$datetime' ORDER BY updated_at DESC";
    $directions = $mysqli->query($query_directions);   
    $directions_result = $directions->fetch_all(MYSQLI_ASSOC);


    if(sizeof($configs_result) == 0 && sizeof($puvs_result) == 0){
    	echo "";
    }
	else{

	$writer = new XMLWriter();
    $writer->openMemory();

    $writer->setIndent(true);

    $writer->setIndentString(" ");

    $writer->startDocument("1.0", "UTF-8");

    $writer->startElement("config");	
    
     for($x = 0; $x < sizeof($configs_result); $x++){
	    $default_currency = $configs_result[$x]['default_currency'];
	    $jeepney_maxspeed = $configs_result[$x]['jeepney_maxspeed'];
	    $jeepney_minspeed = $configs_result[$x]['jeepney_minspeed'];
	    $tricycle_maxspeed = $configs_result[$x]['tricycle_maxspeed'];
	    $tricycle_minspeed = $configs_result[$x]['tricycle_minspeed'];	
	    $route_tolerance = $configs_result[$x]['route_tolerance'];	
	           
//////////////////////////////////////////////////////
	    $writer->startElement("default_currency");	
	             	$writer->text($default_currency);
        $writer->endElement();//end of default_currency
//////////////////////////////////////////////////////

//////////////////////////////////////////////////////
	    $writer->startElement("jeepney_velocity");	
	             	$writer->writeAttribute('minspeed',$jeepney_minspeed);
	             	$writer->writeAttribute('maxspeed',$jeepney_maxspeed);
        $writer->endElement();//end of jeepney_velocity
//////////////////////////////////////////////////////

//////////////////////////////////////////////////////
	    $writer->startElement("tricycle_velocity");	
	             	$writer->writeAttribute('minspeed',$tricycle_minspeed);
	             	$writer->writeAttribute('maxspeed',$tricycle_maxspeed);
        $writer->endElement();//end of jeepney_velocity
//////////////////////////////////////////////////////

//////////////////////////////////////////////////////
       	$writer->startElement("fare_jeepney");
	    for($y = 0; $y < sizeof($puvs_result); $y++){
	    	$initSucc = $puvs_result[$y]['initSucc'];
	    	$succFare = $puvs_result[$y]['succFare'];
	    	$initDis = $puvs_result[$y]['initDis'];
	    	$succDis = $puvs_result[$y]['succDis'];
	    	
	    	if($puvs_result[$y]['FareType'] == 'Regular' && $puvs_result[$y]['PUV_id'] == 1){
				$writer->startElement("regular");
					$writer->writeAttribute('initSucc',$initSucc);
					$writer->writeAttribute('succFare',$succFare);
					$writer->writeAttribute('initDis',$initDis);
					$writer->writeAttribute('succDis',$succDis);
				$writer->endElement();
			}


			if($puvs_result[$y]['FareType'] == 'Student' && $puvs_result[$y]['PUV_id'] == 1){
				$writer->startElement("student");
					$writer->writeAttribute('initSucc',$initSucc);
					$writer->writeAttribute('succFare',$succFare);
					$writer->writeAttribute('initDis',$initDis);
					$writer->writeAttribute('succDis',$succDis);
				$writer->endElement();
			}


			if($puvs_result[$y]['FareType'] == 'Elderly' && $puvs_result[$y]['PUV_id'] == 1){
				$writer->startElement("elderly");
					$writer->writeAttribute('initSucc',$initSucc);
					$writer->writeAttribute('succFare',$succFare);
					$writer->writeAttribute('initDis',$initDis);
					$writer->writeAttribute('succDis',$succDis);
				$writer->endElement();
			}


			if($puvs_result[$y]['FareType'] == 'Disabled' && $puvs_result[$y]['PUV_id'] == 1){
				$writer->startElement("disabled");
					$writer->writeAttribute('initSucc',$initSucc);
					$writer->writeAttribute('succFare',$succFare);
					$writer->writeAttribute('initDis',$initDis);
					$writer->writeAttribute('succDis',$succDis);
				$writer->endElement();
			}

	        	
	    }
    	$writer->endElement();//end of element fare_jeepney
//////////////////////////////////////////////////////

//////////////////////////////////////////////////////
       	$writer->startElement("fare_tricyle");
	    for($y = 0; $y < sizeof($puvs_result); $y++){
	    	$initSucc = $puvs_result[$y]['initSucc'];
	    	$succFare = $puvs_result[$y]['succFare'];
	    	$initDis = $puvs_result[$y]['initDis'];
	    	$succDis = $puvs_result[$y]['succDis'];
	    	
	    	if($puvs_result[$y]['FareType'] == 'Regular' && $puvs_result[$y]['PUV_id'] == 2){
				$writer->startElement("regular");
					$writer->writeAttribute('initSucc',$initSucc);
					$writer->writeAttribute('succFare',$succFare);
					$writer->writeAttribute('initDis',$initDis);
					$writer->writeAttribute('succDis',$succDis);
				$writer->endElement();
			}


			if($puvs_result[$y]['FareType'] == 'Student' && $puvs_result[$y]['PUV_id'] == 2){
				$writer->startElement("student");
					$writer->writeAttribute('initSucc',$initSucc);
					$writer->writeAttribute('succFare',$succFare);
					$writer->writeAttribute('initDis',$initDis);
					$writer->writeAttribute('succDis',$succDis);
				$writer->endElement();
			}


			if($puvs_result[$y]['FareType'] == 'Elderly' && $puvs_result[$y]['PUV_id'] == 2){
				$writer->startElement("elderly");
					$writer->writeAttribute('initSucc',$initSucc);
					$writer->writeAttribute('succFare',$succFare);
					$writer->writeAttribute('initDis',$initDis);
					$writer->writeAttribute('succDis',$succDis);
				$writer->endElement();
			}


			if($puvs_result[$y]['FareType'] == 'Disabled' && $puvs_result[$y]['PUV_id'] == 2){
				$writer->startElement("disabled");
					$writer->writeAttribute('initSucc',$initSucc);
					$writer->writeAttribute('succFare',$succFare);
					$writer->writeAttribute('initDis',$initDis);
					$writer->writeAttribute('succDis',$succDis);
				$writer->endElement();
			}

	        	
	    }
    	$writer->endElement();//end of element fare_tricycle
//////////////////////////////////////////////////////    	

//////////////////////////////////////////////////////
    	$writer->startElement("directions");
			    for($y = 0; $y < sizeof($directions_result); $y++){
			  	$jeepneyPrefix = $directions_result[$y]['jeepneyPrefix'];
			  	$tricyclePrefix = $directions_result[$y]['tricyclePrefix'];
			  	$midFix = $directions_result[$y]['midFix'];
			  	$postFix = $directions_result[$y]['postFix'];
			  	$name = $directions_result[$y]['directionName'];

			  	$writer->startElement("direction");
			  		$writer->writeAttribute('name', $name);

			  		$writer->startElement("jeepney_prefix");
			  			$writer->text($jeepneyPrefix);
			  		$writer->endElement();

			  		$writer->startElement("tricycle_prefix");
			  			$writer->text($tricyclePrefix);
			  		$writer->endElement();

			  		$writer->startElement("midfix");
			  			$writer->text($midFix);
			  		$writer->endElement();

			  		$writer->startElement("postfix");
			  			$writer->text($postFix);
			  		$writer->endElement();

				$writer->endElement();	  					    
			  	}
	    $writer->endElement();
//////////////////////////////////////////////////////

//////////////////////////////////////////////////////
	    $writer->startElement("route_tolerance");	
	             	$writer->text($route_tolerance);
        $writer->endElement();//end of route_tolerance
//////////////////////////////////////////////////////
	
    }// end of forloop
	$writer->endElement();
    $writer->endDocument();//end of document

    header('Content-type: text/xml');

	echo $writer->outputMemory();
	    // $filename = "example.xml";
	    // $file = $writer->outputMemory();
	    // file_put_contents($filename,$file);
		}	


	}


	public function get_date(){
		echo date("Y-m-d,H:i:s");
	}


	public function get_location($latlons = null)
	{
		$data['latlons'] = array($latlons);
		return Response::forge(View::forge('admin\geolocation/index',$data));
		
	}


	public function get_taxiroute($from = null, $to = null)
	{
		$data['latlons'] = array($from, $to);
		return Response::forge(View::forge('admin\taxiroute/map',$data));
		
	}


}