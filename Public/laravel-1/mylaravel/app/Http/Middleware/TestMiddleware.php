<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleware
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
        // [2019-01-01 09:09:09]127.0.0.1--------/Admin/User/index

        // 记录当前请求的路径
        $path = $request->path(); // path()是laravel框架中用来获取路径的内置方法
        $str = '['.date('Y-m-d H:i:s').']'.$request->ip().'--------'.$request->path(); // 字符串拼接

        file_put_contents('request.log', $str."\r\n", FILE_APPEND); // 将字符串路径存入到日志文件中
        return $next($request); // 进入下一层的代码执行
    }
}
