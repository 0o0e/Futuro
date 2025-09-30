<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $adminEmail = env('ADMIN_EMAIL', 'admin@example.com');
        $adminPassword = env('ADMIN_PASSWORD', 'supersecret');

        if ($request->getUser() !== $adminEmail || $request->getPassword() !== $adminPassword) {
            return response('Unauthorized.', 401)
                ->header('WWW-Authenticate', 'Basic');
        }

        return $next($request);
    }
}
