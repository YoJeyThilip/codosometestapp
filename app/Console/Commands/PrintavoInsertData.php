<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Http\Controllers\UserMetaController;

use Auth;

use DB;

use GuzzleHttp\Client;

class PrintavoInsertData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PrintavoInsertData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'schedules Printavo insert data event for every hours';

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
    public static function handle()
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
			
			$commission_rates = DB::select("select * from commission_rates");
			
			$highest_value = $lowest_value =  $highest_rate =  $lowest_rate = 0 ;
			
			foreach( $commission_rates as $commission_rate ){
				
				$shirts_range = explode( "-" , $commission_rate->shirts );
				
				if( $highest_value < $shirts_range[1] ){
					$highest_value = $shirts_range[1] ;
					$highest_rate = $commission_rate->rate ;
				}
				
				if( $lowest_value > $shirts_range[0] ){
					$lowest_value = $shirts_range[0] ;
					$lowest_rate = $commission_rate->rate ;
				}
				
			}
			
			do {
			
				$response = $client->request('GET', 'https://www.printavo.com/api/v1/orders?email='. $email .'&token='. $api_token .'&page='. $current_orders_page .'&per_page=25', [
					'http_errors' => false
				]);
				
				$responsearray = json_decode( $response->getBody(), true );
					 
				$orders = $responsearray['data'];
				
				$total_orders_pages = $responsearray['meta']['total_pages'];
				
				foreach( $orders as $order ) {
					$order_id = $order['id'];
					$invoice_no = $order['visual_id'];
					$due_date = $order['due_date'];
					$order_nickname = $order['order_nickname'];
					$customer_name = $order['customer']['full_name'];
					$orderstatus = $order['orderstatus']['name'];
					$order_status_color = $order['orderstatus']['color'];
					$payment_status = $order['stats']['paid'];
					$student_id = $order['user_id'];
					$student_name = $order['user']['name'];
					$order_total = $order['order_total'];
					$created_at = $order['created_at'];
					$total_quantity = 0;
					$commision = 0;
					
					if( $payment_status ){
						$payment_status = "Paid";
					}
					else{
						$payment_status = "Unpaid";
					}
			
					foreach( $order['lineitems_attributes'] as $item ){
						$total_quantity = $total_quantity + $item['total_quantities'];
					}
					
					if( $total_quantity > $highest_value ){
						$commision = $highest_rate;
					}
					else{
						
						foreach( $commission_rates as $commission_rate ){
							
							$shirts_range = explode( "-" , $commission_rate->shirts );
							
							if ( $shirts_range[0] <= $total_quantity && $shirts_range[1] >= $total_quantity ){
								$commision = $commission_rate->rate;
								break;
							}
							
						}
					}
					
					$is_exist = DB::select("select order_id from orders where order_id = ".$order_id);
					if( isset($is_exist[0]->order_id) ){
						break 2; 
					}
					else{
						if( strtotime($created_at) > strtotime('2018-06-01T02:02:38.156Z') ){
							DB::insert("insert into orders (order_id,invoice_no,due_date,nic_name,customer,order_status,order_status_color,payment_status,student_id,student_name,order_total,created_at,total_quantity,commision) values (:order_id,:invoice_no,:due_date,:nic_name,:customer,:order_status,:order_status_color,:payment_status,:student_id,:student_name,:order_total,:created_at,:total_quantity,:commision)",
								[
									'order_id' 			=> $order_id ,
									'invoice_no' 		=> $invoice_no ,
									'due_date' 			=> $due_date ,
									'nic_name' 			=> $order_nickname,
									'customer' 			=> $customer_name,
									'order_status' 		=> $orderstatus,
									'order_status_color'=> $order_status_color,
									'payment_status'	=> $payment_status,
									'student_id'		=> $student_id,
									'student_name'		=> $student_name,
									'order_total'		=> $order_total,
									'created_at'		=> $created_at,
									'total_quantity'	=> $total_quantity,
									'commision'			=> $commision
								]
							);
						}else{
							DB::insert("insert into orders (order_id,invoice_no,due_date,nic_name,customer,order_status,order_status_color,payment_status,student_id,student_name,order_total,created_at,total_quantity,commision,payed) values (:order_id,:invoice_no,:due_date,:nic_name,:customer,:order_status,:order_status_color,:payment_status,:student_id,:student_name,:order_total,:created_at,:total_quantity,:commision,:payed)",
								[
									'order_id' 			=> $order_id ,
									'invoice_no' 		=> $invoice_no ,
									'due_date' 			=> $due_date ,
									'nic_name' 			=> $order_nickname,
									'customer' 			=> $customer_name,
									'order_status' 		=> $orderstatus,
									'order_status_color'=> $order_status_color,
									'payment_status'	=> $payment_status,
									'student_id'		=> $student_id,
									'student_name'		=> $student_name,
									'order_total'		=> $order_total,
									'created_at'		=> $created_at,
									'total_quantity'	=> $total_quantity,
									'commision'			=> $commision,
									'payed'			=> 'Yes'
								]
							);
						}
					}
				}
				
				$current_orders_page++;
				
			}while ($current_orders_page <= $total_orders_pages);
			
			$total_users_pages;
			$current_users_page = 1;
			
			do {
			
				$response = $client->request('GET', 'https://www.printavo.com/api/v1/users?email='. $email .'&token='. $api_token .'&page='. $current_users_page .'&per_page=25', [
					'http_errors' => false
				]);
				
				$responsearray = json_decode( $response->getBody(), true );
					 
				$students = $responsearray['data'];
				
				$total_users_pages = $responsearray['meta']['total_pages'];
				
				foreach( $students as $student ) {
					$student_id = $student['id'];
					$student_name = $student['name'];
					$avatar_background_color = $student['avatar_background_color'];
					$avatar_initials = $student['avatar_initials'];
					$avatar_url_small = $student['avatar_url_small'];
					$is_exist = DB::select("select student_id from students where student_id = ".$student_id);
					
					if( isset($is_exist[0]->student_id) ){
						break 2; 
					}
					else{
						DB::insert(
							"insert into students (student_id,student_name,avatar_background_color,avatar_initials,avatar_url_small) values (:student_id,:student_name,:avatar_background_color,:avatar_initials,:avatar_url_small)",
							[
								'student_id' => $student_id ,
								'student_name'=>$student_name,
								'avatar_background_color'=>$avatar_background_color,
								'avatar_initials'=>$avatar_initials,
								'avatar_url_small'=>$avatar_url_small,
							]
						);
					}
				}
				
				$current_users_page++;
				
			}while ($current_users_page <= $total_users_pages);
		}
		
	}
}
