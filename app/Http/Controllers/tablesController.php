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
		
		$common_items = DB::select("SELECT * FROM common_items" );
		
		$commission_rates = DB::select("SELECT * FROM commission_rates" );
		
		$addons = DB::select("SELECT * FROM addons" );
		
		$calculator_fabric = DB::select("SELECT * FROM calculator_fabric" );
		
		$calculator_fabric = json_encode($calculator_fabric);

		$common_items = json_encode($common_items);
		
		$commission_rates = json_encode($commission_rates);
		
		$addons = json_encode($addons);
		
		$OrdersVariables = array(
			'printavo_email' => $email,
			'printavo_status' => $printavo_status,
			'avatar_name' => $avatar_name,
			'avatar_background_color' => '#' . $avatar_background_color,
			'avatar_url_small' => $avatar_url_small,
			'avatar_initials' => $avatar_initials ,
			'notification' => '',
			'user_role'	=> (int)($users_role[0]->role),
			'common_items' => $common_items,
			'commission_rates' => $commission_rates,
			'addons' => $addons,
			'calculator_fabric' => $calculator_fabric
		);
		
		return view( 'tables.Archive',$OrdersVariables );
    }
}
