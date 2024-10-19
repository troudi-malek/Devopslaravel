<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PreventAdminAccessToUserRoutes
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
        // If the user is authenticated and is an admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect('/admin/transports')->with('error', 'Admins cannot access this page.');
        }

        // If not an admin, continue processing the request
        return $next($request);
    }
}
