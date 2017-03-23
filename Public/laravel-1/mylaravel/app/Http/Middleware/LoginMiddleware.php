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
        // 检测请求是否具有session信息
        // session读取 session('name');
        // session设置 session(['uid'=>100,'name'=>'xiaohign']);
        if(!session('uid')){
            // 跳转到某个url
            return redirect('/login'); 
        }
        return $next($request);
    }
}
