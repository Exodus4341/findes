<?php
class Controller_Admin_Taxiroute extends Controller_Admin 
{

	public function action_index()
	{
		
		$this->template->title = "Taxiroutes";
		return Response::forge(View::forge('admin\taxiroute/index'));
	}

	public function action_map($from = null, $to = null)
	{
		$data['latlons'] = array($from, $to);
		return Response::forge(View::forge('admin\taxiroute/map',$data));
		
	}


	
}//end of class