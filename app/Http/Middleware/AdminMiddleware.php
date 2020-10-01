<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    protected $auth;
    /**
     *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * 
     */

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if (Auth::user()->level == 2) {
            abort(403, 'Unauthorized action.');
        }

        // if (Auth::user()->level == "1") {
        //     abort(403, 'Unauthorized action.');
        // }
        return $next($request);
    }
}
