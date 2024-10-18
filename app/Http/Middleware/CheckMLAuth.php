<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMLAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()->ml_user_id) {
            return response()->view('pages.ml.oauth');
        }
        return $next($request);
    }
}
