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
            // header('location:' . url('admin/login'));
            // exit();
            return response()->json(['msg' => '请登录!']);
            exit();
        }

        return $next($request); //继续执行
    }
}
