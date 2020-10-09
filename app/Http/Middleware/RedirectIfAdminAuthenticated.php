<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class RedirectIfAdminAuthenticated

{

    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {

        if (!Auth::guard($guard)->check()) {

            return redirect(route('admin.login'));

        }

        return $next($request);

    }

}