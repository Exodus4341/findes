<?php
class Controller_Admin_Landmarkcategories extends Controller_Admin 
{

	public function action_index()
	{
		$data['landmarkcategories'] = Model_Landmarkcategory::find('all');
		$this->template->title = "Landmarkcategories";
		$this->template->content = View::forge('admin\landmarkcategories/index', $data);

	}

	public function action_view($id = null)
	{
		$data['landmarkcategory'] = Model_Landmarkcategory::find($id);

		$this->template->title = "Landmarkcategory";
		$this->template->content = View::forge('admin\landmarkcategories/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Landmarkcategory::validate('create');

			if ($val->run())
			{
				$landmarkcategory = Model_Landmarkcategory::forge(array(
					'categories' => Input::post('categories'),
					'category_icon' => Input::post('category_icon'),
					'pid' => Input::post('pid'),
				));

				if ($landmarkcategory and $landmarkcategory->save())
				{
					Session::set_flash('success', e('Added landmarkcategory #'.$landmarkcategory->id.'.'));

					Response::redirect('admin/landmarkcategories');
				}

				else
				{
					Session::set_flash('error', e('Could not save landmarkcategory.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Landmarkcategories";
		$this->template->content = View::forge('admin\landmarkcategories/create');

	}

	public function action_edit($id = null)
	{
		$landmarkcategory = Model_Landmarkcategory::find($id);
		$val = Model_Landmarkcategory::validate('edit');

		if ($val->run())
		{
			$landmarkcategory->categories = Input::post('categories');
			$landmarkcategory->category_icon = Input::post('category_icon');
			$landmarkcategory->pid = Input::post('pid');

			if ($landmarkcategory->save())
			{
				Session::set_flash('success', e('Updated landmarkcategory #' . $id));

				Response::redirect('admin/landmarkcategories');
			}

			else
			{
				Session::set_flash('error', e('Could not update landmarkcategory #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$landmarkcategory->categories = $val->validated('categories');
				$landmarkcategory->category_icon = $val->validated('category_icon');
				$landmarkcategory->pid = $val->validated('pid');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('landmarkcategory', $landmarkcategory, false);
		}

		$this->template->title = "Landmarkcategories";
		$this->template->content = View::forge('admin\landmarkcategories/edit');

	}

	public function action_delete($id = null)
	{
		if ($landmarkcategory = Model_Landmarkcategory::find($id))
		{
			$landmarkcategory->delete();

			Session::set_flash('success', e('Deleted landmarkcategory #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete landmarkcategory #'.$id));
		}

		Response::redirect('admin/landmarkcategories');

	}


}