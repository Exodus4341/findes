<?php
class Controller_Admin_Tricycleroute extends Controller_Admin 
{

	public function action_index()
	{
		$data['tricycleroutes'] = Model_Tricycleroute::find('all');
		$this->template->title = "Tricycleroutes";
		$this->template->content = View::forge('admin\tricycleroute/index', $data);

	}

	public function action_view($id = null)
	{
		$data['tricycleroute'] = Model_Tricycleroute::find($id);

		$this->template->title = "Tricycleroute";
		$this->template->content = View::forge('admin\tricycleroute/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Tricycleroute::validate('create');

			if ($val->run())
			{
				$tricycleroute = Model_Tricycleroute::forge(array(
					'routename' => Input::post('routename'),
					'routedesc' => Input::post('routedesc'),
					'filename' => Input::post('filename'),
					'size' => Input::post('size'),
					'type' => Input::post('type'),
					'fileurl' => Input::post('fileurl'),

				));

				$config = array(
            		'path' => DOCROOT.'uploads/tricycleroute',
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

                                                $tricycleroute->filename = $value[0]['saved_as'];
                                                $tricycleroute->size = $value[1]['size']/1024;
                                                $tricycleroute->fileurl = $value[1]['saved_to'].$value[1]['name'];
                                                $tricycleroute->type = $value[1]['extension'];
                                                $tricycleroute->save();
                                            }
                                           

                 


				if ($tricycleroute and $tricycleroute->save())
				{
					Session::set_flash('success', e('Added tricycleroute #'.$tricycleroute->id.'.'));

					Response::redirect('admin/tricycleroute');
				}

				else
				{
					Session::set_flash('error', e('Could not save tricycleroute.'));
				}
			}

				}//end of while
      
    			}//end of if
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Tricycleroutes";
		$this->template->content = View::forge('admin\tricycleroute/create');

	}

	public function action_edit($id = null)
	{
		$tricycleroute = Model_Tricycleroute::find($id);
		$val = Model_Tricycleroute::validate('edit');

		if ($val->run())
		{
			$tricycleroute->routename = Input::post('routename');
			$tricycleroute->routedesc = Input::post('routedesc');
			$tricycleroute->filename = Input::post('filename');
			$tricycleroute->size = Input::post('size');
			$tricycleroute->type = Input::post('type');
			$tricycleroute->fileurl = Input::post('fileurl');

			$config = array(
            		'path' => DOCROOT.'uploads/tricycleroute',
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

                                                $tricycleroute->filename = $value[0]['saved_as'];
                                                $tricycleroute->size = $value[1]['size']/1024;
                                                $tricycleroute->fileurl = $value[1]['saved_to'].$value[1]['name'];
                                                $tricycleroute->type = $value[1]['extension'];
                                                $tricycleroute->save();
                                            }

			if ($tricycleroute->save())
			{
				Session::set_flash('success', e('Updated tricycleroute #' . $id));

				Response::redirect('admin/tricycleroute');
			}

			else
			{
				Session::set_flash('error', e('Could not update tricycleroute #' . $id));
			}
		}

			}//end of while
      
    		}//end of if

		else
		{
			if (Input::method() == 'POST')
			{
				$tricycleroute->routename = $val->validated('routename');
				$tricycleroute->routedesc = $val->validated('routedesc');
				$tricycleroute->filename = $val->validated('filename');
				$tricycleroute->size = $val->validated('size');
				$tricycleroute->type = $val->validated('type');
				$tricycleroute->fileurl = $val->validated('fileurl');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('tricycleroute', $tricycleroute, false);
		}

		$this->template->title = "Tricycleroutes";
		$this->template->content = View::forge('admin\tricycleroute/edit');

	}

	public function action_delete($id = null)
	{
		if ($tricycleroute = Model_Tricycleroute::find($id))
		{
			$tricycleroute->delete();

			Session::set_flash('success', e('Deleted tricycleroute #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete tricycleroute #'.$id));
		}

		Response::redirect('admin/tricycleroute');

	}



	public function action_doupload() {
		
			$val = Model_Tricycleroute::validate('doupload');

			if ($val->run())
			{

            $upload = Model_Tricycleroute::forge();

            $config = array(
            'path' => DOCROOT.'uploads/tricycleroute',
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

                                                $upload->filename = $value[0]['saved_as'];
                                                $upload->size = $value[1]['size']/1024;
                                                $upload->fileurl = $value[1]['saved_to'].$value[1]['name'];
                                                $upload->type = $value[1]['extension'];
                                                $upload->save();
                                            }
                                           

                            if ($upload->save())
                            {
                            	Session::set_flash('success', e('Added Tricycle Vector >> '.$upload->filename.'.'));
                            	Response::redirect('admin/tricycleroute/index');

                            }

                        
                                        
                        }
                       
                      else{
                            Session::set_flash('error', 'Invalid File Format, '.
                            'please try again!');
                       }

                       Response::redirect('admin/tricycleroute/index');
                                
                 }//end of while
      
    		}//end of if

    		
              Session::set_flash('error', 'No selected file, '.'please try again!');
              Response::redirect('admin/tricycleroute/index');


	}//end of function


	public function action_draw(){
		$data['tricycleroutes'] = Model_Tricycleroute::find('all');
		$this->template->title = "Tricycleroute";
		$this->template->content = View::forge('admin\tricycleroute/draw',$data);
	}



}