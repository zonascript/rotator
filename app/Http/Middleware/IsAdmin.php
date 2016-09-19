<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;

class IsAdmin
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
        $admin = Admin::all()->first();
        if( Session::get('password') == $admin->password )
        {
            return $next($request);
        }
        else
        {
            return redirect()->guest('admin/login');
        }
    }

}
