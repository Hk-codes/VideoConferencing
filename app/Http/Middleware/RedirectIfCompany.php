<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfCompany
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and has a company role
        if (Auth::check() && Auth::user()->role === '2') {
            return redirect()->route('companies.index'); // Redirect to companies index
        }

        return $next($request);
    }
}