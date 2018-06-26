<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

use DB;

class OrdersMetaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 
    public function __construct()
    {
		$this->middleware('auth');
    }
	
	public static function update_order_meta( $order_id, $meta_name, $meta_value ){
		
		$orders_meta = DB::select("SELECT * FROM orders_meta WHERE ( order_id = :order_id and meta_name = :meta_name )", ['order_id' => $order_id , 'meta_name' => $meta_name ]);
		
		if( $meta_value == null ){
			$meta_value = '';
		}
		
		if (!empty($orders_meta)) {
			DB::update('UPDATE orders_meta SET meta_value = :meta_value WHERE ( order_id = :order_id and meta_name = :meta_name )',['order_id' => $order_id , 'meta_name' => $meta_name , 'meta_value' =>  $meta_value ]);
		}
		else{
			DB::insert('insert into orders_meta (order_id, meta_name, meta_value) values (:order_id, :meta_name, :meta_value)',['order_id' => $order_id , 'meta_name' => $meta_name , 'meta_value' =>  $meta_value ]);
		}
	
	}
	
	public static function get_order_meta( $order_id, $meta_name , $default = "" ){
		
		$orders_meta = DB::select("SELECT meta_value FROM orders_meta WHERE ( order_id = :order_id and meta_name = :meta_name )", ['order_id' => $order_id , 'meta_name' => $meta_name ]);
		
		if (!empty($orders_meta)) {
		
			return $orders_meta[0]->meta_value;
		
		}
		else{
			
			return $default;
			
		}
	}
}