<?php
class Controller_Users_Tricycleroute extends Controller_Users{

	public function action_index()
	{
		$data['tricycleroutes'] = Model_Tricycleroute::find('all');
		$this->template->title = "Tricycleroutes";
		$this->template->content = View::forge('users/tricycleroute/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('users/tricycleroute');

		if ( ! $data['tricycleroute'] = Model_Tricycleroute::find($id))
		{
			Session::set_flash('error', 'Could not find tricycleroute #'.$id);
			Response::redirect('users/tricycleroute');
		}

		$this->template->title = "Tricycleroute";
		$this->template->content = View::forge('users/tricycleroute/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Tricycleroute::validate('create');
			
			if ($val->run())
			{
				$tricycleroute = Model_Tricycleroute::forge(array(
					'filename' => Input::post('filename'),
					'size' => Input::post('size'),
					'type' => Input::post('type'),
					'fileurl' => Input::post('fileurl'),
				));

				if ($tricycleroute and $tricycleroute->save())
				{
					Session::set_flash('success', 'Added tricycleroute #'.$tricycleroute->id.'.');

					Response::redirect('users/tricycleroute');
				}

				else
				{
					Session::set_flash('error', 'Could not save tricycleroute.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Tricycleroutes";
		$this->template->content = View::forge('users/tricycleroute/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('users/tricycleroute');

		if ( ! $tricycleroute = Model_Tricycleroute::find($id))
		{
			Session::set_flash('error', 'Could not find tricycleroute #'.$id);
			Response::redirect('users/tricycleroute');
		}

		$val = Model_Tricycleroute::validate('edit');

		if ($val->run())
		{
			$tricycleroute->filename = Input::post('filename');
			$tricycleroute->size = Input::post('size');
			$tricycleroute->type = Input::post('type');
			$tricycleroute->fileurl = Input::post('fileurl');

			if ($tricycleroute->save())
			{
				Session::set_flash('success', 'Updated tricycleroute #' . $id);

				Response::redirect('users/tricycleroute');
			}

			else
			{
				Session::set_flash('error', 'Could not update tricycleroute #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$tricycleroute->filename = $val->validated('filename');
				$tricycleroute->size = $val->validated('size');
				$tricycleroute->type = $val->validated('type');
				$tricycleroute->fileurl = $val->validated('fileurl');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('tricycleroute', $tricycleroute, false);
		}

		$this->template->title = "Tricycleroutes";
		$this->template->content = View::forge('users/tricycleroute/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('users/tricycleroute');

		if ($tricycleroute = Model_Tricycleroute::find($id))
		{
			$tricycleroute->delete();

			Session::set_flash('success', 'Deleted tricycleroute #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete tricycleroute #'.$id);
		}

		Response::redirect('users/tricycleroute');

	}


}
