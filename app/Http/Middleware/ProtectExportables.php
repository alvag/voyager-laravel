<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Http\Request;

class ProtectExportables
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( ! auth()->check() || auth()->user()->role_id !== User::ADMIN) {
            return redirect('/admin');
        }
        return $next($request);
    }
}
