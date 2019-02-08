<?php

namespace App\Http\Middleware;
use App\User;
use Closure;

class CheckCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->check() || auth()->user()['type'] !== User::CUSTOMER) {
            return redirect('customer-login-check');
        }
        return $next($request);

    }
}
