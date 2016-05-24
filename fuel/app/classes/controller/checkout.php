<?php

	use \Model\Cart;

	class Controller_Checkout extends Controller{

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
			if(Input::post())
			{
				$date = date('Y:m:d H:m:s');
				$check_reference = 1;

				//check if reference is unique

				while($check_reference != 0)
				{
					$length = 8; 
					$letters = '1234567890QWERTYUIOPASDFGHJKLZXCVBNM';

				    $reference = '';
				    $lettersLength = strlen($letters)-1;

				    for($i = 0 ; $i < $length ; $i++)
				    {
				        $reference .= $letters[rand(0,$lettersLength)];
				    }

				    $check_reference = Cart::check_reference($reference)->count();
				}

				//get info from temporary table
				$temporary_results = Cart::get_all_temporary_results_of_user(Session::get('account_id'));

				//insert into order table and checkout table data
					$orders = array(
						'account_id'		=> Session::get('account_id'),
						'reference_no'		=> $reference,
						'total'				=> Input::post('total_amount'),
						'notes'				=> Input::post('comment'),
						'created_at'		=> $date
					);	

					$order_data = Model_Orders::forge($orders);
					$order_data->save();

					$last_id = $order_data->id;

				foreach($temporary_results as $temp_result)
				{
					$set = array(
						'order_id'			=> $last_id,
						'name'				=> $temp_result['item_name'],
						'image_name'		=> $temp_result['item_image'],
						'image_thumb'		=> $temp_result['item_thumb'],
						'item_price'		=> $temp_result['item_price'],
						'quantity'			=> $temp_result['ordered'],
						'created_at'		=> $date
					);	

					$checkouts = Model_Checkouts::forge($set);
					$checkouts->save();

					$item = Model_Items::find($temp_result['item_id']);
					$item->set(array(
					    'quantity'  => intval($temp_result['stock']) - intval($temp_result['ordered']),
					));

					$item->save();					

				}
				
				//delete info from temporary table
				$delete = Model_Temporary::query()
			    		->where('account_id', Session::get('account_id'));
			    $delete->delete();

			    $data['items'] = Cart::get_temporary_results(Session::get('account_id'));; 
			    $data['thankyou'] = true;

			    return \View::forge('cart/checkout', $data);	
			}
			else
			{
				$data['items'] = Cart::get_temporary_results(Session::get('account_id'));; 
				$data['thankyou'] = "";
				return \View::forge('cart/checkout', $data);				
			}			


		}		
		public function action_remove()
		{	
			$delete = Model_Temporary::find(Uri::segment(3));
			$delete->delete();

			Response::redirect(Uri::base().'checkout');
		}

		public function action_refresh()
		{
			if(Input::post())
			{
				$find = Model_Temporary::find(Input::post('hidden_temp_id'));
				//add existing and new quantity
				//update temporary table
				$find->set(array(
					'quantity'		=> Input::post('hidden_quantity')
				));

				$find->save();
			}
			Response::redirect(Uri::base().'checkout');
		}
	}