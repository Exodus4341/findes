<?php
class Controller_Admin_Tilemaps extends Controller_Admin 
{

	public function action_index()
	{
		$data['tilemaps'] = Model_Tilemap::find('all');
		$this->template->title = "Tilemaps";
		$this->template->content = View::forge('admin\tilemaps/index', $data);

	}

	public function action_view($id = null)
	{
		$data['tilemap'] = Model_Tilemap::find($id);

		$this->template->title = "Tilemap";
		$this->template->content = View::forge('admin\tilemaps/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Tilemap::validate('create');

			if ($val->run())
			{
				$tilemap = Model_Tilemap::forge(array(
					'mapname' => Input::post('mapname'),
					'source' => Input::post('source'),
				));



				$config = array(
		            'path' => DOCROOT.'uploads/tilemaps/'.$tilemap->mapname,
		            'ext_whitelist' => array('zip','rar'),
		            'max_size' => '1000M',
		            );


				  //while(Upload::get_files()){

                     Upload::process($config);

                        if (Upload::is_valid()) {
                                                                        
                                        Upload::save();

                                           $value = Upload::get_files();

                                           foreach($value as $files) {
                                               //print_r($files);
                                                $tilemap->source = $value[0]['saved_as'];
                                  
                                                $tilemap->save();
                                            }



				if ($tilemap and $tilemap->save())
				{
					Session::set_flash('success', e('Added tilemap #'.$tilemap->id.'.'));

					Response::redirect('admin/tilemaps');
				}

				else
				{
					Session::set_flash('error', e('Could not save tilemap.'));
				}
					}//end of if(Upload::is_valid())
				//}//end of while loop
			}//end of if($val->run())
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Tilemaps";
		$this->template->content = View::forge('admin\tilemaps/create');

	}

	public function action_edit($id = null)
	{
		$tilemap = Model_Tilemap::find($id);
		$val = Model_Tilemap::validate('edit');

		if ($val->run())
		{
			$tilemap->mapname = Input::post('mapname');
			$tilemap->source = Input::post('source');

			if ($tilemap->save())
			{
				Session::set_flash('success', e('Updated tilemap #' . $id));

				Response::redirect('admin/tilemaps');
			}

			else
			{
				Session::set_flash('error', e('Could not update tilemap #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$tilemap->mapname = $val->validated('mapname');
				$tilemap->source = $val->validated('source');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('tilemap', $tilemap, false);
		}

		$this->template->title = "Tilemaps";
		$this->template->content = View::forge('admin\tilemaps/edit');

	}

	public function action_delete($id = null)
	{
		if ($tilemap = Model_Tilemap::find($id))
		{
			$tilemap->delete();

			Session::set_flash('success', e('Deleted tilemap #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete tilemap #'.$id));
		}

		Response::redirect('admin/tilemaps');

	}


}