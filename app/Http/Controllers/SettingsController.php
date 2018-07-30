<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

use App\Http\Controllers\UserMetaController;

use Auth;

use DB;

use GuzzleHttp\Client;


class SettingsController extends Controller
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
				
		$users_role = DB::select( "SELECT role FROM users WHERE id=" . $user_id )[0]->role;
		
		$printavo_user_id = UserMetaController::get_user_meta( $user_id, "printavo_user_id" );
		
		$notification = "";
			
		if(isset($_POST['printavo-connect-form']) &&  $_POST['printavo-connect-form'] == 'Connect' ){
			
			UserMetaController::update_user_meta( $user_id, "printavo-email" , $_POST['email'] );
			UserMetaController::update_user_meta( $user_id, "printavo-password" , $_POST['password'] );
			
			$client = new Client();
			
			$response_with_username_password =  $client->request('POST','https://www.printavo.com/api/v1/sessions', [
				'http_errors' => false,
				'form_params' => [
					'email' =>  $_POST['email'] ,
					'password' => $_POST['password'],
					'http_errors' => false
				]
			]);
			
			if( $response_with_username_password->getStatusCode() == 201 ){
				$api_key_response = json_decode( $response_with_username_password->getBody(), true );
				UserMetaController::update_user_meta( $user_id, "printavo-api-token" , $api_key_response['token'] );
				UserMetaController::update_user_meta( $user_id, "printavo_user_id" , $api_key_response['id'] );
				$response = $client->request('GET', 'https://www.printavo.com/api/v1/users?email='. $_POST['email'] .'&token='. $api_key_response['token'] .'&page=1&per_page=9999', [
					'http_errors' => false
				]);
				
				if( $response->getStatusCode() == 200 ){
					$responsearray = json_decode( $response->getBody(), true ); 
					foreach( $responsearray['data'] as $user ){
						if( $user['email'] == $_POST['email'] ){
							
							DB::update( "UPDATE students SET connected = 'Connected' WHERE student_id = " . $api_key_response['id'] );
							
							UserMetaController::update_user_meta( $user_id, "printavo-status" , 'connected' );
							UserMetaController::update_user_meta( $user_id, "printavo-avatar_background_color" , $user["avatar_background_color"] );
							UserMetaController::update_user_meta( $user_id, "printavo-avatar_initials" , $user["avatar_initials"] );
							UserMetaController::update_user_meta( $user_id, "printavo-avatar_url_small" , $user["avatar_url_small"] );
							UserMetaController::update_user_meta( $user_id, "printavo-name" , $user["name"] );
							$notification = "Connected";
						}
					}
				}
				else{
					$notification = "Incorrect email or api token";
				}
			}
			else{
				$notification = "Incorrect email or api token";
			}
			
		}elseif(isset($_POST['printavo-connect-form']) &&  $_POST['printavo-connect-form'] == 'Disconnect' ){
							
			DB::update( "UPDATE students SET connected = 'Disconnect' WHERE student_id = " . $printavo_user_id  );
			UserMetaController::update_user_meta( $user_id, "printavo-status" , 'Disconnect' );
			
		}elseif(isset($_POST['setting-form']) &&  $_POST['setting-form'] == 'save' ){
			
			if( $users_role > 3 ){
				if( ! isset( $_POST['campus_list'] ) ){
					$_POST['campus_list'] = [];
				}
				GeneralSettingsController::update_option( 'campus_list', json_encode($_POST['campus_list']) );
			}
			DB::update( "UPDATE students SET campus = '". $_POST['campus'] ."' WHERE student_id = " . $printavo_user_id );
		}
		 
		$avatar_initials = UserMetaController::get_user_meta( $user_id, "printavo-avatar_initials" );
		
		$avatar_url_small = UserMetaController::get_user_meta( $user_id, "printavo-avatar_url_small" );
		
		$avatar_name = UserMetaController::get_user_meta( $user_id, "printavo-name" , Auth::user()->name );
		
		if( $avatar_initials == ""){
			$acronym = "";
			$words = explode(" ", $avatar_name);
			foreach ($words as $w) {
				$acronym .= $w[0];
			}
			$avatar_initials = $acronym;
		}
		
		$SettingsVariables = array(
			'printavo_email' => UserMetaController::get_user_meta( $user_id, "printavo-email" ),
			'printavo_api_token' => UserMetaController::get_user_meta( $user_id, "printavo-api-token" ),
			'printavo_status' => UserMetaController::get_user_meta( $user_id, "printavo-status" , "disconnected" ),
			'avatar_password' => UserMetaController::get_user_meta( $user_id, "printavo-password" ),
			'avatar_name' => $avatar_name,
			'avatar_background_color' => '#' . UserMetaController::get_user_meta( $user_id, "printavo-avatar_background_color" , "7951B9" ),
			'avatar_url_small' => $avatar_url_small,
			'avatar_initials' => $avatar_initials ,
			'notification' => $notification,
			'user_role'	=> (int)($users_role)
		);
		
		//check user is admin or not
		$user_id = Auth::id();
        $printavo_status = UserMetaController::get_user_meta( $user_id, "printavo-status");
		
		if( $printavo_status == "connected" ) {  
			$SettingsVariables['user_is_admin'] = 'yes';
		}
		
		if( isset($_POST['run_command']) && $_POST['run_command'] == "yes" ) {
			Artisan::queue('email:send', [
				'user' => 1, '--queue' => 'default'
			]);
		}
		
		$SettingsVariables['campus_list'] = json_decode(GeneralSettingsController::get_option( 'campus_list', '[]' ));
		
		return view( 'settings' , $SettingsVariables );
	}
}
