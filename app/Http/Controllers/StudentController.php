<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\UserMetaController;

use Auth;

use DB;

class StudentController extends Controller
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
		
		$StudentsVariables = array(
			'printavo_email' => $email,
			'printavo_status' => $printavo_status,
			'avatar_name' => $avatar_name,
			'avatar_background_color' => '#' . $avatar_background_color,
			'avatar_url_small' => $avatar_url_small,
			'avatar_initials' => $avatar_initials ,
			'notification' => '',
			'user_role'	=> (int)($users_role[0]->role),
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
													UPPER(connected) LIKE UPPER('%".$_GET['query']."%') ORDER BY ". $sortby ." ". $sortway ." LIMIT 25 OFFSET ".$query_offset);
				
				$next_page_exist = DB::select("SELECT * FROM students WHERE 
													UPPER(student_name) LIKE UPPER('%".$_GET['query']."%') OR
													UPPER(campus) LIKE UPPER('%".$_GET['query']."%') OR
													UPPER(connected) LIKE UPPER('%".$_GET['query']."%') ORDER BY ". $sortby ." ". $sortway ." LIMIT 1 OFFSET ".( $query_offset + 25 ) );
			}
			else{
				
				$students = DB::select("SELECT * FROM students ORDER BY ". $sortby ." ". $sortway ." LIMIT 25 OFFSET ".$query_offset);
				
				$next_page_exist = DB::select("SELECT * FROM students ORDER BY ". $sortby ." ". $sortway ." LIMIT 1 OFFSET ".( $query_offset + 25 ) );
				
			}
			
			if( isset($next_page_exist[0]) ){
				$next_page = $page + 1;
			}
			else{
				$next_page = 0 ;
			}
				
			$StudentsVariables['students'] = $students;
			$StudentsVariables['next_page'] = $next_page;
			$StudentsVariables['prev_page'] = $prev_page;
			$StudentsVariables['sortby'] = $sortby;
			$StudentsVariables['sortway'] = $sortway;
			if( isset($_GET['query']) ){
				$StudentsVariables['query'] = $_GET['query'];
			}
			
		}
		
		return view( 'Student.Archive' , $StudentsVariables );
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
			
		if( $avatar_initials == ""){
			$acronym = "";
			$words = explode(" ", $avatar_name);
			foreach ($words as $w) {
				$acronym .= $w[0];
			}
			$avatar_initials = $acronym;
		}
		
		$StudentsVariables = array(
			'printavo_email' => $email,
			'printavo_status' => $printavo_status,
			'avatar_name' => $avatar_name,
			'avatar_background_color' => '#' . $avatar_background_color,
			'avatar_url_small' => $avatar_url_small,
			'avatar_initials' => $avatar_initials ,
			'notification' => '',
		);
		
		if( $printavo_status == "connected"){
			
			$client = new Client();
			
			$response = $client->request('GET', 'https://www.printavo.com/api/v1/users/'. $id .'?email='. $email .'&token='. $api_token, [
				'http_errors' => false
			]);
			
			print_r($response->getStatusCode());
			
			if( $response->getStatusCode() != 200 ){
				return false;
			}
			
			$responsearray = json_decode( $response->getBody(), true );
			
			$StudentsVariables['students'] = $responsearray;
			
			/*
			$StudentsVariables['total_quantity'] = 0;
			
			foreach( $responsearray['lineitems_attributes'] as $item ){
				$StudentsVariables['total_quantity'] = $StudentsVariables['total_quantity'] + $item['total_quantities'];
			} 
			
			$users_response = $client->request('GET', 'https://www.printavo.com/api/v1/users?email='. $email .'&token='. $api_token .'&page=1&per_page=9999', [
				'http_errors' => false
			]);
			
			if( $users_response->getStatusCode() == 200 ){
				$users_responsearray = json_decode( $users_response->getBody(), true );
				$StudentsVariables['users'] = $users_responsearray['data'];
			}
			
			$StudentsVariables['splitsheet_commision'] = OrdersMetaController::get_order_meta( $id ,"splitsheet_commision" ,"0");
			$StudentsVariables['user_one_name'] = OrdersMetaController::get_order_meta( $id ,"user_one_name",'null');
			$StudentsVariables['user_two_name'] = OrdersMetaController::get_order_meta( $id ,"user_two_name",'null');
			$StudentsVariables['user_one_bonus'] = OrdersMetaController::get_order_meta( $id ,"user_one_bonus",'0');
			$StudentsVariables['user_two_bonus'] = OrdersMetaController::get_order_meta( $id ,"user_two_bonus",'0');
			$StudentsVariables['user_one_bonus_and_commision'] = OrdersMetaController::get_order_meta( $id ,"user_one_bonus_and_commision",'0');
			$StudentsVariables['user_two_bonus_and_commision'] = OrdersMetaController::get_order_meta( $id ,"user_two_bonus_and_commision",'0');
			$StudentsVariables['total_commision_value'] = OrdersMetaController::get_order_meta( $id ,"total_commision_value",'0');
			$StudentsVariables['splitsheet_value'] = OrdersMetaController::get_order_meta( $id ,"splitsheet_value",'no');
			$StudentsVariables['user_one_value'] = OrdersMetaController::get_order_meta( $id ,"user_one_value",'null');
			$StudentsVariables['user_two_value'] = OrdersMetaController::get_order_meta( $id ,"user_two_value",'null');
			$StudentsVariables['total_paid_value'] = OrdersMetaController::get_order_meta( $id ,"total_paid_value",'0');
			$StudentsVariables['user_one_total_paid'] = OrdersMetaController::get_order_meta( $id ,"user_one_total_paid",'0');
			$StudentsVariables['student_paid'] = OrdersMetaController::get_order_meta( $id ,"student_paid",'0');
			
			*/
		}
		
		return view( 'Student.Single' , $StudentsVariables );
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
