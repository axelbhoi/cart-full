<?php

	class Controller_Logout extends Controller{

		public function action_index()
		{
			$type = Session::get('type');

			Session::delete('login');
			Session::delete('type');
			Session::delete('username');
			Session::delete('account_id');

			if($type == 1)
			{
				Response::redirect(Uri::base().'admin', 'refresh');			
			}
			else
			{
				Response::redirect(Uri::base().'front', 'refresh');			
			}			
		}
	}