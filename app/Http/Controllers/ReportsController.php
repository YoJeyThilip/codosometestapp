<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\UserMetaController;

use App\Http\Controllers\OrdersMetaController;

use Auth;

use DB;

class ReportsController extends Controller
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
		
		$ReportsVariables = array(
			'printavo_email' => $email,
			'printavo_status' => $printavo_status,
			'avatar_name' => $avatar_name,
			'avatar_background_color' => '#' . $avatar_background_color,
			'avatar_url_small' => $avatar_url_small,
			'avatar_initials' => $avatar_initials ,
			'notification' => '',
			'user_role'	=> (int)($users_role[0]->role)
		);
	 
		
		if( $printavo_status == "connected"){
			
			if( isset($_GET['sortby']) ){
				$sortby = $_GET['sortby'];
			}
			else{
				$sortby = 'student_id';
			}
			
			if( isset($_GET['sortway']) ){
				$sortway = $_GET['sortway'];
			}
			else{
				$sortway = 'DESC';
			}
			
			if( isset($_GET['query']) ){
				
				$students = DB::select(	"SELECT * FROM students WHERE 
													UPPER(student_name) LIKE UPPER('%".$_GET['query']."%') OR
													UPPER(campus) LIKE UPPER('%".$_GET['query']."%') OR
													UPPER(connected) LIKE UPPER('%".$_GET['query']."%') ORDER BY ". $sortby ." ". $sortway );
				
			}
			else{
				
				$students = DB::select("SELECT * FROM students ORDER BY ". $sortby ." ". $sortway );
				
			}
			
			foreach( $students  as $key => $student ) {
				
				$get_order_details_query = DB::select("SELECT * FROM orders WHERE student_id = ".$student->student_id." AND payment_status = 'Unpaid' LIMIT 5 " );
				
				$students[$key]->order_count = sizeof($get_order_details_query);
				
				$students[$key]->total_payment = 0;
				
				$students[$key]->total_sales = 0;
				
				$students[$key]->payment = 'paid';
				
				foreach( $get_order_details_query  as $sub_key => $order ) {
					
					$get_order_details_query[$sub_key]->users_bonus_and_commision = OrdersMetaController::get_order_meta( $order->order_id ,"users_bonus_and_commision",'0');
					
					$get_order_details_query[$sub_key]->other_user_bonus_and_commision = OrdersMetaController::get_order_meta( $order->order_id ,"other_user_bonus_and_commision",'0');
					
					$get_order_details_query[$sub_key]->user_bonus = OrdersMetaController::get_order_meta( $order->order_id ,"users_bonus",'0');
					
					$get_order_details_query[$sub_key]->splitsheet_value = OrdersMetaController::get_order_meta( $order->order_id ,"splitsheet_value",'0');
					
					$students[$key]->total_payment += $order->order_total ;
					
					$students[$key]->total_sales += $order->order_total + number_format( floatval( $get_order_details_query[$sub_key]->users_bonus_and_commision ),2 );
					
					if( $get_order_details_query[$sub_key]->splitsheet_value == 'yes'  ){
						
						$students[$key]->total_sales += number_format( floatval( $get_order_details_query[$sub_key]->other_user_bonus_and_commision ),2 );
						
						$get_order_details_query[$sub_key]->user_bonus += OrdersMetaController::get_order_meta( $order->order_id ,"other_user_bonus",'0');
						
					}
					
					if( $students[$key]->payment =! 'Unpaid' &&  $order->payment_status == 'Paid' ){
						
						$students[$key]->payment = 'Paid';
						
					}
					else{
						$students[$key]->payment = 'Unpaid';
					}
				}
				
				$students[$key]->orders = $get_order_details_query;  
			}
			
			$ReportsVariables['students'] = $students;
			$ReportsVariables['sortby'] = $sortby;
			$ReportsVariables['sortway'] = $sortway;
			
			if( isset($_GET['query']) ){
				$ReportsVariables['query'] = $_GET['query'];
			}
		}
		
		if( isset($_POST['selected_student_report_and_orders'])  ) {		
			
		
			return view( 'Reports.prepare_for_payment' , $ReportsVariables );
			
		}else{
		
			return view( 'Reports.listing' , $ReportsVariables );
			
		}
		
    }
	
	public function all_paid_orders(){
		
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
		
		$ReportsVariables = array(
			'printavo_email' => $email,
			'printavo_status' => $printavo_status,
			'avatar_name' => $avatar_name,
			'avatar_background_color' => '#' . $avatar_background_color,
			'avatar_url_small' => $avatar_url_small,
			'avatar_initials' => $avatar_initials ,
			'notification' => '',
			'user_role'	=> (int)($users_role[0]->role)
		);
	 
		
			
		return view( 'Reports.all_paid_orders',$ReportsVariables );
	
    }
}
