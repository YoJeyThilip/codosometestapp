<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

use App\Http\Controllers\UserMetaController;

class PrintavoConnected
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$user_id = Auth::id();
		
		$printavo_status = UserMetaController::get_user_meta( $user_id, "printavo-status" , "disconnected" );
		
        // Not connected to printavo
        if ( $printavo_status != 'connected' ) {
            return redirect('/settings');
        }
		
        return $next($request);
    }
}
