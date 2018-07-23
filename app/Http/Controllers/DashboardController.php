<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

use App\Http\Controllers\UserMetaController;

use Auth;

use DB;


class DashboardController extends Controller
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
	
	public function index(){
		
		$user_id = Auth::id();
		 
		$avatar_initials = UserMetaController::get_user_meta( $user_id, "printavo-avatar_initials" );
		
		$avatar_url_small = UserMetaController::get_user_meta( $user_id, "printavo-avatar_url_small");
		
		$avatar_name = UserMetaController::get_user_meta( $user_id, "printavo-name" , Auth::user()->name );
				
		$users_role = DB::select( "SELECT role FROM users WHERE id=" . $user_id );
		
		if( $avatar_initials == ""){
			$acronym = "";
			$words = explode(" ", $avatar_name);
			foreach ($words as $w) {
				$acronym .= $w[0];
			}
			$avatar_initials = $acronym;
		}
		
		$DashboardVariables = array(
			'printavo_email' => UserMetaController::get_user_meta( $user_id, "printavo-email" ),
			'printavo_api_token' => UserMetaController::get_user_meta( $user_id, "printavo-api-token" ),
			'printavo_status' => UserMetaController::get_user_meta( $user_id, "printavo-status" , "disconnected" ),
			'avatar_name' => $avatar_name,
			'avatar_background_color' => '#' . UserMetaController::get_user_meta( $user_id, "printavo-avatar_background_color" , "7951B9" ),
			'avatar_url_small' => $avatar_url_small,
			'avatar_initials' => $avatar_initials,
			'user_role' => (int)($users_role[0]->role),
			'notification' => ''
		);
		
		if( $DashboardVariables['printavo_status'] == "connected"){
			
			$student_id = UserMetaController::get_user_meta( $user_id, 'printavo_user_id' );
			
			$user_orders = DB::select("SELECT order_total,created_at FROM orders WHERE student_id=".$student_id);
			
			$user_order_amount = 0;
			
			$user_orders_num = 0;
			
			foreach ( $user_orders as $user_order ){
				
				$timestamp_created_at = strtotime( $user_order->created_at );
				
				if( date("m", $timestamp_created_at) == date("m") ){
					$user_order_amount +=  $user_order->order_total ; 
					$user_orders_num++;
				}
			}
			
			$DashboardVariables['user_orders_num'] = (int)$user_orders_num;
			$DashboardVariables['user_order_amount'] = (int)$user_order_amount;
			
		}
		
		return view( 'dashboard_home' , $DashboardVariables );
	}
	
	public function logout(){
		//logout user
		auth()->logout();
		// redirect to homepage
		return redirect('/');
	}
}
