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
    public function handle($request, Closure $next, ...$id_roles)
    {
        if(in_array($request->user()->id_role, $id_roles))
        {
            return $next($request);
        }
        return redirect('login');
    }
}
