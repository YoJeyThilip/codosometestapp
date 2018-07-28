<?php

namespace App\Http\Middleware;

use App\Http\Controllers\UserMetaController;

use Auth;

use Closure;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
		
		$user_id = Auth::id();
      
		$printavo_status = UserMetaController::get_user_meta( $user_id, "printavo-status" , "disconnected" );
		
		print_r($printavo_status);
		
        return $next($request);
    }
}
