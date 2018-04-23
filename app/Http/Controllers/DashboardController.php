<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class DashboardController extends Controller
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

		$client = new Client();
			
		$Printavo_token = json_decode( $_COOKIE['Printavo_token'] );
		
		$response = $client->request('GET', 'https://www.printavo.com/api/v1/users/'. $Printavo_token->id .'?email='. $Printavo_token->email .'&token='. $Printavo_token->token , [
			'http_errors' => false
		]);
		
		$dashboardvariables = json_decode( $response->getBody(), true );
			
		return view( 'dashboard' , $dashboardvariables );
	}
}