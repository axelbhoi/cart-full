<?php

	class Model_Orders extends Orm\Model{

		protected static $properties = array('id','account_id','reference_no', 'total', 'notes','created_at');

	}