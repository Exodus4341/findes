<?php
class Controller_Admin_Voterater extends Controller_Admin 
{

	public function action_index()
	{
		$data['voteraters'] = Model_Voterater::find('all');
		$this->template->title = "Voteraters";
		$this->template->content = View::forge('admin\voterater/index', $data);

	}

	public function action_view($id = null)
	{
		$data['voterater'] = Model_Voterater::find($id);

		$this->template->title = "Voterater";
		$this->template->content = View::forge('admin\voterater/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Voterater::validate('create');

			if ($val->run())
			{
				$voterater = Model_Voterater::forge(array(
					'raters' => Input::post('raters'),
					'landmark_id' => Input::post('landmark_id'),
				));

				if ($voterater and $voterater->save())
				{
					Session::set_flash('success', e('Added voterater #'.$voterater->id.'.'));

					Response::redirect('admin/voterater');
				}

				else
				{
					Session::set_flash('error', e('Could not save voterater.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Voteraters";
		$this->template->content = View::forge('admin\voterater/create');

	}

	public function action_edit($id = null)
	{
		$voterater = Model_Voterater::find($id);
		$val = Model_Voterater::validate('edit');

		if ($val->run())
		{
			$voterater->raters = Input::post('raters');
			$voterater->landmark_id = Input::post('landmark_id');

			if ($voterater->save())
			{
				Session::set_flash('success', e('Updated voterater #' . $id));

				Response::redirect('admin/voterater');
			}

			else
			{
				Session::set_flash('error', e('Could not update voterater #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$voterater->raters = $val->validated('raters');
				$voterater->landmark_id = $val->validated('landmark_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('voterater', $voterater, false);
		}

		$this->template->title = "Voteraters";
		$this->template->content = View::forge('admin\voterater/edit');

	}

	public function action_delete($id = null)
	{
		if ($voterater = Model_Voterater::find($id))
		{
			$voterater->delete();

			Session::set_flash('success', e('Deleted voterater #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete voterater #'.$id));
		}

		Response::redirect('admin/voterater');

	}


}