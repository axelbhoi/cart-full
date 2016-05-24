<?php
	use \Model\Cart;

	class Controller_Dashboard extends Controller_Template{

	    public function before()
	    {

	    	if(Session::get('login') == 1 &&  Session::get('type') == 0)
	    	{
	    		Response::redirect(Uri::base().'home', 'refresh');
	    	}

	    	if(!Session::get('login'))
	    	{
	    		Response::redirect(Uri::base().'admin', 'refresh');
	    	}

	        parent::before(); // Without this line, templating won't work!
	    }

	    /**
	     * Make after() compatible with Controller_Template by adding $response as a parameter
	     */
	    public function after($response)
	    {
	        $response = parent::after($response); // not needed if you create your own response object

	        // do stuff

	        return $response; // make sure after() returns the response object
	    }

		public function action_index()
		{
			$entry = Model_Items::find('all');

			$data = array('entry'=>$entry);			

			if(Input::post())
			{
				/*$find = Model_Items::find(Uri::segment(3));

				$items = array('find'=>$find);

				foreach($items as $item)
				{
					File::delete('assets/img/items/'. $item->item_image);
					File::delete('assets/img/thumb/'. $item->item_thumb);					
				}

				$delete = Model_Items::find(Uri::segment(3));
				$delete->delete();

				Response::redirect(Uri::base().'dashboard');
				*/

				$find = Model_Items::find(Uri::segment(3));

				if(Input::post('hiddenPost') == "delete")
				{	
					$find->set(array(
						'status'	=> 'inactive'
					));	

					$find->save();
				}
				else
				{
					$find->set(array(
						'status'	=> 'active'
					));	

					$find->save();
				}
				Response::redirect(Uri::base().'dashboard');
			}

	        $this->template->title = 'Dashboard Page';
	        $this->template->content = View::forge('dashboard/index', $data);
		}		

		public function action_customers()
		{
			$entry = Model_Users::query()->where('user_type', 0)->get();

			$data = array('entry'=>$entry);
			
	        $this->template->title = 'Dashboard Page';
	        $this->template->content = View::forge('dashboard/customers',$data);	
		}

		public function action_addItem()
		{	
			$data = array('message'=>'','state'=>'');

			if(Input::post())
			{
				// Custom configuration for this upload
				$config = array(
				    'path' => 'assets/img/items',
				    'randomize' => false,
				    'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
				);

				// process the uploaded files in $_FILES
				Upload::process($config);							
			
 				if (!\Upload::is_valid())
 				{
 					$data = array('message'=>'an error has occured','state'=>0);
   				} 
   				else
   				{

			       // Here comes the fix
			       Upload::save();

			       $saved_image = Upload::get_files();

			       $original_name = $saved_image[0]['name'];
			       $file_name = $saved_image[0]['saved_as'];  
			       $extension = $saved_image[0]['extension'];

			       $image = Image::load('assets/img/items/'.$file_name,false,$extension);
			       $image->crop_resize(32,32);
			       $image->save('assets/img/thumb/'.$original_name);

		   			//save to database
					$props = array(

						'item_image' 			=> $original_name,
						'item_thumb'			=> $original_name,
						'item_name'				=> Input::post('item_name'),
						'item_description'		=> Input::post('item_description'),
						'item_price'			=> Input::post('item_price'),
						'quantity'				=> Input::post('quantity'),
						'status'				=> 'active'
					);			       

					$new = Model_Items::forge($props);
					$results = $new->save();					
					
					$data = array('message'=>'You have successfully added the item!','state'=>1);
				}
			}

	        $this->template->title = 'Dashboard Page';
	        $this->template->content = View::forge('dashboard/addItem', $data);
		}

		public function action_editItem()
		{
			$find = Model_Items::find(Uri::segment(3));

			$data = array('entry'=>$find);

			if(Input::post())
			{
				// Custom configuration for this upload
				$config = array(
				    'path' => 'assets/img/items',
				    'randomize' => false,
				    'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
				);

				// process the uploaded files in $_FILES
				Upload::process($config);		


 				if (!\Upload::is_valid())
 				{
 					//$data = array('message'=>'an error has occured','state'=>0);
   				
			   		//save to database
					$find->set(array(
						'item_name'				=> Input::post('item_name'),
						'item_description'		=> Input::post('item_description'),
						'item_price'			=> Input::post('item_price'),
						'quantity'				=> Input::post('quantity')
					));	

					$find->save();

					Response::redirect(Uri::base().'dashboard');
   				} 
   				else
   				{
					//delete old picture
					File::delete('assets/img/items/'. Input::post('hidden_item_image'));
					File::delete('assets/img/thumb/'. Input::post('hidden_item_thumb'));							
				
					//save uploaded image to database
			       // Here comes the fix
			       Upload::save();

			       $saved_image = Upload::get_files();

			       $original_name = $saved_image[0]['name'];
			       $file_name = $saved_image[0]['saved_as'];  
			       $extension = $saved_image[0]['extension'];

			       $image = Image::load('assets/img/items/'.$file_name,false,$extension);
			       $image->crop_resize(32,32);
			       $image->save('assets/img/thumb/'.$original_name);

		   			//save to database
					$find->set(array(

						'item_image' 			=> $original_name,
						'item_thumb'			=> $original_name,
						'item_name'				=> Input::post('item_name'),
						'item_description'		=> Input::post('item_description'),
						'item_price'			=> Input::post('item_price'),
						'quantity'				=> Input::post('quantity')
					));

					$find->save();						
					
					Response::redirect(Uri::base().'dashboard');
				}
				
			}
			else
			{
				if($find)
				{
			        $this->template->title = 'Dashboard Page';
			        $this->template->content = View::forge('dashboard/editItem', $data);
				}

				else
				{
					 Response::redirect(Uri::base().'dashboard');
				}
			}

		}

		public function action_orders()
		{
			$data['orders'] = Cart::get_all_orders();

	        $this->template->title = 'Dashboard Page';
	        $this->template->content = View::forge('dashboard/orders', $data);
		}

		public function action_order_details()
		{
			$data['details'] = Cart::get_checkout_details(Uri::segment(3));
			$total = 0;
			foreach($data['details'] as $detail)
			{
				$total = $total + (intval($detail['item_price']) * intval($detail['quantity']));
			}

			$data['total'] = $total;
	        $this->template->title = 'Dashboard Page';
	        $this->template->content = View::forge('dashboard/details', $data);
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

	        $this->template->title = 'Dashboard Page';
	        $this->template->content = View::forge('dashboard/change_password', $data);			

		}
	}