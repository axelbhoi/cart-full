<?php

	class Model_Checkouts extends Orm\Model{

		protected static $properties = array('id','order_id','name','image_name','image_thumb','item_price','quantity','created_at');

	}