<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\UserMetaController;

use Auth;

use DB;

use GuzzleHttp\Client;

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
        //
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
