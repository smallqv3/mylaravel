<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Auth;
use App\User;


class AuthController extends Controller
{
    //
    /**
     * 登录页面
     */
    public function getLogin()
    {
    	return view('admin.auth.login');
    }
    /**
     * 注册页面
     */
    public function getRegister()
    {
    	return view('admin.auth.register');
    }
    /**
     * 处理认证
     *
     * @return Response
     */
    public function authenticate()
    {
        // 尝试登录
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            // 认证通过...
            return redirect()->intended('dashboard');
        }
    }
    /**
     * 登录操作
     */


    public function postLogin(Request $request)
    {	
    	// 接收参数
    	$username = $request->input('username');
    	$password = $request->input('password');

    	// 表单验证(第三个参数就是用来填写验证之后的错误信息)
        $this->validate($request, [
            'username' => 'required|regex:/\w{8,20}/',
            'password' => 'same:repassword' // 验证密码
        ],[
            'username.required' => '用户名不能省略,请输入',
            'username.regex' => '用户名规则不正确 请填写8~20位字母数字下划线',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式填入不正确',
            'password.same' => '两次密码不一致'

        ]);
    }
}
