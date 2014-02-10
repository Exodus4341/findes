<?php
class Controller_Users_Jeepneyroute extends Controller_Users{

	public function action_index()
	{
		$data['jeepneyroutes'] = Model_Jeepneyroute::find('all');
		$this->template->title = "Jeepneyroutes";
		$this->template->content = View::forge('users/jeepneyroute/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('jeepneyroute');

		if ( ! $data['jeepneyroute'] = Model_Jeepneyroute::find($id))
		{
			Session::set_flash('error', 'Could not find jeepneyroute #'.$id);
			Response::redirect('users/jeepneyroute');
		}

		$this->template->title = "Jeepneyroute";
		$this->template->content = View::forge('users/jeepneyroute/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Jeepneyroute::validate('create');
			
			if ($val->run())
			{
				$jeepneyroute = Model_Jeepneyroute::forge(array(
					'filename' => Input::post('filename'),
					'size' => Input::post('size'),
					'type' => Input::post('type'),
					'fileurl' => Input::post('fileurl'),
				));

				if ($jeepneyroute and $jeepneyroute->save())
				{
					Session::set_flash('success', 'Added jeepneyroute #'.$jeepneyroute->id.'.');

					Response::redirect('users/jeepneyroute');
				}

				else
				{
					Session::set_flash('error', 'Could not save jeepneyroute.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Jeepneyroutes";
		$this->template->content = View::forge('users/jeepneyroute/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('users/jeepneyroute');

		if ( ! $jeepneyroute = Model_Jeepneyroute::find($id))
		{
			Session::set_flash('error', 'Could not find jeepneyroute #'.$id);
			Response::redirect('users/jeepneyroute');
		}

		$val = Model_Jeepneyroute::validate('edit');

		if ($val->run())
		{
			$jeepneyroute->filename = Input::post('filename');
			$jeepneyroute->size = Input::post('size');
			$jeepneyroute->type = Input::post('type');
			$jeepneyroute->fileurl = Input::post('fileurl');

			if ($jeepneyroute->save())
			{
				Session::set_flash('success', 'Updated jeepneyroute #' . $id);

				Response::redirect('users/jeepneyroute');
			}

			else
			{
				Session::set_flash('error', 'Could not update jeepneyroute #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$jeepneyroute->filename = $val->validated('filename');
				$jeepneyroute->size = $val->validated('size');
				$jeepneyroute->type = $val->validated('type');
				$jeepneyroute->fileurl = $val->validated('fileurl');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('jeepneyroute', $jeepneyroute, false);
		}

		$this->template->title = "Jeepneyroutes";
		$this->template->content = View::forge('users/jeepneyroute/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('users/jeepneyroute');

		if ($jeepneyroute = Model_Jeepneyroute::find($id))
		{
			$jeepneyroute->delete();

			Session::set_flash('success', 'Deleted jeepneyroute #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete jeepneyroute #'.$id);
		}

		Response::redirect('users/jeepneyroute');

	}


}
