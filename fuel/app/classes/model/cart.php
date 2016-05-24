<?php

namespace Model;

class Cart extends \Model {

	public static function get_checkout_details($id)
	{
		$results = 	\DB::query("SELECT c.*,o.reference_no
					FROM checkouts AS c
					LEFT JOIN orders AS o
					ON c.order_id = o.id
					WHERE order_id = '".$id."'")->execute();		

		return $results;			
	}

	public static function get_all_orders()
	{
		$results = 	\DB::query("SELECT o.*,u.fname,u.lname
					FROM orders AS o
					LEFT JOIN users AS u
					ON o.account_id = u.id")->execute();		

		return $results;		
	}

	public static function get_user($id)
	{
		$results = 	\DB::query("SELECT *
					FROM users
					WHERE id = '".$id."'")->execute();		

		return $results;
	}

	public static function get_all_temporary_results_of_user($id)
	{
		$results = 	\DB::query("SELECT i.id AS item_id, i.item_image, i.item_thumb, i.item_price, i.item_name, i.item_description,i.status, i.quantity AS stock, t.id AS temp_id, t.account_id, t.quantity AS ordered, t.created_at 
					FROM temporaries AS t
					LEFT JOIN items AS i
					ON t.item_id = i.id
					WHERE i.status = 'active'
					AND t.account_id = '".$id."'")->execute();

		return $results;		
	}
    public static function get_temporary_results($id)
    {
		$results = 	\DB::query("SELECT t.*, t.id AS temp_id, i.item_image, i.item_thumb, i.item_price, i.item_name, i.status, i.quantity AS stock
					FROM temporaries AS t
					LEFT JOIN items AS i
					ON t.item_id = i.id
					WHERE i.status = 'active'
					AND t.account_id = '".$id."'")->execute();

		return $results;
    }

    public static function get_remaining_stock()
    {
    	/*
		$results = 	\DB::query("SELECT i.id,i.quantity AS stock, i.quantity - SUM(t.quantity) AS remaining
					FROM temporaries AS t
					RIGHT JOIN items AS i
					ON t.item_id = i.id
					GROUP BY i.id")->execute();
		*/
		$results = 	\DB::query("SELECT i.id,i.quantity AS stock,(i.quantity  - t.quantity) AS remaining
					FROM temporaries AS t
					RIGHT JOIN items AS i
					ON t.item_id = i.id
					GROUP BY i.id")->execute();

		return $results;

    }

    public static function check_temporary_table($account_id,$item_id)
    {
		$results = 	\DB::query("SELECT *
					FROM temporaries AS t
					WHERE t.account_id = '$account_id'
					AND t.item_id = '".$item_id."'")->execute();

		return $results;    	
    }

    public static function check_reference($reference)
    {
    	$results = \DB::query("SELECT *
    				FROM orders AS o
    				WHERE o.reference_no = '".$reference."'")->execute();

    	return $results;
    }
}