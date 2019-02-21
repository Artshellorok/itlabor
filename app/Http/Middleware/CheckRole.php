<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (auth()->user()->role()) {
            if (!auth()->user()->role(...$roles)) {
                return abort('403');
            }
        }
        else{
            return redirect('/profile');
        }
        return $next($request);
    }
}
