<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\check;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check() && $request->is('admin/login')) {
            return redirect()->intended('/admin/dashboard');
        }

        // $adminEmail = env('ADMIN_EMAIL', 'admin@example.com');
        // $adminPassword = env('ADMIN_PASSWORD', 'Passwordtest123@');

        // if ($request->getUser() !== $adminEmail || $request->getPassword() !== $adminPassword) {
        //     return response('Unauthorized.', 401)
        //         ->header('WWW-Authenticate', 'Basic');
        // }

        if (!$request->is('admin/login')  && !Auth::check()) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
