<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // 用户成功认证 重定向到 /home URI
    protected $redirectPath = '/dashboard';
    // 用户认证失败 重定向到 /auth/login URI
    protected $loginPath = '/login';


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
     * 登录操作
     */
    public function postLogin(Request $request)
    {   
        dd($request->all());
    }


    /**
     * 注册操作
     */
    public function postRegister(Request $request)
    {   
        $this->validator($request->all())->validate();

        event(new Registered($user));
    }
}
