<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    /* Tambien se puede hacer con:
        if(auth()->check() && auth()->user()->types()->where('type_id', 1)->exists()) {
        return $next($request);
    } else {
        return redirect(route('notauthorized'));
    }
    */
    public function handle(Request $request, Closure $next): Response
    {
        if( Auth::check() && auth()->user()->types->contains('id', 1)) {
            return $next($request);
        } else {
            return redirect(route('notauthorized'));
        }
    }
}


