<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Hash;


class LoginController extends Controller
{
    /**
     * 显示登录的页面
     */
    public function login()
    {
        return view('admin.login.login');
    }
    /**
     * 执行登录操作
     */
    public function dologin(Request $request)
    {
        // 实例化用户对象 $request->username = $request->input('username')
        $user = User::where('username', $request->username)->firstOrFail();
        // 获取用户信息
        if(Hash::check($request->password, $user->password)) {
            // 写入登录状态
            session(['uid'=>$user->id]);
            return redirect('/admin');
        }else{
            return back();
        }
    }
    /**
     * 登出操作
     */
    public function logout(Request $request)
    {
        // 登出操作 从 Session 中移除数据即可
        $request->session()->flush();
        return redirect('/login');
    }


}
