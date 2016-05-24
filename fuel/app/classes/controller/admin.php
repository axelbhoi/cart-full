<?php

	class Controller_Admin extends Controller{

	    public function before()
	    {
	    	//check if user is logged in

	    	if(Session::get('login') == 1 &&  Session::get('type') == 0)
	    	{
	    		Response::redirect(Uri::base().'home', 'refresh');
	    	}

	    	if(Session::get('login') == 1 && Session::get('type')== 1)
	    	{
	    		Response::redirect(Uri::base().'dashboard', 'refresh');
	    	}
	    }	

		public function action_index()
		{
		    $data['message'] = "";

		    // If so, you pressed the submit button. Let's go over the steps.
		    if (Input::post())
		    {
		    	$entry = Model_Users::query()->where('username', Input::post('username'))->where('password', Input::post('password'))->where('user_type',1)->get();

				if($entry)
				{
			    	foreach($entry as $row)
			    	{
			    		$id =  $row['id'];
			    	}

					//echo "a";
					//set up the session here.
					Session::set(
						array(
							'login'		=> 1,
							'type'		=> 1,
							'username'	=> Input::post('username'),
							'account_id'	=> $id
						)
					);

					//redirect to cart page.
					Response::redirect(Uri::base().'dashboard', 'refresh');
				}	    	
				else
				{
					$data['message'] = "Username or Password is Invalid.";
				}
		    }

		    // Show the login form.

			return View::forge('admin/index', $data);
		}
	}