<?php

class Controller_Public extends Controller_Base
{
	public $template = 'template';


	public function action_index()
	{
		$data['jeepneyroutes'] = Model_Jeepneyroute::find('all', array('limit' => 3 ,'order_by' => array('created_at' => 'desc')));
		$data['tricycleroutes'] = Model_Tricycleroute::find('all', array('limit' => 3, 'order_by' => array('created_at' => 'desc')));
		$data['landmarks'] = Model_Landmark::find('all', array('limit' => 3, 'order_by' => array('created_at' => 'desc')));
		$this->template->title = 'Dashboard';
		$this->template->content = View::forge('dashboard',$data);
	}

}

/* End of file admin.php */
