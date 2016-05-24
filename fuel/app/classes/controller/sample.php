<?php

	class Controller_Sample extends Controller{

		public function action_index()
		{
			if (Input::post())
			{
				// Custom configuration for this upload
				$config = array(
				    'path' => 'assets/img/items',
				    'randomize' => false,
				    'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
				);

				// process the uploaded files in $_FILES
				Upload::process($config);

				//Upload::save(0);

				//echo "a";
			

 				if (!\Upload::is_valid())
 				{
       				return $this->response(\Upload::get_errors());
   				} 
   				else
   				{

			       // Here comes the fix

			       Upload::save();

			       $saved_image = Upload::get_files();
			       echo "<pre>";
			       	print_r($saved_image);
			       echo "</pre>";

			       $original_name = $saved_image[0]['name'];
			       $file_name = $saved_image[0]['saved_as'];  
			       $extension = $saved_image[0]['extension'];

			       $public_asset_path_img = "assets".DS."img";

			       $image = Image::load('assets/img/items/'.$file_name,false,$extension);
			       $image->crop_resize(32,32);
			       $image->save('assets/img/thumb/'.$original_name.'_thumb');
			       //$image->save('assets/img/thumb/'.$file_name);
					
			       /*$image = Image::load(DOCROOT.$public_asset_path_img.DS.$file_name, false, $file['extension']);
			       $image->resize('800');
			       $image->save(DOCROOT.$public_asset_path_img.DS.$file_name);
					*/
				}

			}

			return View::forge('sample/index');
		}

		public function action_res()
		{


		    Image::load('assets/img/items/tin.jpg')
		        ->crop_resize(32, 32)
		        ->save('assets/img/thumb/');

		}

	}