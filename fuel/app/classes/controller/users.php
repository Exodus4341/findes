<?php

class Controller_Users extends Controller_Base
{
	public $template = 'users/template';

	public function before()
	{
		parent::before();

		if (Request::active()->controller !== 'Controller_Users' or ! in_array(Request::active()->action, array('login', 'logout')))
		{
			if (Auth::check())
			{
				if ( ! Auth::member(1 && 100))
				{
					Session::set_flash('error', e('You don\'t have access to the users panel'));
					Response::redirect('/');
				}
			}
			else
			{
				Response::redirect('users/login');
			}
		}
	}

	public function action_login()
	{
		// Already logged in
		Auth::check() and Response::redirect('users');

		$val = Validation::forge();

		if (Input::method() == 'POST')
		{
			$val->add('email', 'Email or Username')
			    ->add_rule('required');
			$val->add('password', 'Password')
			    ->add_rule('required');

			if ($val->run())
			{
				$auth = Auth::instance();

				// check the credentials. This assumes that you have the previous table created
				if (Auth::check() or $auth->login(Input::post('email'), Input::post('password')))
				{
					// credentials ok, go right in
					$current_user = Model_User::find_by_username(Auth::get_screen_name());
					Session::set_flash('success', e('Welcome, '.$current_user->username));
					if(Auth::member(1)){
						Response::redirect('users');
					}
					if(Auth::member(100)){
						Response::redirect('admin');
					}
				}
				else
				{
					$this->template->set_global('login_error', 'Invalid Username or Password');
				}
			}
		}

		$this->template->title = 'Login';
		$this->template->content = View::forge('users/login', array('val' => $val), false);
	}

	/**
	 * The logout action.
	 *
	 * @access  public
	 * @return  void
	 */
	public function action_logout()
	{
		Auth::logout();
		Response::redirect('public');
	}

	/**
	 * The index action.
	 *
	 * @access  public
	 * @return  void
	 */
	public function action_index()
	{
		$data['jeepneyroutes'] = Model_Jeepneyroute::find('all', array('limit' => 7, 'order_by' => array('created_at' => 'desc')));
		$data['tricycleroutes'] = Model_Tricycleroute::find('all', array('limit' => 7, 'order_by' => array('created_at' => 'desc')));
		$data['landmarks'] = Model_Landmark::find('all', array('limit' => 5, 'order_by' => array('created_at' => 'desc')));
		$this->template->title = 'Dashboard';
		if(Auth::member(1)){
			$this->template->content = View::forge('users/dashboard',$data);
		}

		if(Auth::member(100)){
			$this->template->content = View::forge('admin/dashboard',$data);
		}
		
	}

}

/* End of file admin.php */
