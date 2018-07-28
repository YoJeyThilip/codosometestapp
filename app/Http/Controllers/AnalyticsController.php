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
			
			if( $AnalyticsVariables['user_role'] > 3 ){
				
				$orders = DB::select("SELECT * FROM orders ORDER BY length( created_at ) DESC, created_at DESC");
				
				$orders_per_month = [];
				
				$Students_orders_per_month = [];
				
				$timestamp_this_month = strtotime( date( 'F Y') );
				
				foreach( $orders as $order ){
						
					$timestamp = strtotime( $order->created_at );
					
					if( $timestamp_this_month < $timestamp ){
						
						array_push( $orders_per_month, $order );
						
						if( ! isset( $Students_orders_per_month[ $order->student_id ] ) ){
							
							$Students_orders_per_month[ $order->student_id ] = (object)[];
							$Students_orders_per_month[ $order->student_id ]->student_name = $order->student_name;
							$Students_orders_per_month[ $order->student_id ]->order_count = 0;
							$Students_orders_per_month[ $order->student_id ]->order_total = 0;
							$Students_orders_per_month[ $order->student_id ]->order_total_commision = 0;
							
						}
						
						$Students_orders_per_month[ $order->student_id ]->order_count++;
						$Students_orders_per_month[ $order->student_id ]->order_total += $order->order_total;
						$Students_orders_per_month[ $order->student_id ]->order_total_commision += ( $order->commision * $order->order_total / 100 );

						
					}
					
				}
				
				$AnalyticsVariables['orders_per_month'] = $orders_per_month;
				
				$AnalyticsVariables['Students_orders_per_month'] = $Students_orders_per_month;
				
				return view( 'Analytics.Admin' , $AnalyticsVariables );
			
			}
			else{

				$printavo_user_id = UserMetaController::get_user_meta( $user_id, "printavo_user_id" );
				
				$related_orders_array = DB::select( "SELECT order_id FROM orders_meta WHERE meta_name='other_user_id' and meta_value=".$printavo_user_id );
				$related_orders = "";
				
				foreach( $related_orders_array as $order ){
					if( $related_orders != '' ){
						$related_orders .= ',';
					}
					$related_orders .= "'".$order->order_id."'";
				}
				
				if( $related_orders != '' ){
					$students_condition = "student_id=".$printavo_user_id." OR order_id in (".$related_orders.")";
				}
				else{
					$students_condition = "student_id=".$printavo_user_id ;
				}
				
				$orders = DB::select("SELECT created_at,order_total FROM orders WHERE ".$students_condition );
				
				$Analytics = [];
				
				$Analytics_this_month = [];
					
				$timestamp_this_year = mktime(0,0,0,1,1,date( 'Y' ));
				
				foreach( $orders as $order){
					
						
					$timestamp = strtotime( date( 'F Y' , strtotime( $order->created_at ) ) );
					
					if( ! isset( $Analytics[$timestamp] ) ){
						
						$Analytics[$timestamp] = 0;
						
					}
					
					$Analytics[$timestamp] = $order->order_total;		
					
					
					if( $timestamp_this_year < $timestamp ){
						
						if( ! isset( $Analytics_this_month[$timestamp] ) ){
						
							$Analytics_this_month[$timestamp] = 0;
							
						}
					
						$Analytics_this_month[$timestamp] = $order->order_total;
					
					}
				}
				
				ksort($Analytics);
				
				ksort($Analytics_this_month);
				
				$AnalyticsVariables['Analytics'] = $Analytics;
				
				$AnalyticsVariables['Analytics_this_month'] = $Analytics_this_month;
				
				return view( 'Analytics.Students' , $AnalyticsVariables );
			}
			
		}
	}
}
