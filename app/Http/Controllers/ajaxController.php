<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

use App\Http\Controllers\OrdersMetaController;

use App\Http\Controllers\UserMetaController;

use Auth;

use DB;

use GuzzleHttp\Client;


class ajaxController extends Controller
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
	
	public function ajax(){
			
			
		$user_id = Auth::id();
		
		$users_role = DB::select( "SELECT role FROM users WHERE id=" . $user_id )[0]->role;
		
		if( ( $_POST['action'] == 'orders_edit' ) &&  ( $users_role > 3 ) ) {
			
			$order_id = $_POST['order_id'];
			$response_json = json_encode($_POST);
			
			if( $_POST['payed'] == '' ){
				$_POST['payed'] = "No";
			}
			
			DB::update( "UPDATE orders SET commision = ". $_POST['splitsheet_commision'] .", payed = '". $_POST['payed'] ."' WHERE order_id = " . $order_id );
			
			OrdersMetaController::update_order_meta($order_id ,'users_bonus' , $_POST['users_bonus'] );
			OrdersMetaController::update_order_meta($order_id ,'users_bonus_and_commision' , $_POST['users_bonus_and_commision'] );
			OrdersMetaController::update_order_meta($order_id ,'total_commision_value' , $_POST['total_commision_value'] );
			OrdersMetaController::update_order_meta($order_id ,'splitsheet_value' , $_POST['splitsheet_value'] );
			OrdersMetaController::update_order_meta($order_id ,'total_paid_value' , $_POST['total_paid_value'] );
			OrdersMetaController::update_order_meta($order_id ,'admin_changed' , 'changed' );
			
			if( $_POST['splitsheet_value'] == 'yes' ) {
				OrdersMetaController::update_order_meta($order_id ,'other_user_id' , $_POST['other_user_id'] );
				OrdersMetaController::update_order_meta($order_id ,'other_user_name' , $_POST['other_user_name'] );
				OrdersMetaController::update_order_meta($order_id ,'other_user_bonus' , $_POST['other_user_bonus'] );
				OrdersMetaController::update_order_meta($order_id ,'other_user_bonus_and_commision' , $_POST['other_user_bonus_and_commision'] );
			}
		}
		
		if( $_POST['action'] == 'orders_student_edit' ) {
			
			$order_id = $_POST['order_id'];
			$order = DB::select("SELECT student_id FROM orders WHERE order_id=".$order_id);
			$admin_changed = OrdersMetaController::get_order_meta( $order_id ,'admin_changed' );
			if( ( $order[0]->student_id == UserMetaController::get_user_meta( $user_id ,'printavo_user_id' ) ) && $admin_changed != 'changed' ){
					
				$users_bonus = OrdersMetaController::get_order_meta( $order_id ,"users_bonus",'0');
				$total_commision_value = OrdersMetaController::get_order_meta( $order_id ,"total_commision_value",'0');
				
				
				OrdersMetaController::update_order_meta($order_id ,'splitsheet_value' , $_POST['splitsheet_value'] );
				
				if( $_POST['splitsheet_value'] == 'yes' ) {
					
					$users_bonus_and_commision = ( $total_commision_value / 2 ) + ( $users_bonus );
					OrdersMetaController::update_order_meta($order_id ,'users_bonus_and_commision' , $users_bonus_and_commision );
					OrdersMetaController::update_order_meta($order_id ,'other_user_id' , $_POST['other_user_id'] );
					OrdersMetaController::update_order_meta($order_id ,'other_user_name' , $_POST['other_user_name'] );
					OrdersMetaController::update_order_meta($order_id ,'other_user_bonus_and_commision' , ( $total_commision_value / 2 ) );
				}
				else{
					
					$users_bonus_and_commision = ( $total_commision_value ) + ( $users_bonus );
					OrdersMetaController::update_order_meta($order_id ,'users_bonus_and_commision' , $users_bonus_and_commision );
					
				}
				
				$response['status'] = 'success';
				
			}else{
				$response['status'] = 'fail';
			}
			
			$response_json = json_encode($response);
		}
		
		if( $_POST['action'] == 'orders_search' ) {
			
			$user_id = Auth::id();
			
			$email = UserMetaController::get_user_meta( $user_id, "printavo-email" );
			
			$api_token = UserMetaController::get_user_meta( $user_id, "printavo-api-token" );
			
			$query = $_POST['query'];

			$client = new Client();
			
			$response = $client->request('GET', 'https://www.printavo.com/api/v1/orders/search?email='. $email .'&token='. $api_token .'&page=1&per_page=25&query='. $query , [
				'http_errors' => false
			]);
			
			$responsearray = json_decode( $response->getBody(), true );
			
			$response_json = json_encode($responsearray['data']);
		}
		
		if( $_POST['action'] == 'reports' ) {
			

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
			
			if( isset($_POST['page']) ){
				$query_offset = 10 * ($_POST['page'] - 1);
			}
			else{
				$query_offset = 10 ;
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
														UPPER(campus) LIKE UPPER('%".$_GET['query']."%') ORDER BY ". $sortby ." ". $sortway ." LIMIT 10 OFFSET ".$query_offset );
					
				}
				else{
					
					$students = DB::select("SELECT * FROM students ORDER BY ". $sortby ." ". $sortway ." LIMIT 10 OFFSET ".$query_offset );
					
				}
				
			}
			
			foreach( $students  as $key => $student ) {
				
				$get_order_details_query = DB::select("SELECT * FROM orders WHERE student_id = ".$student->student_id." AND payed = 'No'" );
				
				$students[$key]->order_count = sizeof($get_order_details_query);
				
				$students[$key]->total_payment = 0;
				
				$students[$key]->total_sales = 0;
				
				$students[$key]->payment = 'paid';
				
				foreach( $get_order_details_query  as $sub_key => $order ) {
					
					$get_order_details_query[$sub_key]->users_bonus_and_commision = OrdersMetaController::get_order_meta( $order->order_id ,"users_bonus_and_commision",'0');
					
					$get_order_details_query[$sub_key]->other_user_bonus_and_commision = OrdersMetaController::get_order_meta( $order->order_id ,"other_user_bonus_and_commision",'0');
					
					$get_order_details_query[$sub_key]->user_bonus = OrdersMetaController::get_order_meta( $order->order_id ,"users_bonus",'0');
					
					$get_order_details_query[$sub_key]->splitsheet_value = OrdersMetaController::get_order_meta( $order->order_id ,"splitsheet_value",'0');
					
					$get_order_details_query[$sub_key]->commision_in_price = number_format( ($order->commision/100) * $order->order_total,2 );
					
					$students[$key]->total_payment += floatval( $order->order_total );
					
					$students[$key]->total_sales += floatval( $order->order_total ) + number_format( floatval( $get_order_details_query[$sub_key]->users_bonus_and_commision ),2 );
					
					if( $get_order_details_query[$sub_key]->splitsheet_value == 'yes'  ){
					
						$get_order_details_query[$sub_key]->commision_in_price = number_format( ( ($order->commision/100) * $order->order_total )/ 2 ,2 );
						
					}
					
					if( $students[$key]->payment =! 'Unpaid' &&   $order->payed == 'Yes' ){
						
						$students[$key]->payment = 'Paid';
						
					}
					else{
						$students[$key]->payment = 'Unpaid';
					}
					
					$get_order_details_query[$sub_key]->due_date = date( 'j/n/Y', strtotime( $order->due_date ) );
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
					
				$students = array_slice($students, $query_offset, ( $query_offset + 10) );
			}
			
			$ReportsVariables['students'] = $students;
			$ReportsVariables['sortby'] = $sortby;
			$ReportsVariables['sortway'] = $sortway;
			
			if( isset($_GET['query']) ){
				$ReportsVariables['query'] = $_GET['query'];
			}
			$response_json = json_encode($students);
		}
		
		if( $_POST['action'] == 'new_comment' ) {
			
			DB::insert("insert into order_comments (order_id,user_name,comment) values (:order_id,:user_name,:comment)",
				[
					'order_id' 		=> $_POST['order_id'] ,
					'user_name' 	=> $_POST['user_name'] ,
					'comment' 		=> $_POST['comment'] 
				]
			);
			
			$response_json = '';
		}
		
		if( $_POST['action'] == 'reports_admin' ) {
			
			if( $users_role > 3 ){
				
				$orders = DB::select("SELECT * FROM orders ORDER BY length( created_at ) DESC, created_at DESC");
				
				$orders_per_month = [];
				
				$Students_orders_per_month = [];
				
				$timestamp_start_month = strtotime( $_POST['selected_date']);
				
				$timestamp_end_month = strtotime('+1 month', strtotime( $_POST['selected_date']) );
				
				foreach( $orders as $order ){
						
					$timestamp = strtotime( $order->created_at );
					
					if( ( $timestamp_start_month < $timestamp ) && ( $timestamp < $timestamp_end_month ) ){
						
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
				
				$response_json = json_encode($AnalyticsVariables);
			
			}
		}
		
		return $response_json;
	}
	
}
