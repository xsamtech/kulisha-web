<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class SetTimezone
{
    /**
     * Handle an incoming request.
     * -------------------------------------------------------
     * Applies the logged in user's time zone to each request.
     * -------------------------------------------------------
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in
        if (Auth::check()) {
            // Retrieve user's time zone
            $timezone = Auth::user()->timezone;
            
            // Set app time zone based on user
            config(['app.timezone' => $timezone]);
            date_default_timezone_set($timezone);  // Set global time zone (PHP)
        }

        return $next($request);
    }
}
