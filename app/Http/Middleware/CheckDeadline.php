<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckDeadline
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
        if(!Auth::check()){
            return redirect('/login');
        }

        if (auth()->user()->role == 2)
        {
            return $next($request);
        }
        return redirect('/unauthorized');
    }
}
