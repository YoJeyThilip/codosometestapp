<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

use Auth;

use DB;

class CalculatorController extends Controller
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
		
		$product_names = DB::select("SELECT product FROM common_items" );
		
		$brand_names = DB::select("SELECT brand FROM common_items" );
		$brand_names_unquie = array();
		
		foreach($brand_names as $brand_name){
			
			$brand_names_unquie[] = $brand_name->brand;
			
		}
		$brand_names = array_unique($brand_names_unquie);
		
		$quantities = DB::select("SELECT shirts FROM commission_rates" );
		
		$front_backs = DB::select("SELECT front,back FROM calculator_fabric" );
		
		$front = $back = array();
		foreach($front_backs as $front_back){
			
			$front_nunquie[] = $front_back->front;
			$back_nunquie[] = $front_back->back;
			
		}
		$front = array_unique($front_nunquie);
		$back = array_unique($back_nunquie);
		
		$add_on = DB::select("SELECT add_on FROM addons" );
		
		$common_items = DB::select("SELECT * FROM common_items" );
		
		$commission_rates = DB::select("SELECT * FROM commission_rates" );
		
		$addons = DB::select("SELECT * FROM addons" );
		
		$calculator_fabric = DB::select("SELECT * FROM calculator_fabric" );
		
		$calculator_fabric = json_encode($calculator_fabric);

		$common_items = json_encode($common_items);
		
		$commission_rates = json_encode($commission_rates);
		
		$addons = json_encode($addons);
		
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
		
		
		$CalculatorVariables = array(
			'printavo_email' => $email,
			'addons' => $addons,
			'commission_rates' => $commission_rates,
			'common_items' => $common_items,
			'calculator_fabric' => $calculator_fabric,
			'product_names' => $product_names,
			'quantities' => $quantities,
			'brand_names' => $brand_names,
			'add_ons' => $add_on,
			'fronts' => $front,
			'backs' => $back,
			'printavo_status' => $printavo_status,
			'avatar_name' => $avatar_name,
			'avatar_background_color' => '#' . $avatar_background_color,
			'avatar_url_small' => $avatar_url_small,
			'avatar_initials' => $avatar_initials ,
			'notification' => '',
			'user_role'	=> (int)($users_role[0]->role)
		);
		
		return view( 'Calculator' , $CalculatorVariables );
		
	}
	
}
