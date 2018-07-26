<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\UserMetaController;

use Auth;

use DB;

class tablesController extends Controller
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
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
    public function index()
    {	

		$user_id = Auth::id();
		
		$email = UserMetaController::get_user_meta( $user_id, "printavo-email" );
		
		$api_token = UserMetaController::get_user_meta( $user_id, "printavo-api-token" );
		
		$printavo_status = UserMetaController::get_user_meta( $user_id, "printavo-status" , "disconnected" );
		 
		$avatar_initials = UserMetaController::get_user_meta( $user_id, "printavo-avatar_initials" );
		
		$avatar_url_small = UserMetaController::get_user_meta( $user_id, "printavo-avatar_url_small");
		
		$avatar_name = UserMetaController::get_user_meta( $user_id, "printavo-name" , Auth::user()->name );
		
		$avatar_background_color = UserMetaController::get_user_meta( $user_id, "printavo-avatar_background_color" , "7951B9" );
				
		$users_role = DB::select( "SELECT role FROM users WHERE id=" . $user_id );
			
		if( $avatar_initials == ""){
			$acronym = "";
			$words = explode(" ", $avatar_name);
			foreach ($words as $w) {
				$acronym .= $w[0];
			}
			$avatar_initials = $acronym;
		}
		
		$OrdersVariables = array(
			'printavo_email' => $email,
			'printavo_status' => $printavo_status,
			'avatar_name' => $avatar_name,
			'avatar_background_color' => '#' . $avatar_background_color,
			'avatar_url_small' => $avatar_url_small,
			'avatar_initials' => $avatar_initials ,
			'notification' => '',
			'user_role'	=> (int)($users_role[0]->role)
		);
		
		//update data --> start
		if( isset( $_POST['table_name'] ) && $_POST['table_name'] == 'common_items' ) { 
		
			DB::update('update common_items SET brand = :brand,product =  :product,cost = :cost,non_online_store = :non_online_store,online_store = :online_store WHERE ( id = :id )',['id' => $_POST['id'] , 'brand' =>  $_POST['brand'], 'product' =>  $_POST['product'] , 'cost' =>  $_POST['cost'], 'non_online_store' =>  $_POST['non_online_store'], 'online_store' =>  $_POST['online_store']  ]);
		
		}else if( isset( $_POST['table_name'] ) && $_POST['table_name'] == 'addons' ) { 
		
			DB::update('update addons SET add_on = :add_on,prize =  :prize WHERE ( id = :id )',['id' => $_POST['id'] , 'add_on' =>  $_POST['add_on'], 'prize' =>  $_POST['prize'] ] );
		
		}else if( isset( $_POST['table_name'] ) && $_POST['table_name'] == 'calculator_fabric' ) { 
		
			DB::update('update addons SET front = :front,light_fabric_non_online_25 =  :light_fabric_non_online_25,light_fabric_non_online_50 =  :light_fabric_non_online_50,light_fabric_non_online_100 =  :light_fabric_non_online_100,light_fabric_non_online_150 =  :light_fabric_non_online_150,dark_fabric_non_online_25 =  :dark_fabric_non_online_25,dark_fabric_non_online_50 =  :dark_fabric_non_online_50,dark_fabric_non_online_100 =  :dark_fabric_non_online_100,dark_fabric_non_online_150 = 
			:dark_fabric_non_online_150,light_fabric_online_25 =  :light_fabric_online_25,light_fabric_online_50 =  :light_fabric_online_50,light_fabric_online_100 = 
			:light_fabric_online_100,light_fabric_online_150 =  :light_fabric_online_150,dark_fabric_online_25 =  :dark_fabric_online_25,dark_fabric_online_50 =  
			:dark_fabric_online_50,dark_fabric_online_100 =  :dark_fabric_online_100,dark_fabric_online_150 =  :dark_fabric_non_online_150 
			WHERE ( id = :id )',['id' => $_POST['id'] , 'front' =>  $_POST['front'], 'light_fabric_non_online_25' =>  $_POST['light_fabric_non_online_25'], 
			'light_fabric_non_online_50' =>  $_POST['light_fabric_non_online_50'], 'light_fabric_non_online_100' =>  $_POST['light_fabric_non_online_100'] , 
			'light_fabric_non_online_150' =>  $_POST['light_fabric_non_online_150'], 'dark_fabric_non_online_25' =>  $_POST['dark_fabric_non_online_25'],
			'dark_fabric_non_online_50' =>  $_POST['dark_fabric_non_online_50'] , 'dark_fabric_non_online_100' =>  $_POST['dark_fabric_non_online_100'] , 
			'dark_fabric_non_online_150' =>  $_POST['dark_fabric_non_online_150']  , 'light_fabric_online_25' =>  $_POST['light_fabric_online_25']  ,
			'light_fabric_online_50' =>  $_POST['light_fabric_online_50'],'light_fabric_online_100' =>  $_POST['light_fabric_online_100'],'light_fabric_online_150' =>  $_POST['light_fabric_online_150']
			,'dark_fabric_online_25' =>  $_POST['dark_fabric_online_25'],'dark_fabric_online_50' =>  $_POST['dark_fabric_online_50'],'dark_fabric_online_100' =>  $_POST['dark_fabric_online_100'],'dark_fabric_online_150' =>  $_POST['dark_fabric_online_150']
			] );
		
		}else if( isset( $_POST['table_name'] ) && $_POST['table_name'] == 'commission_rates' ) { 
		
			DB::update('update commission_rates SET shirts = :shirts,rate =  :rate WHERE ( id = :id )',['id' => $_POST['id'] , 'shirts' =>  $_POST['shirts'], 'rate' =>  $_POST['rate'] ] );
		
		}
		//update data --> end
		
		
		// delete date --> start
		if( ( isset( $_POST['delete'] ) && $_POST['delete_id'] == 'commission_rates') ){
			
			DB::table('commission_rates')->where('id', $_POST['delete'] )->delete();
			
		}else if( ( isset( $_POST['delete'] ) && $_POST['delete_id'] == 'common_items') ) { 
		
			DB::table('common_items')->where('id', $_POST['delete'] )->delete();
		
		}else if( ( isset( $_POST['delete'] ) && $_POST['delete_id'] == 'addons') ) { 
		
			DB::table('addons')->where('id', $_POST['delete'] )->delete();
		
		}else if( ( isset( $_POST['delete'] ) && $_POST['delete_id'] == 'calculator_fabric') ) { 
		
			DB::table('calculator_fabric')->where('id', $_POST['delete'] )->delete();
		
		}
		// delete data --> end
		
		// data insert --> start
		if( isset( $_POST['insert_table'] ) && $_POST['insert_table'] == 'common_items' ){
			
			DB::table('common_items')->insert( ['id' => $_POST['id'] , 'brand' =>  $_POST['brand'], 'product' =>  $_POST['product'] , 'cost' =>  $_POST['cost'], 'non_online_store' =>  $_POST['non_online_store'], 'online_store' =>  $_POST['online_store']  ] );
			
		}else if(  isset( $_POST['insert_table'] ) && $_POST['insert_table'] == 'commission_rates'  ) { 
		
			DB::table('commission_rates')->insert(['id' => $_POST['id'] , 'shirts' =>  $_POST['shirts'], 'rate' =>  $_POST['rate'] ]);
			
		}else if( isset( $_POST['insert_table'] ) && $_POST['insert_table'] == 'addons'  ) { 
		
			DB::table('addons')->insert(['id' => $_POST['id'] , 'add_on' =>  $_POST['add_on'], 'prize' =>  $_POST['prize'] ]);
			
		}else if( isset( $_POST['insert_table'] ) && $_POST['insert_table'] == 'calculator_fabric' ) { 
		
			DB::table('calculator_fabric')->insert(['id' => $_POST['id'] , 'front' =>  $_POST['front'], 'light_fabric_non_online_25' =>  $_POST['light_fabric_non_online_25'], 
														'light_fabric_non_online_50' =>  $_POST['light_fabric_non_online_50'], 'light_fabric_non_online_100' =>  $_POST['light_fabric_non_online_100'] , 
														'light_fabric_non_online_150' =>  $_POST['light_fabric_non_online_150'], 'dark_fabric_non_online_25' =>  $_POST['dark_fabric_non_online_25'],
														'dark_fabric_non_online_50' =>  $_POST['dark_fabric_non_online_50'] , 'dark_fabric_non_online_100' =>  $_POST['dark_fabric_non_online_100'] , 
														'dark_fabric_non_online_150' =>  $_POST['dark_fabric_non_online_150']  , 'light_fabric_online_25' =>  $_POST['light_fabric_online_25']  ,
														'light_fabric_online_50' =>  $_POST['light_fabric_online_50'],'light_fabric_online_100' =>  $_POST['light_fabric_online_100'],'light_fabric_online_150' =>  $_POST['light_fabric_online_150']
														,'dark_fabric_online_25' =>  $_POST['dark_fabric_online_25'],'dark_fabric_online_50' =>  $_POST['dark_fabric_online_50'],'dark_fabric_online_100' =>  $_POST['dark_fabric_online_100'],'dark_fabric_online_150' =>  $_POST['dark_fabric_online_150']
												   ]);
			
		}
		// data insert --> end
		
		
		// Edit page --> start
		if( !isset($_GET['tab']) && !isset($_GET['edit']) || ( isset($_GET['tab'])  && $_GET['tab'] == 'common_items') ){
			
			$OrdersVariables['common_items'] = DB::select("SELECT * FROM common_items" );
			
			return view( 'tables.common_items',$OrdersVariables );
			
		}else if( isset($_GET['edit']) && $_GET['edit'] == 'common_items' ){ 
			
			$OrdersVariables['common_items'] = DB::select("SELECT * FROM common_items" );
		
			$OrdersVariables['common_items_edit_id'] = $_GET['id'];
		
			return view( 'tables.common_items_edit',$OrdersVariables );
			
		}else if( isset($_GET['tab']) && $_GET['tab'] == 'commission_rates' ){ 
		
			$OrdersVariables['commission_rates'] = DB::select("SELECT * FROM commission_rates" );
		
			return view( 'tables.commission_rates',$OrdersVariables );
			
		}else if( isset($_GET['edit']) && $_GET['edit'] == 'commission_rates' ){ 
		
			$OrdersVariables['commission_rates_edit_id'] = $_GET['id'];
		
			$OrdersVariables['commission_rates'] = DB::select("SELECT * FROM commission_rates" );
		
			return view( 'tables.commission_rates_edit',$OrdersVariables );
			
		}else if( isset($_GET['tab']) && $_GET['tab'] == 'addons' ){ 
		
			$OrdersVariables['addons'] = DB::select("SELECT * FROM addons" );
		
			return view( 'tables.addons',$OrdersVariables );
			
		}else if( isset($_GET['edit']) && $_GET['edit'] == 'addons' ){ 
		
			$OrdersVariables['addons_edit_id'] = $_GET['id'];
		
			$OrdersVariables['addons'] = DB::select("SELECT * FROM addons" );
		
			return view( 'tables.addons_edit',$OrdersVariables );
			
		}else if( isset($_GET['tab']) && $_GET['tab'] == 'calculator_fabric' ){ 
		
			$OrdersVariables['calculator_fabric'] = DB::select("SELECT * FROM calculator_fabric" );
		
			return view( 'tables.calculator_fabric',$OrdersVariables );
			
		}else if( isset($_GET['edit']) && $_GET['edit'] == 'calculator_fabric' ){  
		
			$OrdersVariables['calculator_fabric_edit_id'] = $_GET['id'];
		
			$OrdersVariables['calculator_fabric'] = DB::select("SELECT * FROM calculator_fabric" );
		
			return view( 'tables.calculator_fabric_edit',$OrdersVariables );
			
			// Edit page --> end
			
		}else {		
		
			return view( 'tables.Archive',$OrdersVariables );
			
		}
    }
}
