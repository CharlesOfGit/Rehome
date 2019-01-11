<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserLogin
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
        if (!session()->has('centeruserid')) {
            //去登录页面
            header('location:' . url('UserLogin'));
            exit();
        }
        return $next($request); //继续执行
    }
}
