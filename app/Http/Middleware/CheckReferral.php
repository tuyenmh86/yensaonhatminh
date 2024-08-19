<?php

namespace App\Http\Middleware;

use Closure;

class CheckReferral
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
        $response = $next($request);
        $time = time() + 60 * 60 * 24*30; //One day
        if( $request->hasCookie('referral')) {
            return $next($request);
        }
        else {
            if( $request->query('ref') ) {

                return $response->withCookie(cookie()->forever('referral', $request->query('ref')));
            }

        }
        return $response;
    }
}
