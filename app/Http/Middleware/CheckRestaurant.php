<?php

namespace App\Http\Middleware;

use Closure;

class CheckRestaurant
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
        if(auth()->user()->type == 0){
            return $next($request);
          }
          // elseif(auth()->user()->type == 1 && auth()->user()->active == 1){
          //   return $next($request);
          // }

            return redirect()->route('orders.index');
    }
}
