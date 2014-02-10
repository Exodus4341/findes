<?php
class Controller_Admin_Roadlocation extends Controller_Admin 
{

	public function action_index()
	{
		$data['roadlocations'] = Model_Roadlocation::find('all', array('group_by' => 'id'));

		$view = View::forge('admin\roadlocation/index', $data);



		$view->set_global('landmarkname', Arr::assoc_to_keyval(Model_Landmark::find('all'),'id','placename'));
		
		$this->template->title = "Roadlocations";
		$this->template->content = $view;

	}

	public function action_view($id = null)
	{
		$data['roadlocation'] = Model_Roadlocation::find($id);

		$view = View::forge('admin\roadlocation/view', $data);

		$this->template->title = "Roadlocation";
		$this->template->content = $view;
	}

	public function action_create()
	{
		$view = View::forge('admin\roadlocation/create');

		if (Input::method() == 'POST')
		{
			$val = Model_Roadlocation::validate('create');

			if ($val->run())
			{
				$roadlocation = Model_Roadlocation::forge(array(
					'lat' => Input::post('lat'),
					'lon' => Input::post('lon'),
					'landmark_id' => Input::post('landmark_id'),
				));

				$curr_date = date("Y-m-d H:i:s");

				$update_landmark = DB::query("UPDATE `landmarks` SET `updated_at` = '$curr_date' WHERE `id` = '$roadlocation->landmark_id'")->execute();

				if ($roadlocation and $roadlocation->save())
				{
					Session::set_flash('success', e('Added roadlocation #'.$roadlocation->id.'.'));

					Response::redirect('admin/roadlocation');
				}

				else
				{
					Session::set_flash('error', e('Could not save roadlocation.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$view->set_global('landmarkname', Arr::assoc_to_keyval(Model_Landmark::find('all'),'id','placename'));

		$this->template->title = "Roadlocations";
		$this->template->content = $view;

	}

	public function action_edit($id = null)
	{
		$view = View::forge('admin\roadlocation/edit');

		$roadlocation = Model_Roadlocation::find($id);
		$val = Model_Roadlocation::validate('edit');

		if ($val->run())
		{
			$roadlocation->lat = Input::post('lat');
			$roadlocation->lon = Input::post('lon');
			$roadlocation->landmark_id = Input::post('landmark_id');

			$curr_date = date("Y-m-d H:i:s");

			$update_landmark = DB::query("UPDATE `landmarks` SET `updated_at` = '$curr_date' WHERE `id` = '$roadlocation->landmark_id'")->execute();

			if ($roadlocation->save())
			{
				Session::set_flash('success', e('Updated roadlocation #' . $id));

				Response::redirect('admin/roadlocation');
			}

			else
			{
				Session::set_flash('error', e('Could not update roadlocation #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$roadlocation->lat = $val->validated('lat');
				$roadlocation->lon = $val->validated('lon');
				$roadlocation->landmark_id = $val->validated('landmark_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('roadlocation', $roadlocation, false);
		}

		$view->set_global('landmarkname', Arr::assoc_to_keyval(Model_Landmark::find('all'),'id','placename'));

		$this->template->title = "Roadlocations";
		$this->template->content = $view;

	}

	public function action_delete($id = null)
	{
		if ($roadlocation = Model_Roadlocation::find($id))
		{
			$roadlocation->delete();

			Session::set_flash('success', e('Deleted roadlocation #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete roadlocation #'.$id));
		}

		Response::redirect('admin/roadlocation');

	}


}