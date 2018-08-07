<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\UserMetaController;

use Auth;

use DB;

class OrderController extends Controller
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
		
		if( $printavo_status == "connected"){
			
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
				if( $_GET['sortby'] == 'invoice_no' ) {
					$sortby = 'created_at';
				}
				else {
					$sortby = $_GET['sortby'];
				}
			}
			else{
				$sortby = 'created_at';
			}
			
			if( isset($_GET['sortway']) ){
				$sortway = $_GET['sortway'];
			}
			else{
				$sortway = 'DESC';
			}
			
			if ( $sortby == 'order_total' ){
				if ( $OrdersVariables['user_role'] > 3 ){
					
					if( isset($_GET['query']) ){
						
						$orders = DB::select(	"SELECT * FROM orders WHERE 
															UPPER(order_id) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(due_date) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(customer) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payment_status) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(order_total) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(student_name) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(campus) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payed) LIKE UPPER('%".$_GET['query']."%') ORDER BY length(". $sortby .") ". $sortway .",". $sortby ." ". $sortway ." LIMIT 25 OFFSET ".$query_offset);
						
						$next_page_exist = DB::select("SELECT * FROM orders WHERE 
															UPPER(order_id) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(due_date) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(customer) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payment_status) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(order_total) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(student_name) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(campus) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payed) LIKE UPPER('%".$_GET['query']."%') ORDER BY length(". $sortby .") ". $sortway .",". $sortby ." ". $sortway ." LIMIT 1 OFFSET ".( $query_offset + 25 ) );
					}
					else{
						
						$orders = DB::select("SELECT * FROM orders ORDER BY length(". $sortby .") ". $sortway .",". $sortby ." ". $sortway ." LIMIT 25 OFFSET ".$query_offset);
						
						$next_page_exist = DB::select("SELECT * FROM orders ORDER BY length(". $sortby .") ". $sortway .",". $sortby ." ". $sortway ." LIMIT 1 OFFSET ".( $query_offset + 25 ) );
						
					}
					
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
					
					if( isset($_GET['query']) ){
				
						$orders = DB::select( "SELECT * FROM orders WHERE ( ". $students_condition ." ) AND 
															UPPER(order_id) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(due_date) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(nic_name) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(customer) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(order_status) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payment_status) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(order_total) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(commision) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payed) LIKE UPPER('%".$_GET['query']."%') ) ORDER BY length(". $sortby .") ". $sortway .",". $sortby ." ". $sortway ." LIMIT 25 OFFSET ".$query_offset );
						
						$next_page_exist = DB::select("SELECT * FROM orders WHERE ( ". $students_condition ." ) AND 
															UPPER(order_id) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(due_date) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(nic_name) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(customer) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(order_status) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payment_status) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(order_total) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(commision) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payed) LIKE UPPER('%".$_GET['query']."%') ) ORDER BY length(". $sortby .") ". $sortway .",". $sortby ." ". $sortway ." LIMIT 1 OFFSET ".( $query_offset + 25 ) );
						
					}
					else{
				
						$orders = DB::select( "SELECT * FROM orders WHERE ( ". $students_condition ." ) ORDER BY length(". $sortby .") ". $sortway .",". $sortby ." ". $sortway ." LIMIT 25 OFFSET ".$query_offset );
						
						$next_page_exist = DB::select("SELECT * FROM orders WHERE ( ". $students_condition ." ) ORDER BY length(". $sortby .") ". $sortway .",". $sortby ." ". $sortway ." LIMIT 1 OFFSET ".( $query_offset + 25 ) );
						
					}
					
				}
			}
			else{
				
				if ( $OrdersVariables['user_role'] > 3 ){
					
					if( isset($_GET['query']) ){
						
						$orders = DB::select(	"SELECT * FROM orders WHERE 
															UPPER(order_id) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(due_date) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(customer) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payment_status) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(order_total) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(student_name) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(campus) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payed) LIKE UPPER('%".$_GET['query']."%') ORDER BY ". $sortby ." ". $sortway ." LIMIT 25 OFFSET ".$query_offset);
						
						$next_page_exist = DB::select("SELECT * FROM orders WHERE 
															UPPER(order_id) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(due_date) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(customer) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payment_status) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(order_total) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(student_name) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(campus) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payed) LIKE UPPER('%".$_GET['query']."%') ORDER BY ". $sortby ." ". $sortway ." LIMIT 1 OFFSET ".( $query_offset + 25 ) );
					}
					else{
						
						$orders = DB::select("SELECT * FROM orders ORDER BY ". $sortby ." ". $sortway ." LIMIT 25 OFFSET ".$query_offset);
						
						$next_page_exist = DB::select("SELECT * FROM orders ORDER BY ". $sortby ." ". $sortway ." LIMIT 1 OFFSET ".( $query_offset + 25 ) );
						
					}
					
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
					
					if( isset($_GET['query']) ){
				
						$orders = DB::select( "SELECT * FROM orders WHERE ( ". $students_condition ." ) AND
															( UPPER(order_id) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(due_date) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(nic_name) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(customer) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(order_status) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payment_status) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(order_total) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(commision) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payed) LIKE UPPER('%".$_GET['query']."%') ) ORDER BY ". $sortby ." ". $sortway ." LIMIT 25 OFFSET ".$query_offset );
						
						$next_page_exist = DB::select("SELECT * FROM orders WHERE ( ". $students_condition ." ) AND 
															( UPPER(order_id) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(due_date) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(nic_name) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(customer) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(order_status) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payment_status) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(order_total) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(commision) LIKE UPPER('%".$_GET['query']."%') OR
															UPPER(payed) LIKE UPPER('%".$_GET['query']."%') ) ORDER BY ". $sortby ." ". $sortway ." LIMIT 1 OFFSET ".( $query_offset + 25 ) );
						
					}
					else{
						
						$orders = DB::select( "SELECT * FROM orders WHERE ( ". $students_condition ." ) ORDER BY ". $sortby ." ". $sortway ." LIMIT 25 OFFSET ".$query_offset );
						
						$next_page_exist = DB::select("SELECT * FROM orders WHERE ( ". $students_condition ." ) ORDER BY ". $sortby ." ". $sortway ." LIMIT 1 OFFSET ".( $query_offset + 25 ) );
						
					}
					
				}
			
			}
			
			if( isset($next_page_exist[0]) ){
				$next_page = $page + 1;
			}
			else{
				$next_page = 0 ;
			}
			
			foreach( $orders as $order_key => $order ){
				$orders[$order_key]->splitscreen = OrdersMetaController::get_order_meta( $order->order_id ,"splitsheet_value",'no');
				
				$order_comments = DB::select( "SELECT order_id FROM order_comments WHERE order_id=".$order->order_id );
				
				if( empty( $order_comments ) ){
					$orders[$order_key]->hasorder = 'no';
				}else{
					$orders[$order_key]->hasorder = 'yes';
				}
			}
			
			if( $sortby == 'created_at' ) {
				$sortby = 'invoice_no';
			}
			
			$OrdersVariables['orders'] = $orders;
			$OrdersVariables['next_page'] = $next_page;
			$OrdersVariables['prev_page'] = $prev_page;
			$OrdersVariables['sortby'] = $sortby;
			$OrdersVariables['sortway'] = $sortway;
			if( isset($_GET['query']) ){
				$OrdersVariables['query'] = $_GET['query'];
			}
			
		}
		
		return view( 'Order.Archive' , $OrdersVariables );
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
		
		if( $printavo_status == "connected"){
			
			$OrdersVariables['order'] = DB::select("SELECT * FROM orders WHERE order_id=" . $id )[0];
			
			$OrdersVariables['users'] = DB::select("SELECT * FROM students");
			
			$users_role = DB::select("SELECT role FROM users WHERE id=$user_id");
			
			$comments = DB::select("SELECT * FROM order_comments WHERE order_id=" . $id );
			
			$OrdersVariables['users_bonus'] = OrdersMetaController::get_order_meta( $id ,"users_bonus",'0');
			$OrdersVariables['users_bonus_and_commision'] = OrdersMetaController::get_order_meta( $id ,"users_bonus_and_commision",'0');
			$OrdersVariables['splitsheet_value'] = OrdersMetaController::get_order_meta( $id ,"splitsheet_value",'no');
			$OrdersVariables['other_user_id'] = OrdersMetaController::get_order_meta( $id ,"other_user_id",'null');
			$OrdersVariables['other_user_name'] = OrdersMetaController::get_order_meta( $id ,"other_user_name",'null');
			$OrdersVariables['other_user_bonus'] = OrdersMetaController::get_order_meta( $id ,"other_user_bonus",'0');
			$OrdersVariables['other_user_bonus_and_commision'] = OrdersMetaController::get_order_meta( $id ,"other_user_bonus_and_commision",'0');
			$OrdersVariables['total_commision_value'] = OrdersMetaController::get_order_meta( $id ,"total_commision_value",'0');
			$OrdersVariables['total_paid_value'] = OrdersMetaController::get_order_meta( $id ,"total_paid_value",'0');
			$OrdersVariables['student_paid'] = OrdersMetaController::get_order_meta( $id ,"student_paid",'1');
			$OrdersVariables['admin_changed'] = OrdersMetaController::get_order_meta( $id ,'admin_changed' );
			$OrdersVariables['paid_date'] = OrdersMetaController::get_order_meta( $id ,'paid_date' );
			$OrdersVariables['comments'] = $comments;
		}
		
		return view( 'Order.Single' , $OrdersVariables );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
