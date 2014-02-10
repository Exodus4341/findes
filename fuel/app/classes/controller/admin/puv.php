<?php
class Controller_Admin_Puv extends Controller_Admin 
{

	public function action_index()
	{
		$data['puvs'] = Model_Puv::find('all');

		$view = View::forge('admin\puv/index', $data);

		$view->set_global('puvtypes', Arr::assoc_to_keyval(Model_Puvtype::find('all'), 'id', 'name'));

		$this->template->title = "Puvs";
		$this->template->content = $view;

	}

	public function action_view($id = null)
	{
		$data['puv'] = Model_Puv::find($id);

		$view = View::forge('admin\puv/view', $data);

		$view->set_global('puvtypes', Arr::assoc_to_keyval(Model_Puvtype::find('all'), 'id', 'name'));

		$this->template->title = "Puv";
		$this->template->content = $view;

	}

	public function action_create()
	{
		$view = View::forge('admin\puv/create');

		if (Input::method() == 'POST')
		{
			$val = Model_Puv::validate('create');

			if ($val->run())
			{
				$puv = Model_Puv::forge(array(
					'puv_id' => Input::post('puv_id'),
					'faretype' => Input::post('faretype'),
					'initsucc' => Input::post('initsucc'),
					'succfare' => Input::post('succfare'),
					'initdis' => Input::post('initdis'),
					'succdis' => Input::post('succdis'),
				));

				if ($puv and $puv->save())
				{
					Session::set_flash('success', e('Added puv #'.$puv->id.'.'));

					Response::redirect('admin/puv');
				}

				else
				{
					Session::set_flash('error', e('Could not save puv.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$view->set_global('puvtypes', Arr::assoc_to_keyval(Model_Puvtype::find('all'), 'id', 'name'));

		$this->template->title = "Puvs";
		$this->template->content = $view;

	}

	public function action_edit($id = null)
	{
		$view = View::forge('admin\puv/edit');

		$puv = Model_Puv::find($id);
		$val = Model_Puv::validate('edit');

		if ($val->run())
		{
			$puv->puv_id = Input::post('puv_id');
			$puv->faretype = Input::post('faretype');
			$puv->initsucc = Input::post('initsucc');
			$puv->succfare = Input::post('succfare');
			$puv->initdis = Input::post('initdis');
			$puv->succdis = Input::post('succdis');

			if ($puv->save())
			{
				Session::set_flash('success', e('Updated puv #' . $id));

				Response::redirect('admin/puv');
			}

			else
			{
				Session::set_flash('error', e('Could not update puv #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$puv->puv_id = $val->validated('puv_id');
				$puv->faretype = $val->validated('faretype');
				$puv->initsucc = $val->validated('initsucc');
				$puv->succfare = $val->validated('succfare');
				$puv->initdis = $val->validated('initdis');
				$puv->succdis = $val->validated('succdis');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('puv', $puv, false);
		}

		$view->set_global('puvtypes', Arr::assoc_to_keyval(Model_Puvtype::find('all'), 'id', 'name'));

		$this->template->title = "Puvs";
		$this->template->content = $view;

	}

	public function action_delete($id = null)
	{
		if ($puv = Model_Puv::find($id))
		{
			$puv->delete();

			Session::set_flash('success', e('Deleted puv #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete puv #'.$id));
		}

		Response::redirect('admin/puv');

	}


}