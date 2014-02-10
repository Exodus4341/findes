<?php
class Controller_Admin_Voteitems extends Controller_Admin 
{

	public function action_index()
	{
		$data['voteitems'] = Model_Voteitem::find('all');
		$this->template->title = "Voteitems";
		$this->template->content = View::forge('admin\voteitems/index', $data);

	}

	public function action_view($id = null)
	{
		$data['voteitem'] = Model_Voteitem::find($id);

		$this->template->title = "Voteitem";
		$this->template->content = View::forge('admin\voteitems/view', $data);

	}

	public function action_create()
	{
		$view = View::forge('admin\voteitems/create');

		if (Input::method() == 'POST')
		{
			$val = Model_Voteitem::validate('create');

			if ($val->run())
			{

				$ip = $_SERVER['REMOTE_ADDR'];
				$ip1 = '192.168.101.1';

				$result = DB::query("SELECT !COUNT(*) FROM `voteraters` WHERE `raters` = '$ip' AND `landmark_id` = 1")->execute();

				if ($result[0]['!COUNT(*)'] == true){

				$voteitem = Model_Voteitem::forge(array(
					'landmark_id' => Input::post('landmark_id'),
					'votes' => Input::post('votes'),
					'nrates' => Input::post('nrates'),
				));


				 if(@$_POST['submit']){

				   	$insert = DB::query("INSERT INTO `voteitems` (`id`,`landmark_id`,`votes`) VALUES('$voteitem->landmark_id','$voteitem->landmark_id','$voteitem->votes') ON DUPLICATE KEY UPDATE `votes`=`votes`+'$voteitem->votes', `nrates`=`nrates`+ 1")->execute();
					 
					$query = DB::query("INSERT INTO `voteraters`(`raters`, `landmark_id`) VALUES('$ip','$voteitem->landmark_id')")->execute();

					if ($voteitem){
					Session::set_flash('success', e('Added voteitem '.$voteitem->landmark->placename.'.'));

					Response::redirect('admin/voteitems');
					}	

				   }	

					
				}


				else
				{
					Session::set_flash('error', e('Could not save voteitem.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$view->set_global('landmarks', Arr::assoc_to_keyval(Model_Landmark::find('all'), 'id', 'placename'));


		$this->template->title = "Voteitems";
		$this->template->content = $view;

	}

	public function action_edit($id = null)
	{
		$view = View::forge('admin\voteitems/edit');

		$voteitem = Model_Voteitem::find($id);
		$val = Model_Voteitem::validate('edit');

		if ($val->run())
		{
			$voteitem->landmark_id = Input::post('landmark_id');
			$voteitem->votes = Input::post('votes');
			$voteitem->nrates = Input::post('nrates');

			if ($voteitem->save())
			{
				Session::set_flash('success', e('Updated voteitem #' . $id));

				Response::redirect('admin/voteitems');
			}

			else
			{
				Session::set_flash('error', e('Could not update voteitem #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$voteitem->landmark_id = $val->validated('landmark_id');
				$voteitem->votes = $val->validated('votes');
				$voteitem->nrates = $val->validated('nrates');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('voteitem', $voteitem, false);
		}

		$view->set_global('landmarks', Arr::assoc_to_keyval(Model_Landmark::find('all'), 'id', 'placename'));

		$this->template->title = "Voteitems";
		$this->template->content = $view;
	}

	public function action_delete($id = null)
	{
		if ($voteitem = Model_Voteitem::find($id))
		{
			$voteitem->delete();

			Session::set_flash('success', e('Deleted voteitem #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete voteitem #'.$id));
		}

		Response::redirect('admin/voteitems');

	}


}