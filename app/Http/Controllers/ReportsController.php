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
		
			if( isset($_POST['selected_student_report_and_orders'])  ) {
				
				$student_list = json_decode( $_POST['selected_student_report_and_orders'] );
				
				$students = [];
				
				$ReportsVariables['total_commission'] = 0;
				
				$ReportsVariables['total_bonuses'] = 0;
				
				$ReportsVariables['total_job_amount'] = 0;
				
				foreach( $student_list as $student_id => $orders ) {
					
					$students[$student_id] = DB::select("SELECT * FROM students WHERE student_id = ". $student_id )[0];
					
					$students[$student_id]->total_payment = 0;
					
					$students[$student_id]->payment = 'paid';
					
					$students[$student_id]->orders = [];
					
					foreach( $orders as $order_id ) {
					
						$students[$student_id]->orders[$order_id] = DB::select("SELECT * FROM orders WHERE order_id = ". $order_id )[0];
						
						$students[$student_id]->orders[$order_id]->users_bonus_and_commision = OrdersMetaController::get_order_meta( $order_id ,"users_bonus_and_commision",'0');
						
						$students[$student_id]->orders[$order_id]->user_bonus = OrdersMetaController::get_order_meta( $order_id ,"users_bonus",'0');
						
						$students[$student_id]->orders[$order_id]->splitsheet_value = OrdersMetaController::get_order_meta( $order_id ,"splitsheet_value",'0');
						
						$students[$student_id]->orders[$order_id]->commision_in_price = number_format( ($students[$student_id]->orders[$order_id]->commision/100) * $students[$student_id]->orders[$order_id]->order_total,2 );
						
						if( $students[$student_id]->orders[$order_id]->splitsheet_value == 'yes'  ){
						
							$students[$student_id]->orders[$order_id]->commision_in_price = number_format( ( ($students[$student_id]->orders[$order_id]->commision/100) * $students[$student_id]->orders[$order_id]->order_total )/2 ,2 );
							
						}
						
						$students[$student_id]->total_payment += $students[$student_id]->orders[$order_id]->commision_in_price + $students[$student_id]->orders[$order_id]->user_bonus ;
						
						if( $students[$student_id]->payment =! 'Unpaid' &&  $students[$student_id]->orders[$order_id]->payed == 'No' ){
							
							$students[$student_id]->payment = 'Paid';
							
						}
						else{
							$students[$student_id]->payment = 'Unpaid';
						}
				
						$ReportsVariables['total_commission'] += $students[$student_id]->orders[$order_id]->commision_in_price;
						
						$ReportsVariables['total_bonuses'] += $students[$student_id]->orders[$order_id]->user_bonus;
						
					}
					
					$ReportsVariables['total_job_amount'] += $students[$student_id]->total_payment;
					
					$students[$student_id]->order_count = sizeof($students[$student_id]->orders);
					
				}
					
				$ReportsVariables['students'] = $students;
				
				return view( 'Reports.prepare_for_payment' , $ReportsVariables );
				
			}
			else{
			
				if( isset($_GET['sortby']) && ( $_GET['sortby'] == 'student_name' && $_GET['sortby'] == 'campus' ) ){
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
				
				if( isset($_GET['sortby']) && ( $_GET['sortby'] != 'student_name' && $_GET['sortby'] != 'campus' ) ){
					if( isset($_GET['query']) ){
						
						$students = DB::select(	"SELECT * FROM students WHERE 
															UPPER(student_name) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(campus) LIKE UPPER('%".$_GET['query']."%') ORDER BY ". $sortby ." ". $sortway );
						
					}
					else{
						
						$students = DB::select("SELECT * FROM students ORDER BY ". $sortby ." ". $sortway );
						
					}
				}
				else{
					if( isset($_GET['query']) ){
						
						$students = DB::select(	"SELECT * FROM students WHERE 
															UPPER(student_name) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(campus) LIKE UPPER('%".$_GET['query']."%') ORDER BY ". $sortby ." ". $sortway ." LIMIT 10" );
						
					}
					else{
						
						$students = DB::select("SELECT * FROM students ORDER BY ". $sortby ." ". $sortway ." LIMIT 10" );
						
					}
				}
				
				foreach( $students  as $key => $student ) {
					
					$get_order_details_query = DB::select("SELECT * FROM orders WHERE student_id = ".$student->student_id." AND payed = 'No'" );
					
					$students[$key]->order_count = sizeof($get_order_details_query);
					
					$students[$key]->total_payment = 0;
					
					$students[$key]->payment = 'paid';
					
					foreach( $get_order_details_query  as $sub_key => $order ) {
						
						$get_order_details_query[$sub_key]->users_bonus_and_commision = OrdersMetaController::get_order_meta( $order->order_id ,"users_bonus_and_commision",'0');
						
						$get_order_details_query[$sub_key]->user_bonus = OrdersMetaController::get_order_meta( $order->order_id ,"users_bonus",'0');
						
						$get_order_details_query[$sub_key]->splitsheet_value = OrdersMetaController::get_order_meta( $order->order_id ,"splitsheet_value",'0');
						
						$get_order_details_query[$sub_key]->commision_in_price = number_format( ($order->commision/100) * $order->order_total,2 );
						
						if( $get_order_details_query[$sub_key]->splitsheet_value == 'yes'  ){
						
							$get_order_details_query[$sub_key]->commision_in_price = number_format( ( ($order->commision/100) * $order->order_total )/2 ,2 );
							
						}
						
						$students[$key]->total_payment += $get_order_details_query[$sub_key]->commision_in_price + $get_order_details_query[$sub_key]->user_bonus;
						
						if( $students[$key]->payment =! 'Unpaid' &&  $order->payed == 'No' ){
							
							$students[$key]->payment = 'Paid';
							
						}
						else{
							$students[$key]->payment = 'Unpaid';
						}
					}
					
					$students[$key]->orders = $get_order_details_query;  
				}
				
				
			
				if( isset($_GET['sortby']) && ( $_GET['sortby'] != 'student_name' && $_GET['sortby'] != 'campus' ) ){
					$sortby = $_GET['sortby'];
					$students_sort = [];
					
					foreach ($students as $key => $row) {
						$students_sort[$key]  = $row->{$sortby};
					}
					
					if( $sortway == 'DESC' ){
						array_multisort($students_sort, SORT_DESC, SORT_REGULAR, $students);
					}
					else{
						array_multisort($students_sort, SORT_ASC, SORT_REGULAR, $students);
					}
					
					$students = array_slice($students, 0, 10);
				}
				
				$ReportsVariables['students'] = $students;
				$ReportsVariables['sortby'] = $sortby;
				$ReportsVariables['sortway'] = $sortway;
				
				if( isset($_GET['query']) ){
					$ReportsVariables['query'] = $_GET['query'];
				}
				
				return view( 'Reports.listing' , $ReportsVariables );
			
			}
			
		}
		
    }
	
	public function all_reports(){
		
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
			
			if( isset($_POST['report_form_orders']) ) {
				
				$report_no = '0001'.date( 'jnY');
				$payment_date = date( 'j/n/Y');
				$order_amount = $_POST['order_amount'];
				$paid_amount = $_POST['paid_amount'];
				$report_json = $_POST['report_form_orders'];
				
				foreach(json_decode($_POST['report_form_orders']) as $order_id ){
					DB::update( "UPDATE orders SET payed = 'Yes' WHERE order_id = " . $order_id );
					OrdersMetaController::update_order_meta($order_id ,'paid_date' , date( 'j/n/Y') );
				}
				
				DB::insert("insert into reports (report_no,payment_date,order_amount,paid_amount,report_json) values (:report_no,:payment_date,:order_amount,:paid_amount,:report_json)",
					[
						'report_no' 		=> $report_no ,
						'payment_date' 		=> $payment_date ,
						'order_amount' 		=> $order_amount ,
						'paid_amount' 		=> $paid_amount,
						'report_json' 		=> $report_json
					]
				);
			}
			

			
			if( isset($_GET['page']) ){
				$page = $_GET['page'];
				$prev_page = $page - 1 ;
				$query_offset = $prev_page * 25 ;
			}
			else{
				$page = 1;
				$prev_page = 0;
				$query_offset = 0 ;
			}
			
			if( isset($_GET['sortby']) ){
				$sortby = $_GET['sortby'];
			}
			else{
				$sortby = 'report_no';
			}
			
			if( isset($_GET['sortway']) ){
				$sortway = $_GET['sortway'];
			}
			else{
				$sortway = 'DESC';
			}
			
			if ( $sortby == 'order_amount' || $sortby == 'paid_amount' ){
				
				if( isset($_GET['query']) ){
					
					$reports = DB::select(	"SELECT * FROM reports WHERE 
														UPPER(report_no) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(payment_date) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(order_amount) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(paid_amount) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(report_json) LIKE UPPER('%".$_GET['query']."%') ORDER BY length(". $sortby .") ". $sortway .",". $sortby ." ". $sortway ." LIMIT 25 OFFSET ".$query_offset);
					
					$next_page_exist = DB::select("SELECT * FROM reports WHERE 
														UPPER(report_no) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(payment_date) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(order_amount) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(paid_amount) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(report_json) LIKE UPPER('%".$_GET['query']."%') ORDER BY length(". $sortby .") ". $sortway .",". $sortby ." ". $sortway ." LIMIT 1 OFFSET ".( $query_offset + 25 ) );
				}
				else{
					
					$reports = DB::select("SELECT * FROM reports ORDER BY length(". $sortby .") ". $sortway .",". $sortby ." ". $sortway ." LIMIT 25 OFFSET ".$query_offset);
					
					$next_page_exist = DB::select("SELECT * FROM reports ORDER BY length(". $sortby .") ". $sortway .",". $sortby ." ". $sortway ." LIMIT 1 OFFSET ".( $query_offset + 25 ) );
					
				}
				
			}
			else{
				
				if( isset($_GET['query']) ){
					
					$reports = DB::select(	"SELECT * FROM reports WHERE 
														UPPER(report_no) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(payment_date) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(order_amount) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(paid_amount) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(report_json) LIKE UPPER('%".$_GET['query']."%') ORDER BY ". $sortby ." ". $sortway ." LIMIT 25 OFFSET ".$query_offset);
					
					$next_page_exist = DB::select("SELECT * FROM reports WHERE 
														UPPER(report_no) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(payment_date) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(order_amount) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(paid_amount) LIKE UPPER('%".$_GET['query']."%') OR
														UPPER(report_json) LIKE UPPER('%".$_GET['query']."%') ORDER BY ". $sortby ." ". $sortway ." LIMIT 1 OFFSET ".( $query_offset + 25 ) );
				}
				else{
					
					$reports = DB::select("SELECT * FROM reports ORDER BY ". $sortby ." ". $sortway ." LIMIT 25 OFFSET ".$query_offset);
					
					$next_page_exist = DB::select("SELECT * FROM reports ORDER BY ". $sortby ." ". $sortway ." LIMIT 1 OFFSET ".( $query_offset + 25 ) );
					
				}
				
			}
			
			foreach( $reports as $report_id => $report ){
				
				$orders_list = json_decode( $report->report_json );
				
				$reports[$report_id]->report_sum = [];
				
				foreach( $orders_list as $order_id ) {
				
					$reports[$report_id]->report_sum[$order_id] = DB::select("SELECT * FROM orders WHERE order_id = ". $order_id )[0];
					
					$reports[$report_id]->report_sum[$order_id]->users_bonus_and_commision = OrdersMetaController::get_order_meta( $order_id ,"users_bonus_and_commision",'0');
					
					$reports[$report_id]->report_sum[$order_id]->other_user_bonus_and_commision = OrdersMetaController::get_order_meta( $order_id ,"other_user_bonus_and_commision",'0');
					
					$reports[$report_id]->report_sum[$order_id]->user_bonus = OrdersMetaController::get_order_meta( $order_id ,"users_bonus",'0');
					
					$reports[$report_id]->report_sum[$order_id]->splitsheet_value = OrdersMetaController::get_order_meta( $order_id ,"splitsheet_value",'0');
					
					$reports[$report_id]->report_sum[$order_id]->commision_in_price = number_format( ($reports[$report_id]->report_sum[$order_id]->commision/100) * $reports[$report_id]->report_sum[$order_id]->order_total,2 );
					
					if( $reports[$report_id]->report_sum[$order_id]->splitsheet_value == 'yes'  ){
					
						$reports[$report_id]->report_sum[$order_id]->commision_in_price = number_format( ( ($reports[$report_id]->report_sum[$order_id]->commision/100) * $reports[$report_id]->report_sum[$order_id]->order_total )/2 ,2 );
						
					}
				}
			}			
			if( isset($next_page_exist[0]) ){
				$next_page = $page + 1;
			}
			else{
				$next_page = 0 ;
			}
			
			$ReportsVariables['reports'] = $reports;
			$ReportsVariables['next_page'] = $next_page;
			$ReportsVariables['prev_page'] = $prev_page;
			$ReportsVariables['sortby'] = $sortby;
			$ReportsVariables['sortway'] = $sortway;
			if( isset($_GET['query']) ){
				$ReportsVariables['query'] = $_GET['query'];
			}
				
			return view( 'Reports.archive' , $ReportsVariables );
		}
		
	}
}
