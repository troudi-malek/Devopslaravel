<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = 'user')
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        // Get the authenticated user
        $user = Auth::user();

        // Check the role and block access based on the user's role
        if ($role === 'admin' && $user->role !== 'admin') {
            return response('Unauthorized', 403); // Block non-admins from accessing admin routes
        }

        if ($role === 'user' && $user->role !== 'user') {
            return response('Unauthorized', 403); // Block non-users from accessing user routes
        }

        // If the user has the required role, allow them to proceed
        return $next($request);
    }
}
