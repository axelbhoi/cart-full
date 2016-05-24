<?php

	use \Model\Cart;

	class Controller_Cart extends Controller{

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
			if (Input::post())
			{
				$date = date('Y:m:d H:m:s');

				//check first if item already exist in temporary table
				$availability = Cart::check_temporary_table(Session::get('account_id'),Input::post('pid'));

				if($availability->count())
				{
					$find = Model_Temporary::find($availability[0]['id']);
					//add existing and new quantity
					$new_quantity = Input::post('count-input') + $availability[0]['quantity'];

					//update temporary table
					$find->set(array(
						'quantity'		=> $new_quantity
					));

					$find->save();
				}
				else
				{
					//save to temporary table
					$temporary = array(
						'account_id'	=> Session::get('account_id'),
						'item_id'		=> Input::post('pid'),
						'quantity'		=> Input::post('count-input'),
						'created_at'	=> $date
					);

					$new = Model_Temporary::forge($temporary);
					$results = $new->save();	
				}

				Response::redirect(Uri::current());
			}
			else
			{
				$total = 0;
				$checker = array();

				$data['temporaries'] = Cart::get_temporary_results(Session::get('account_id'));

				if($data['temporaries'])
				{
					foreach(Cart::get_remaining_stock() as $remain)
					{
						$remaining[$remain['id']] = $remain['remaining'];
					}

					foreach($data['temporaries'] as $temp) 
					{
						if($total == 0)
						{
							$total = $temp['item_price'] * $temp['quantity'];
						}
						else
						{
							$total = $total + ($temp['item_price'] * $temp['quantity']);
						}
					}					
				}

				$data['remaining'] = $remaining;

				$data['total_price'] = $total;

				$data['totalitems'] = count(Cart::get_temporary_results(Session::get('account_id')));

				$entry = Model_Items::query()->where('status','active')->count();

				$config = array(
				    'pagination_url' => Uri::base().'cart/index/',
				    'total_items'    => $entry,
				    'per_page'       => 3,
				    'uri_segment'    => 3,
				    // or if you prefer pagination by query string
				    //'uri_segment'    => 'page',
				);

				// Create a pagination instance named 'mypagination'
				$pagination = Pagination::forge('mypagination', $config);

				$data['items'] 				= DB::select('*')
				                            ->from('items')
				                            ->where('status','active')
				                            ->limit($pagination->per_page)
				                            ->offset($pagination->offset)
				                            ->execute()
				                            ->as_array();

				// we pass the object, it will be rendered when echo'd in the view
				$data['pagination'] = $pagination;


				// return the view
				return \View::forge('cart/index', $data);
			}

		}		

		public function action_remove()
		{	
		
			$delete = Model_Temporary::find(Uri::segment(3));
			$delete->delete();

			Response::redirect(Uri::base().'cart');
		}

		public function action_profile()
		{
			$data['profiles'] = Cart::get_user(Session::get('account_id')); 
			// return the view
			return \View::forge('cart/profile', $data);
		}

		public function action_change_password()
		{
			$data['confirmation'] = "";
			if(Input::post())
			{
				//code block
				$user = Model_Users::find(Session::get('account_id'));
				
				$user->set(array(
					'password'	=> Input::post('password')
				));

				$user->save();
				$data['confirmation'] = "success";
			}
	       	
	       	return \View::forge('cart/change_password', $data);	

		}

	}