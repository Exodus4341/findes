<?php
class Controller_Admin_Landmarkphotos extends Controller_Admin 
{

	public function action_index()
	{
		$data['landmarkphotos'] = Model_Landmarkphoto::find('all', array('order_by' => array('created_at' => 'desc')));
		$view = View::forge('admin\landmarkphotos/index', $data);

		$view->set_global('landmarks', Arr::assoc_to_keyval(Model_Landmark::find('all'),'id','placename'));

		$this->template->title = "Landmarkphotos";
		$this->template->content = $view;

	}

	public function action_view($id = null)
	{
		$data['landmarkphoto'] = Model_Landmarkphoto::find($id);

		$view = View::forge('admin\landmarkphotos/view', $data);

		$this->template->title = "Landmarkphoto";
		$this->template->content = $view;

	}


	public function action_create()
	{
		$view = View::forge('admin\landmarkphotos/create');

		if (Input::method() == 'POST')
		{
			$val = Model_Landmarkphoto::validate('create');

			if ($val->run())
			{
				$landmarkphoto = Model_Landmarkphoto::forge(array(
					'fileurl' => Input::post('fileurl'),
					'landmark_id' => Input::post('landmark_id'),
				));

				 
				$config = array(
		            'path' => DOCROOT.'uploads/landmarks/'.$landmarkphoto->landmark_id,
		            'normalize'   => true,
		            'randomize' => false,
		            'ext_whitelist' => array('png','jpg','bmp','jpeg'),
		            //'max_size'    => 1024 * 1024,
		            );


				  while(Upload::get_files()){

                     Upload::process($config);

                        if (Upload::is_valid()) {
                                                                        
                            Upload::save();

                            $value = Upload::get_files();

                            foreach($value as $files) {
                              //print_r($files); 
                              //$upload->filename = $value[0]['saved_as'];
                              //$upload->size = $value[1]['size']/1024;
                              //$landmark->fileurl = $value[1]['saved_to'].$value[0]['saved_as'];
                                $landmarkphoto->fileurl = $value[0]['saved_as'];
                              //$upload->type = $value[1]['extension'];
                                $landmarkphoto->save();
                            }

                            $curr_date = date("Y-m-d H:i:s");

							$update_landmark = DB::query("UPDATE `landmarks` SET `updated_at` = '$curr_date' WHERE `id` = '$landmarkphoto->landmark_id'")->execute();

                            // Read the contents of a directory
							try{
								File::create_dir(DOCROOT.'uploads/landmarks/'.$landmarkphoto->landmark_id,'/thumb/', 0755);
								File::create_dir(DOCROOT.'uploads/landmarks/'.$landmarkphoto->landmark_id,'/orig/', 0755);
								File::create_dir(DOCROOT.'uploads/landmarks/'.$landmarkphoto->landmark_id,'/icon/', 0755);
							}catch(\FileAccessException $e)
							{
		                      // Operation failed
							}


                            Image::load('uploads/landmarks/'.$landmarkphoto->landmark_id.'/'.$landmarkphoto->fileurl)
                                ->resize(230,230)
                                ->save('uploads/landmarks/'.$landmarkphoto->landmark_id.'/thumb/'.$landmarkphoto->fileurl);

                            Image::load('uploads/landmarks/'.$landmarkphoto->landmark_id.'/'.$landmarkphoto->fileurl)
                                ->resize(450,450)
                                ->save('uploads/landmarks/'.$landmarkphoto->landmark_id.'/orig/'.$landmarkphoto->fileurl);

                            Image::load('uploads/landmarks/'.$landmarkphoto->landmark_id.'/'.$landmarkphoto->fileurl)
                                ->resize(90,68)
                                ->save('uploads/landmarks/'.$landmarkphoto->landmark_id.'/icon/'.$landmarkphoto->fileurl);




				if ($landmarkphoto and $landmarkphoto->save())
				{
					Session::set_flash('success', e('Added landmark: '.$landmarkphoto->landmark_id.'.'));

					Response::redirect('admin/landmarkphotos');
				}

				else
				{
					Session::set_flash('error', e('Could not save landmark.'));
				}
					}//end of if(Upload::is_valid())
				}//end of while loop
			}//end of if($val->run())
			
			else
			{
				Session::set_flash('error', $val->error());
			}


		}



		$view->set_global('landmarks', Arr::assoc_to_keyval(Model_Landmark::find('all'), 'id', 'placename'));

		$this->template->title = "Landmarkphotos";
		$this->template->content = $view;

	}

	public function action_edit($id = null)
	{

		$view = View::forge('admin\landmarkphotos/edit');
		
		$landmarkphoto = Model_Landmarkphoto::find($id);
		$val = Model_Landmarkphoto::validate('edit');

		if ($val->run())
		{
			
			$landmarkphoto->fileurl = Input::post('fileurl');
			$landmarkphoto->landmark_id = Input::post('landmarkid');

			if ($landmarkphoto->save())
			{
				Session::set_flash('success', e('Updated landmarkphoto #' . $id));

				Response::redirect('admin/landmarkphotos');
			}

			else
			{
				Session::set_flash('error', e('Could not update landmarkphoto #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$landmarkphoto->fileurl = $val->validated('fileurl');
				$landmarkphoto->landmark_id = $val->validated('landmark_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('landmarkphoto', $landmarkphoto, false);
		}

		$view->set_global('landmarks', Arr::assoc_to_keyval(Model_Landmark::find('all'), 'id', 'placename'));

		$this->template->title = "Landmarkphotos";
		$this->template->content = $view;

	}

	public function action_delete($id = null)
	{
		if ($landmarkphoto = Model_Landmarkphoto::find($id))
		{
			$landmarkphoto->delete();

			Session::set_flash('success', e('Deleted landmarkphoto #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete landmarkphoto #'.$id));
		}

		Response::redirect('admin/landmarkphotos');

	}

}