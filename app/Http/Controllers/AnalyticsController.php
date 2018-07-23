<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

use App\Http\Controllers\UserMetaController;

use Auth;

use DB;


class AnalyticsController extends Controller
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
		
		$AnalyticsVariables = array(
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
		
		if( $AnalyticsVariables['printavo_status'] == "connected"){
			
			if ( $AnalyticsVariables['user_role'] > 3 ){
				
				$orders = DB::select("SELECT * FROM orders ORDER BY length( created_at ) DESC, created_at DESC");
				
			}
			else{
				
				$orders = DB::select( "SELECT * FROM orders WHERE student_id=".$printavo_user_id ." ORDER BY length( created_at ) DESC, created_at DESC");
				
			}			
			
		}
		
		$year_graph = [];
		$timestamp_per_week = strtotime( $orders[0]->created_at );
		$per_week_amount = 0;
		$foreach_index = 0;
		foreach( $orders as $order ){
			$foreach_index++;
				
			$timestamp = strtotime( $order->created_at );
				
				print_r($timestamp_per_week.' ');
				print_r(($timestamp - 604800).' ');
				print_r('<br> ');
			if( $timestamp_per_week < $timestamp - 604800 ){
				
				$year_graph[$order->order_id] = array(
					'created_at' => $timestamp_per_week,
					'order_total' => $per_week_amount
				);
				
				print_r($per_week_amount.' ');
				print_r($foreach_index.' ');
				
				$timestamp_per_week = $timestamp;
			}else{
				$per_week_amount += $order->order_total;
			}
		}
		
		//print_r($year_graph);
		
		$AnalyticsVariables['year_graph'] = $year_graph;
		
		return view( 'Analytics.Index' , $AnalyticsVariables );
	}
}
