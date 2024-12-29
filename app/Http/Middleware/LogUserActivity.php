<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Log user activity
            Log::info('User Activity', [
                'user_id' => Auth::id(),
                'url' => $request->url(),
                'method' => $request->method(),
                'ip_address' => $request->ip(),
                'timestamp' => now()
            ]);
        }

        return $next($request);
    }
}
