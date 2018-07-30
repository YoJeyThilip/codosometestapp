<?php

namespace App\Http\Middleware;

use Auth;

use Closure;

use App\Http\Controllers\UserMetaController;

class Permission
{
    
    public function handle($request, Closure $next, $role)
    {
			die("test");
				
		$user_id = Auth::id();
	
        $printavo_status = UserMetaController::get_user_meta( $user_id, "printavo-status" , "disconnected" );
	   
	    print_r($printavo_status);
	   
    }
	
}
