<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

use DB;

class UserMetaController extends Controller
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
	
	public static function update_user_meta( $user_id, $meta_name, $meta_value ){
		
		$users_meta = DB::select("SELECT * FROM users_meta WHERE ( user_id = :user_id and meta_name = :meta_name )", ['user_id' => $user_id , 'meta_name' => $meta_name ]);
		
		if( $meta_value == null ){
			$meta_value = '';
		}
		
		if (!empty($users_meta)) {
			DB::update('UPDATE users_meta SET meta_value = :meta_value WHERE ( user_id = :user_id and meta_name = :meta_name )',['user_id' => $user_id , 'meta_name' => $meta_name , 'meta_value' =>  $meta_value ]);
		}
		else{
			DB::insert('insert into users_meta (user_id, meta_name, meta_value) values (:user_id, :meta_name, :meta_value)',['user_id' => $user_id , 'meta_name' => $meta_name , 'meta_value' =>  $meta_value ]);
		}
	
	}
	
	public static function get_user_meta( $user_id, $meta_name , $default = "" ){
		
		$users_meta = DB::select("SELECT meta_value FROM users_meta WHERE ( user_id = :user_id and meta_name = :meta_name )", ['user_id' => $user_id , 'meta_name' => $meta_name ]);
		
		if (!empty($users_meta)) {
		
			return $users_meta[0]->meta_value;
		
		}
		else{
			
			return $default;
			
		}
	}
}