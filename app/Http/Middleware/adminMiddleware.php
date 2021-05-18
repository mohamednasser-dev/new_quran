<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class adminMiddleware
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
          if (auth()->guard('web')->check() && auth()->guard('web')->user()->type == 'admin' || auth()->guard('web')->check() && auth()->guard('web')->user()->type == 'user' ) {
            return $next($request);
        } else {
            return redirect()->route('main_pge')->with('danger',trans('admin.preventAlert'));

        }
    }
}
