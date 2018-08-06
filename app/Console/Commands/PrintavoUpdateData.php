<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Http\Controllers\UserMetaController;

use Auth;

use DB;

use GuzzleHttp\Client;

class PrintavoUpdateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PrintavoUpdateData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'schedules Printavo Update data event for every 24 hours';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		
        $users_id = DB::select("SELECT id FROM users WHERE role > 3");
		$email;
		$api_token;
		
		foreach( $users_id as $user_id ) {
			$printavostatus = UserMetaController::get_user_meta( $user_id->id, "printavo-status" );
			
			if( $printavostatus == "connected" ) {
				$email = UserMetaController::get_user_meta( $user_id->id, "printavo-email" );
				$api_token = UserMetaController::get_user_meta( $user_id->id, "printavo-api-token" );
				break;
			}
		}
		
		if( isset($email) && isset($api_token) ){
			$client = new Client();
			
			$total_orders_pages;
			$current_orders_page = 1;
			
			$hour = 12;

			$today              = strtotime($hour . ':00:00');
			$dayBeforeYesterday = strtotime('-2 day', $today);
			
			do {
			
				$response = $client->request('GET', 'https://www.printavo.com/api/v1/orders?email='. $email .'&token='. $api_token .'&page='. $current_orders_page .'&per_page=25', [
					'http_errors' => false
				]);
				
				$responsearray = json_decode( $response->getBody(), true );
					 
				$orders = $responsearray['data'];
				
				$total_orders_pages = $responsearray['meta']['total_pages'];
				
				foreach( $orders as $order ) {
					$order_id = $order['id'];
					$orderstatus = $order['orderstatus']['name'];
					$order_status_color = $order['orderstatus']['color'];
					$payment_status = $order['stats']['paid'];
					$created_at = $order['created_at'];
					
					if( $payment_status ){
						$payment_status = "Paid";
					}
					else{
						$payment_status = "Unpaid";
					}
					
					$is_exist = DB::select("select order_id from orders where order_id = ".$order_id);
					if( isset($is_exist[0]->order_id) ){
						
						if( strtotime($created_at) > $dayBeforeYesterday ){
							DB::update("UPDATE orders SET ".
											"order_status = :order_status, ".
											"order_status_color = :order_status_color, ".
											"payment_status = :payment_status ".
										"WHERE order_id = :order_id ",
								[
									'order_id'			=> $order_id,
									'order_status' 		=> $orderstatus,
									'order_status_color'=> $order_status_color,
									'payment_status'	=> $payment_status
								]
							);
						}else{
							break 2; 
						}
					}
				}
				
				$current_orders_page++;
				
			}while ($current_orders_page <= $total_orders_pages);
			
		}
		
	}
}
