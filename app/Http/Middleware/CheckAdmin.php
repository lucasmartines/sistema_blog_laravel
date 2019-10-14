<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckAdmin
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
        $userRoles = Auth::user()->roles->pluck('name');
        
    

        if ( !$userRoles->contains('admin') ){
            
           
            return redirect('/permision-denied');
        }

      
        // if( $request->is('')){
        //      dd('t');

        //     return redirect('/dashboard');
        // };

        return $next($request);
    }
}
