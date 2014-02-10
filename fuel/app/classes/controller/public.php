<?php

class Controller_Public extends Controller_Base
{
	public $template = 'template';


	public function action_index()
	{
		$data['jeepneyroutes'] = Model_Jeepneyroute::find('all', array('limit' => 7, 'order_by' => array('created_at' => 'desc')));
		$data['tricycleroutes'] = Model_Tricycleroute::find('all', array('limit' => 7, 'order_by' => array('created_at' => 'desc')));
		$data['landmarks'] = Model_Landmark::find('all', array('limit' => 5, 'order_by' => array('created_at' => 'desc')));
		//$this->template->title = 'Dashboard';
		//$this->template->content = View::forge('dashboard',$data);
		return Response::forge(View::forge('dashboard',$data));
	}


	public function action_register()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

			if ($val->run())
			{
				$user = Model_User::forge(array(
					'username' => Input::post('username'),
					'password' => Auth::instance()->hash_password(Input::post('password')),
					'group' => 1,
					'email' => Input::post('email'),
					'profile_fields' => Input::post('profile_fields'),
					'active' => Input::post('active'),
					'type' => Input::post('type'),
					'last_login' => Input::post('last_login'),
					'login_hash' => Input::post('login_hash'),
				));

				if ($user and $user->save())
				{
					Session::set_flash('success', e('Successfuly registered, kindly login.'));

					Response::redirect('users/login');
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
		$this->template->content = View::forge('public\users/create');

	}

}
