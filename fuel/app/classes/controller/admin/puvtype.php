<?php
class Controller_Admin_Puvtype extends Controller_Admin 
{

	public function action_index()
	{
		$data['puvtypes'] = Model_Puvtype::find('all');
		$this->template->title = "Puvtypes";
		$this->template->content = View::forge('admin\puvtype/index', $data);

	}

	public function action_view($id = null)
	{
		$data['puvtype'] = Model_Puvtype::find($id);

		$this->template->title = "Puvtype";
		$this->template->content = View::forge('admin\puvtype/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Puvtype::validate('create');

			if ($val->run())
			{
				$puvtype = Model_Puvtype::forge(array(
					'name' => Input::post('name'),
					'icon_url' => Input::post('icon_url'),
				));

				if ($puvtype and $puvtype->save())
				{
					Session::set_flash('success', e('Added puvtype #'.$puvtype->id.'.'));

					Response::redirect('admin/puvtype');
				}

				else
				{
					Session::set_flash('error', e('Could not save puvtype.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Puvtypes";
		$this->template->content = View::forge('admin\puvtype/create');

	}

	public function action_edit($id = null)
	{
		$puvtype = Model_Puvtype::find($id);
		$val = Model_Puvtype::validate('edit');

		if ($val->run())
		{
			$puvtype->name = Input::post('name');
			$puvtype->icon_url = Input::post('icon_url');

			if ($puvtype->save())
			{
				Session::set_flash('success', e('Updated puvtype #' . $id));

				Response::redirect('admin/puvtype');
			}

			else
			{
				Session::set_flash('error', e('Could not update puvtype #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$puvtype->name = $val->validated('name');
				$puvtype->icon_url = $val->validated('icon_url');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('puvtype', $puvtype, false);
		}

		$this->template->title = "Puvtypes";
		$this->template->content = View::forge('admin\puvtype/edit');

	}

	public function action_delete($id = null)
	{
		if ($puvtype = Model_Puvtype::find($id))
		{
			$puvtype->delete();

			Session::set_flash('success', e('Deleted puvtype #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete puvtype #'.$id));
		}

		Response::redirect('admin/puvtype');

	}


}