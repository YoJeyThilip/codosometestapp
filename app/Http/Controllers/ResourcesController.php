<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

use App\Http\Controllers\UserMetaController;

use App\Http\Controllers\GeneralSettingsController;

use Auth;

use DB;


class ResourcesController extends Controller
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
		
		$ResourcesVariables = array(
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
		
		if( $ResourcesVariables['printavo_status'] == "connected"){
			
			$ResourcesVariables['resource_content'] = GeneralSettingsController::get_option( "resource_content" );
			
		}
		
		return view( 'Resources.index' , $ResourcesVariables );
	}
	
	public function edit(){
		
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
		
		$ResourcesVariables = array(
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
		
		if( $ResourcesVariables['printavo_status'] == "connected"){
			
			if( isset($_POST['resource_content'])  ) {
				
				$allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
				
				$allowedTags.='<li><ol><ul><span><div><br><ins><del>';  
				
				GeneralSettingsController::update_option( "resource_content", strip_tags(stripslashes($_POST['resource_content']),$allowedTags) );
				
			}
			
			$ResourcesVariables['resource_content'] = GeneralSettingsController::get_option( "resource_content" );
			
		}
		
		return view( 'Resources.edit' , $ResourcesVariables );
	}
}
