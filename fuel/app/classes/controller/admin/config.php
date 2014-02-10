<?php
class Controller_Admin_Config extends Controller_Admin 
{

	public function action_index()
	{
		$data['configs'] = Model_Config::find('all');
		$this->template->title = "Configs";
		$this->template->content = View::forge('admin\config/index', $data);

	}

	public function action_view($id = null)
	{
		$data['config'] = Model_Config::find($id);

		$this->template->title = "Config";
		$this->template->content = View::forge('admin\config/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Config::validate('create');

			if ($val->run())
			{
				$config = Model_Config::forge(array(
					'default_currency' => Input::post('default_currency'),
					'jeepney_maxspeed' => Input::post('jeepney_maxspeed'),
					'jeepney_minspeed' => Input::post('jeepney_minspeed'),
					'tricycle_maxspeed' => Input::post('tricycle_maxspeed'),
					'tricycle_minspeed' => Input::post('tricycle_minspeed'),
					'route_tolerance' => Input::post('route_tolerance'),
				));

				if ($config and $config->save())
				{
					Session::set_flash('success', e('Added config #'.$config->id.'.'));

					Response::redirect('admin/config');
				}

				else
				{
					Session::set_flash('error', e('Could not save config.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Configs";
		$this->template->content = View::forge('admin\config/create');

	}

	public function action_edit($id = null)
	{
		$config = Model_Config::find($id);
		$val = Model_Config::validate('edit');

		if ($val->run())
		{
			$config->default_currency = Input::post('default_currency');
			$config->jeepney_maxspeed = Input::post('jeepney_maxspeed');
			$config->jeepney_minspeed = Input::post('jeepney_minspeed');
			$config->tricycle_maxspeed = Input::post('tricycle_maxspeed');
			$config->tricycle_minspeed = Input::post('tricycle_minspeed');
			$config->route_tolerance = Input::post('route_tolerance');

			if ($config->save())
			{
				Session::set_flash('success', e('Updated config #' . $id));

				Response::redirect('admin/config');
			}

			else
			{
				Session::set_flash('error', e('Could not update config #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$config->default_currency = $val->validated('default_currency');
				$config->jeepney_maxspeed = $val->validated('jeepney_maxspeed');
				$config->jeepney_minspeed = $val->validated('jeepney_minspeed');
				$config->tricycle_maxspeed = $val->validated('tricycle_maxspeed');
				$config->tricycle_minspeed = $val->validated('tricycle_minspeed');
				$config->route_tolerance = $val->validated('route_tolerance');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('config', $config, false);
		}

		$this->template->title = "Configs";
		$this->template->content = View::forge('admin\config/edit');

	}

	public function action_delete($id = null)
	{
		if ($config = Model_Config::find($id))
		{
			$config->delete();

			Session::set_flash('success', e('Deleted config #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete config #'.$id));
		}

		Response::redirect('admin/config');

	}


}