<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class install
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(env('INSTALL')==""){
            return redirect('install');
        }
        return $next($request);
    }
}
