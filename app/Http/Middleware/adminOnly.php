<?php

namespace App\Http\Middleware;

use Closure;

class adminOnly
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
        if(auth()->user()->type != 'Admin'){
            return redirect(route('dashboard'))->with('mssg',"You have tried to access unauthorized page. Your actions have been recoreded and sent to the admin.");
       }
        return $next($request);
    }
}
