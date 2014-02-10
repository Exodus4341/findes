<?php
class Controller_Users_Users extends Controller_Users 
{

	public function action_index()
	{
		$data['users'] = Model_User::find()->where('id', '=', $this->current_user->id)->get();
		$this->template->title = "Users";
		$this->template->content = View::forge('users\users/index', $data);

	}

	public function action_view()
	{
		$data['user'] = Model_User::find()->where('group', '=', 1)->get();

		$this->template->title = "User";
		$this->template->content = View::forge('users\users/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

			if ($val->run())
			{
				$user = Model_User::forge(array(
					'username' => Input::post('username'),
					'password' => Input::post('password'),
					'group' => Input::post('group'),
					'email' => Input::post('email'),
					'profile_fields' => Input::post('profile_fields'),
					'active' => Input::post('active'),
					'type' => Input::post('type'),
					'last_login' => Input::post('last_login'),
					'login_hash' => Input::post('login_hash'),
				));

				if ($user and $user->save())
				{
					Session::set_flash('success', e('Added user #'.$user->id.'.'));

					Response::redirect('users/users');
				}

				else
				{
					Session::set_flash('error', e('Could not save user.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('users\users/create');

	}

	public function action_edit($id = null)
	{
		$user = Model_User::find($id);
		$val = Model_User::validate('edit');

		if ($val->run())
		{
			$user->username = Input::post('username');
			$user->password = Input::post('password');
			$user->group = Input::post('group');
			$user->email = Input::post('email');
			$user->profile_fields = Input::post('profile_fields');
			$user->active = Input::post('active');
			$user->type = Input::post('type');
			$user->last_login = Input::post('last_login');
			$user->login_hash = Input::post('login_hash');

			if ($user->save())
			{
				Session::set_flash('success', e('Updated user #' . $id));

				Response::redirect('users/users');
			}

			else
			{
				Session::set_flash('error', e('Could not update user #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user->username = $val->validated('username');
				$user->password = $val->validated('password');
				$user->group = $val->validated('group');
				$user->email = $val->validated('email');
				$user->profile_fields = $val->validated('profile_fields');
				$user->active = $val->validated('active');
				$user->type = $val->validated('type');
				$user->last_login = $val->validated('last_login');
				$user->login_hash = $val->validated('login_hash');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('users\users/edit');

	}

	public function action_delete($id = null)
	{
		if ($user = Model_User::find($id))
		{
			$user->delete();

			Session::set_flash('success', e('Deleted user #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete user #'.$id));
		}

		Response::redirect('users/users');

	}


}