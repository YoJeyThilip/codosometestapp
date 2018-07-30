<?php

namespace App\Http\Middleware;

use Auth;

use Closure;

use App\Http\Controllers\UserMetaController;

class Permission
{
    
    public function handle()
    {
				
		$user_id = Auth::id();
        $printavo_status = UserMetaController::get_user_meta( $user_id, "printavo-status");
		$email = UserMetaController::get_user_meta( $user_id, "printavo-email" );
		$id = UserMetaController::get_user_meta( $user_id, "printavo_user_id" );
		
		print_r($printavo_status);
		print_r($email);
		print_r($user_id);
		print_r($id);
		
		if( $printavo_status == "Disconnect" ) { 
			//return redirect('/settings');
		}
	   
	   
    }
	
}
