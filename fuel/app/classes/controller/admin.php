<?php

class Controller_Admin extends Controller_Base
{
	public $template = 'admin/template';

	public function before()
	{
		parent::before();

		if (Request::active()->controller !== 'Controller_Admin' or ! in_array(Request::active()->action, array('login', 'logout')))
		{
			if (Auth::check())
			{
				if ( ! Auth::member(100))
				{
					Session::set_flash('error', e('You don\'t have access to the admin panel'));
					Response::redirect('/');
				}
			}
			else
			{
				Response::redirect('admin/login');
			}
		}
	}

	public function action_login()
	{
		// Already logged in
		Auth::check() and Response::redirect('admin');

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
					Response::redirect('admin');
				}
				else
				{
					$this->template->set_global('login_error', 'Fail');
				}
			}
		}

		$this->template->title = 'Login';
		$this->template->content = View::forge('admin/login', array('val' => $val), false);
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
		Response::redirect('admin');
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
		$this->template->content = View::forge('admin/dashboard',$data);
	}

}

/* End of file admin.php */
