<?php
class Controller_Users_Taxiroute extends Controller_Users
{

	public function action_index()
	{
		
		$this->template->title = "Taxiroutes";
		return Response::forge(View::forge('users\taxiroute/index'));
	}

	public function action_map($from = null, $to = null)
	{
		$data['latlons'] = array($from, $to);
		return Response::forge(View::forge('users\taxiroute/map',$data));
		
	}


	
}//end of class