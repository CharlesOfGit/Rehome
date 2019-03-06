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
            // header('location:' . url('UserLogin'));
            // return redirect('Home.Account.User.login');
            // return response('Unauthorized.', 401);
            // return response()->json(['error' => 'Unauthenticated.'], 401);
            // return redirect("UserLogin");

            if ($request->expectsJson()) {
                return response()->json(['msg' => '请登录']);
            }
        }

        return $next($request); //继续执行
    }
}
