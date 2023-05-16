<?php

namespace App\Classes;

use Closure;
use Illuminate\Http\Request;

class CheckSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('id')) {
            return redirect()->back()->with('error', 'Please Login');
        }

        return $next($request);
    }
}
