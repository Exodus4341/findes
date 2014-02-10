<?php
class Controller_Admin_Directions extends Controller_Admin 
{

	public function action_index()
	{
		$data['directions'] = Model_Direction::find('all');
		$this->template->title = "Directions";
		$this->template->content = View::forge('admin\directions/index', $data);

	}

	public function action_view($id = null)
	{
		$data['direction'] = Model_Direction::find($id);

		$this->template->title = "Direction";
		$this->template->content = View::forge('admin\directions/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Direction::validate('create');

			if ($val->run())
			{
				$direction = Model_Direction::forge(array(
					'directionname' => Input::post('directionname'),
					'jeepneyprefix' => Input::post('jeepneyprefix'),
					'tricycleprefix' => Input::post('tricycleprefix'),
					'midfix' => Input::post('midfix'),
					'postfix' => Input::post('postfix'),
				));

				if ($direction and $direction->save())
				{
					Session::set_flash('success', e('Added direction #'.$direction->id.'.'));

					Response::redirect('admin/directions');
				}

				else
				{
					Session::set_flash('error', e('Could not save direction.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Directions";
		$this->template->content = View::forge('admin\directions/create');

	}

	public function action_edit($id = null)
	{
		$direction = Model_Direction::find($id);
		$val = Model_Direction::validate('edit');

		if ($val->run())
		{
			$direction->directionname = Input::post('directionname');
			$direction->jeepneyprefix = Input::post('jeepneyprefix');
			$direction->tricycleprefix = Input::post('tricycleprefix');
			$direction->midfix = Input::post('midfix');
			$direction->postfix = Input::post('postfix');

			if ($direction->save())
			{
				Session::set_flash('success', e('Updated direction #' . $id));

				Response::redirect('admin/directions');
			}

			else
			{
				Session::set_flash('error', e('Could not update direction #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$direction->directionname = $val->validated('directionname');
				$direction->jeepneyprefix = $val->validated('jeepneyprefix');
				$direction->tricycleprefix = $val->validated('tricycleprefix');
				$direction->midfix = $val->validated('midfix');
				$direction->postfix = $val->validated('postfix');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('direction', $direction, false);
		}

		$this->template->title = "Directions";
		$this->template->content = View::forge('admin\directions/edit');

	}

	public function action_delete($id = null)
	{
		if ($direction = Model_Direction::find($id))
		{
			$direction->delete();

			Session::set_flash('success', e('Deleted direction #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete direction #'.$id));
		}

		Response::redirect('admin/directions');

	}


}