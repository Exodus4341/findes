<?php
class Controller_Landmarks extends Controller_Base{

	public function action_index()
	{
		$data['landmarks'] = Model_Landmark::find('all');
		$this->template->title = "Landmarks";
		$this->template->content = View::forge('landmarks/index', $data);

	}

	public function action_view($slug = null)
	{
		

		$landmark = Model_Landmark::find_by_slug($slug, array('related' => array('user', 'comments')));

		is_null($slug) and Response::redirect('landmarks');

		if ( ! $data['landmark'] = $landmark)
		{
			Session::set_flash('error', 'Could not find landmark #'.$slug);
			Response::redirect('landmarks');
		}
		$view = View::forge('landmarks/view', $data,  array('landmark' => $landmark));
		$this->template->title = "Landmark";
		$this->template->content = $view;

	}



	public function action_comment($slug)
	{
	   $landmark = Model_Landmark::find_by_slug($slug);
	    
	   // Lazy validation
	    if (Input::post('name') AND Input::post('email') AND Input::post('message'))
	   {
	   	  if(Auth::member(1 && 100)){
	   	  	 // Create a new comment
	     	 $landmark->comments[] = new Model_Comment(array(
	         'name' => $this->current_user->username,
	         'email' => $this->current_user->email,
	         'message' => Input::post('message'),
	         'user_id' => $this->current_user->id,
	      ));
	   	  }else{
	   	  	// Create a new comment
	     	 $landmark->comments[] = new Model_Comment(array(
	         'name' => Input::post('name'),
	         'email' => Input::post('email'),
	         'message' => Input::post('message'),
	         // 'user_id' => $this->current_user->id,
	      ));
	   	  }
	     
	       
	      // Save the post and the comment will save too
	      if ($landmark->save())
	      {
	         $comment = end($landmark->comments);
	         Session::set_flash('success', 'Added comment #'.$comment->id.'.');
	      }
	      else
	      {
	         Session::set_flash('error', 'Could not save comment.');
	      }
	       
	      Response::redirect('landmarks/view/'.$slug);
	   }

	    
	   // Did not have all the fields
	   else
	   {
	      // Just show the view again until they get it right
	      $this->action_view($slug);
	   }
	}



public function action_vote($slug){

		$landmark = Model_Landmark::find_by_slug($slug);
	    
	   if (Input::method() == 'POST')
		{
				
				$ip = $_SERVER['REMOTE_ADDR'];
				$ip1 = '192.168.101.1';

				

				$result = DB::query("SELECT !COUNT(*) FROM `voteraters` WHERE `raters` ='$ip1' AND `landmark_id` = '$landmark->id'", DB::SELECT)->execute();

				if ($result[0]['!COUNT(*)'] == true){


				$voteitem = Model_Voteitem::forge(array(
					'landmark_id' => $landmark->id,
					'votes' => Input::post('votes'),
					'nrates' => Input::post('nrates'),
				));


				if(@$_POST['submit']){

				   	$insert = DB::query("INSERT INTO `voteitems` (`id`,`landmark_id`,`votes`) VALUES('$voteitem->landmark_id','$voteitem->landmark_id','$voteitem->votes') ON DUPLICATE KEY UPDATE `votes`=`votes`+'$voteitem->votes', `nrates`=`nrates`+ 1")->execute();
					 
					$query = DB::query("INSERT INTO `voteraters`(`raters`, `landmark_id`) VALUES('$ip','$voteitem->landmark_id')")->execute();

						if ($landmark)
					      {
					         Session::set_flash('success', 'Added Vote # '.$voteitem->landmark->placename.'.');
					      }
				      
  				}

			}else
				{
					Session::set_flash('error', 'Sorry you have already vote this landmark.');
				}

			
			$this->template->title = "Landmark";
			$this->template->content = Response::redirect('landmarks/view/'.$slug);	       
	      	
	   }

	    
	   // Did not have all the fields
	   else
	   {
	      // Just show the view again until they get it right
	      $this->action_view($slug);
	   }
	
	}


}
