<?php
class Controller_Admin_Jeepneyroute extends Controller_Admin 
{

	public function action_index()
	{
		$data['jeepneyroutes'] = Model_Jeepneyroute::find('all');
		$this->template->title = "Jeepneyroutes";
		$this->template->content = View::forge('admin\jeepneyroute/index', $data);
	}

	public function action_view($id = null)
	{
		$data['jeepneyroute'] = Model_Jeepneyroute::find($id);

		$this->template->title = "Jeepneyroute";
		$this->template->content = View::forge('admin\jeepneyroute/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Jeepneyroute::validate('create');

			if ($val->run())
			{
				$jeepneyroute = Model_Jeepneyroute::forge(array(
					'routename' => Input::post('routename'),
					'routedesc' => Input::post('routedesc'),
					'filename' => Input::post('filename'),
					'size' => Input::post('size'),
					'type' => Input::post('type'),
					'fileurl' => Input::post('fileurl'),
					
				));


				$config = array(
            	'path' => DOCROOT.'uploads/jeepneyroute',
            	'normalize'   => true,
            	'randomize' => false,
            	'ext_whitelist' => array('gpx'),
            	'max_size'    => 1024 * 1024,
            	);

           
            
                while(Upload::get_files()){

                     Upload::process($config);

                        if (Upload::is_valid()) {
                                                                        
                                        Upload::save();

                                           $value = Upload::get_files();

                                           foreach($value as $files) {
                                               //print_r($files); 

                                                $jeepneyroute->filename = $value[0]['saved_as'];
                                                $jeepneyroute->size = $value[1]['size']/1024;
                                                $jeepneyroute->fileurl = $value[1]['saved_to'].$value[0]['saved_as'];
                                                //$jeepneyroute->fileurl = $value[1]['saved_to'];
                                                $jeepneyroute->type = $value[1]['extension'];
                                                $jeepneyroute->save();
                                            }



				if ($jeepneyroute and $jeepneyroute->save())
				{
					Session::set_flash('success', e('Added jeepneyroute #'.$jeepneyroute->id.'.'));

					Response::redirect('admin/jeepneyroute');
				}

				else
				{
					Session::set_flash('error', e('Could not save jeepneyroute.'));
				}
			}
			}//end of while
      
    		}//end of if
			else
			{
				Session::set_flash('error', $val->error());
			}
		}


		$this->template->title = "Jeepneyroutes";
		$this->template->content = View::forge('admin\jeepneyroute/create');

	}

	public function action_edit($id = null)
	{
		$jeepneyroute = Model_Jeepneyroute::find($id);
		$val = Model_Jeepneyroute::validate('edit');

		if ($val->run())
		{
			$jeepneyroute->routename = Input::post('routename');
			$jeepneyroute->routedesc = Input::post('routedesc');
			$jeepneyroute->filename = Input::post('filename');
			$jeepneyroute->size = Input::post('size');
			$jeepneyroute->type = Input::post('type');
			$jeepneyroute->fileurl = Input::post('fileurl');

			$config = array(
            	'path' => DOCROOT.'uploads/jeepneyroute',
            	'normalize'   => true,
            	'randomize' => false,
            	'ext_whitelist' => array('gpx'),
            	'max_size'    => 1024 * 1024,
            	);

           
            
                while(Upload::get_files()){

                     Upload::process($config);

                        if (Upload::is_valid()) {
                                                                        
                                        Upload::save();

                                           $value = Upload::get_files();

                                           foreach($value as $files) {
                                               //print_r($files); 

                                                $jeepneyroute->filename = $value[0]['saved_as'];
                                                $jeepneyroute->size = $value[1]['size']/1024;
                                                $jeepneyroute->fileurl = $value[1]['saved_to'].$value[0]['saved_as'];
                                                //$jeepneyroute->fileurl = $value[1]['saved_to'];
                                                $jeepneyroute->type = $value[1]['extension'];
                                                $jeepneyroute->save();
                                            }
		

			if ($jeepneyroute->save())
			{
				Session::set_flash('success', e('Updated jeepneyroute #' . $id));

				Response::redirect('admin/jeepneyroute');
			}

			else
			{
				Session::set_flash('error', e('Could not update jeepneyroute #' . $id));
			}
		}

		}//end of while
      
    		}//end of if

		else
		{
			if (Input::method() == 'POST')
			{
				$jeepneyroute->routename = $val->validated('routename');
				$jeepneyroute->routedesc = $val->validated('routedesc');
				$jeepneyroute->filename = $val->validated('filename');
				$jeepneyroute->size = $val->validated('size');
				$jeepneyroute->type = $val->validated('type');
				$jeepneyroute->fileurl = $val->validated('fileurl');
				

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('jeepneyroute', $jeepneyroute, false);
		}

		$this->template->title = "Jeepneyroutes";
		$this->template->content = View::forge('admin\jeepneyroute/edit');

	}

	public function action_delete($id = null)
	{
		if ($jeepneyroute = Model_Jeepneyroute::find($id))
		{
			$jeepneyroute->delete();

			Session::set_flash('success', e('Deleted jeepneyroute #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete jeepneyroute #'.$id));
		}

		Response::redirect('admin/jeepneyroute');

	}


	public function action_draw(){
		$data['jeepneyroutes'] = Model_Jeepneyroute::find('all');
		$this->template->title = "Jeepneyroute";
		$this->template->content = View::forge('admin\jeepneyroute/draw',$data);
	}


	
}//end of class