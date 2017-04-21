<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        // 设置中间件限制 检测用户没有登录的话 会被返回到登录页面 登陆的话就会跳转到LoginController中dologin方法中登录成功的操作
        if(session('uid')) {
            return $next($request);
        }else{
            return redirect('/login');
        }

    }
}
