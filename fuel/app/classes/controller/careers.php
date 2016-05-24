<?php

	class Controller_Careers extends Controller{

	    public function before()
	    {
	    	//check if user is logged in

	    	if(Session::get('login') == 1 && Session::get('type')== 1)
	    	{
	    		Response::redirect(Uri::base().'dashboard', 'refresh');
	    	}

	    	if(Session::get('login') != 1 || Session::get('type') != 0)
	    	{
	    		Response::redirect(Uri::base().'front', 'refresh');
	    	}	    	

	    	parent::before(); // Without this line, templating won't work!
	    }	

	    public function after($response)
	    {
	        $response = parent::after($response); // not needed if you create your own response object

	        // do stuff

	        return $response; // make sure after() returns the response object
	    }

		public function action_index()
		{

			return \View::forge('cart/careers');

		}		


	}