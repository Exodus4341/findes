<?php
class Controller_Admin_Comments extends Controller_Admin 
{

	public function action_index()
	{
		$data['comments'] = Model_Comment::find('all', array('order_by' => array('created_at' => 'desc')));
		$view = View::forge('admin\comments/index', $data);

		$view->set_global('landmarks', Arr::assoc_to_keyval(Model_Landmark::find('all'), 'id', 'placename'));

		$this->template->title = "Comments";
		$this->template->content = $view;

	}

	public function action_view($id = null)
	{
		$data['comment'] = Model_Comment::find($id);

		$this->template->title = "Comment";
		$this->template->content = View::forge('admin\comments/view', $data);

	}

	public function action_create()
	{
		$view = View::forge('admin\comments/create');

		if (Input::method() == 'POST')
		{
			$val = Model_Comment::validate('create');

			if ($val->run())
			{
				$comment = Model_Comment::forge(array(
					'name' => $this->current_user->username,
					'email' => $this->current_user->email,
					'message' => Input::post('message'),
					'landmark_id' => Input::post('landmark_id'),
				));

				if ($comment and $comment->save())
				{
					Session::set_flash('success', e('Added comment #'.$comment->id.'.'));

					Response::redirect('admin/comments');
				}

				else
				{
					Session::set_flash('error', e('Could not save comment.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$view->set_global('landmarks', Arr::assoc_to_keyval(Model_Landmark::find('all'), 'id', 'placename'));

		$this->template->title = "Comments";
		$this->template->content = $view;

	}

	public function action_edit($id = null)
	{
		$view = View::forge('admin\comments/edit');

		$comment = Model_Comment::find($id);
		$val = Model_Comment::validate('edit');

		if ($val->run())
		{
			$comment->name = Input::post('name');
			$comment->email = Input::post('email');
			$comment->message = Input::post('message');
			$comment->landmark_id = Input::post('landmark_id');

			if ($comment->save())
			{
				Session::set_flash('success', e('Updated comment #' . $id));

				Response::redirect('admin/comments');
			}

			else
			{
				Session::set_flash('error', e('Could not update comment #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$comment->name = $val->validated('name');
				$comment->email = $val->validated('email');
				$comment->message = $val->validated('message');
				$comment->landmark_id = $val->validated('landmark_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('comment', $comment, false);
		}

		$view->set_global('landmarks', Arr::assoc_to_keyval(Model_Landmark::find('all'), 'id', 'placename'));

		$this->template->title = "Comments";
		$this->template->content = $view;

	}

	public function action_delete($id = null)
	{
		if ($comment = Model_Comment::find($id))
		{
			$comment->delete();

			Session::set_flash('success', e('Deleted comment #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete comment #'.$id));
		}

		Response::redirect('admin/comments');

	}


}