<?php

namespace App\Http\Middleware;
use App\User;
use Closure;

class CheckSuperAdmin
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
        $user = auth()->user();
        return $user;
        if ($user['type'] == User::SUPER_ADMIN) {
            return $next($request);
        }
        return redirect('admin-login');
    }
}
