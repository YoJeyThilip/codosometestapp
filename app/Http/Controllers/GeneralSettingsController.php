<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

use DB;

class GeneralSettingsController extends Controller
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
	
	public static function update_option( $option_name, $option_value ){
		
		$general_settings = DB::select("SELECT option_value FROM general_settings WHERE ( option_name = :option_name )", ['option_name' => $option_name ]);
		
		if( $option_value == null ){
			$option_value = '';
		}
		
		if (!empty($general_settings)) {
			DB::update('UPDATE general_settings SET option_value = :option_value WHERE ( option_name = :option_name )',['option_name' => $option_name , 'option_value' =>  $option_value ]);
		}
		else{
			DB::insert('insert into general_settings ( option_name, option_value) values ( :option_name, :option_value)',['option_name' => $option_name , 'option_value' =>  $option_value ]);
		}
	
	}
	
	public static function get_option( $option_name , $default = "" ){
		
		$general_settings = DB::select("SELECT option_value FROM general_settings WHERE ( option_name = :option_name )", ['option_name' => $option_name ]);
		
		if (!empty($general_settings)) {
		
			return $general_settings[0]->option_value;
		
		}
		else{
			
			return $default;
			
		}
	}
}