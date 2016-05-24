<?php

	class Controller_Register extends Controller{
		
		public function action_index()
		{	

		    $data['message'] = "";
			$code = rand(1000,9999);
			
			Session::set('code', $code);

		    // If so, you pressed the submit button. Let's go over the steps.
		    if (Input::post())
		    {
		    	$entry = Model_Users::query()->where('username', Input::post('username'))->where('user_type',0)->get();
		   		
		   		if($entry)
		   		{
		   			$data['message'] = "Username already exists";
		   		}
		   		else
		   		{
		   			//save to database
					$props = array(

						'username' => Input::post('username'),
						'password'	=> Input::post('password'),
						'email'		=> Input::post('email'),
						'fname'		=> Input::post('fname'),
						'lname'		=> Input::post('lname'),
						'user_type'	=> 0
					);

					$new = Model_Users::forge($props);
					$results = $new->save();


		   			//redirect
					Session::set(
						array(
							'login'		=> 1,
							'type'		=> 0,
							'username'	=> Input::post('username')
						)
					);

					//redirect to cart page.
					Response::redirect(Uri::base().'cart', 'refresh');
		   		}
		    }
		    // Show the register form.

			return View::forge('register/index', $data);
		}	


		public function action_captcha()
		{
			$im = imagecreatetruecolor(50, 24);
			$bg = imagecolorallocate($im, 22, 86, 165);
			$fg = imagecolorallocate($im, 255, 255, 255);
			imagefill($im, 0, 0, $bg);
			imagestring($im, 5, 5, 5,  Session::get('code'), $fg);
			header("Cache-Control: no-cache, must-revalidate");
			header('Content-type: image/png');
			imagepng($im);
			imagedestroy($im);

		}

	}