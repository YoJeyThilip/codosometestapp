<?php

namespace App\Http\Middleware;

use Auth;

use Closure;

use App\Http\Controllers\UserMetaController;

class Permission
{
    
    public function handle( $request, Closure $next, $role )
    {
				
		$user_id = Auth::id();
	
        $printavo_status = UserMetaController::get_user_meta( $user_id, "printavo-status" , "disconnected" );
		
		if( $printavo_status == "Disconnect" ) {
			 return $next($request);
		}
	   
	   
    }
	
}
