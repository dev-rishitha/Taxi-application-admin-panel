<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }
        return $next($request);
    }
}
