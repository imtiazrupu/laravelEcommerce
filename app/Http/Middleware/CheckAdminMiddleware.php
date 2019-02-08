<?php

namespace App\Http\Middleware;
use App\User;
use Closure;

class CheckAdminMiddleware
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
        if ($user['type'] == User::ADMIN || $user['type'] == User::SUPER_ADMIN ) {
            return $next($request);
        }
        if($user['type'] == User::CUSTOMER) {
            return redirect('/');
        }
        return redirect('admin-login');
    }
}
