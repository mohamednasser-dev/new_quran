<?php

namespace App\Http\Middleware;

use Closure;

class student
{
    public function handle($request, Closure $next)
    {
        if (\Auth::guard('student')->check()) {
            $request->id = \Auth::guard('student')->user()->id;
            return $next($request);
        } else {
            session('danger', 'you are not authorize');
            return back();
        }
    }
}
