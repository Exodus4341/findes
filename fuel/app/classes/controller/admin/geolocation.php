<?php
class Controller_Admin_Geolocation extends Controller_Admin 
{


	public function action_map($latlons = null)
	{
		$data['latlons'] = array($latlons);
		return Response::forge(View::forge('admin\geolocation/index',$data));
		
	}


	
}//end of class