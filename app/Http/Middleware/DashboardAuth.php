<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class DashboardAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated via session
        if (!Auth::guard('web')->check()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Authentication required'
                ], 401);
            }
            return redirect('/login')->with('error', 'Please log in to access the dashboard.');
        }

        $user = Auth::guard('web')->user();

        // Ensure user has a valid role
        if (!$user->role || !in_array($user->role, ['admin', 'client', 'instructor', 'teacher', 'student'])) {
            Auth::logout(); // Log out invalid user
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid user role'
                ], 403);
            }
            return redirect('/login')->with('error', 'Invalid user permissions. Please contact support.');
        }

        // Ensure user account is active
        if (isset($user->is_active) && !$user->is_active) {
            Auth::logout(); // Log out inactive user
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Account is inactive'
                ], 403);
            }
            return redirect('/login')->with('error', 'Your account has been deactivated. Please contact support.');
        }

        return $next($request);
    }
}