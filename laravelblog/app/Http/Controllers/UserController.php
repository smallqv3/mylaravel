<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;



use Hash;

use App\Post;

class UserController extends Controller
{
    /**
     * 用户的添加页面显示
     */
    public function add()
    {
        return view('admin.user.add');
    }
    /**
     * 用户的插入动作
     */
    public function insert(Request $request)
    {
        // 表单验证(第三个参数就是用来填写验证之后的错误信息)
        $this->validate($request, [
            'username' => 'required|regex:/\w{8,20}/|unique:users|max:255', // unique:users => 验证用户名称唯一性,后面是对应的表名称
            'email' => 'required|email', // 验证邮箱
            'password' => 'same:repassword' // 验证密码
        ],[
            'username.unique' => '用户名称已经存在',
            'username.required' => '用户名不能省略',
            'username.regex' => '用户名规则不正确 请填写8~20位字母数字下划线',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式填入不正确',
            'password.same' => '两次密码不一致'

        ]);

        // 数据的插入
        $user = new User;
        $user -> username = $request->input('username');
        $user -> email = $request->input('email');
        $user -> password = Hash::make($request->input('password'));
        $user -> intro = $request->input('intro');

        // 随机的字符串标识
        $user -> remember_token = str_random(50);

        // 处理图片上传
        if ($request->hasFile('profile')) {

            // 文件的存放目录
            $path = './Uploads/'.date('Ymd');
            // 获取文件后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();
            // 文件的名称
            $fileName = time().rand(100000, 999999).'.'.$suffix;
            $request->file('profile')->move($path, $fileName);
            $user -> profile = trim($path.'/'.$fileName, '.');
        }
        // 执行插入
        if($user->save()) {
            return redirect('/user/index')->with('info', '成功添加');
        }else{
            return back()->with('info', '添加失败'); // 失败回退
        }
    }

    /**
     * 用户的列表显示
     */
    public function index(Request $request)
    {

        // 1.每页显示的数量 调整
        // 2.检索的条件
        // $keyword = $request->input('keyword');
        // // 检测
        // if(empty($keyword)) {
        //     数据的分页显示
        //     $users = User::orderBy('id', 'desc')->paginate($request->input('num', 10));
        // }else{
        //     $users = User::orderBy('id', 'desc')
        //         ->where('username', 'like', '%'.$keyword.'%')
        //         ->paginate($request->input('num', 10));
        // }

        // $users = User::orderBy('id', 'desc')
        //         ->where(function($query) use ($request){
        //         // $query:laravel框架中自带的依赖注入变量 在一个函数内部使用php全局变量是没法直接去使用:再这匿名函数中用global实现不了全局,必须使用use ($request),这是语法限定
        //             // 获取关键字
        //             $keyword = $request->input('keyword');
        //             // 检测参数
        //             if(!empty($keyword)) {
        //                 $query->where('username', 'like', '%'.$keyword.'%');
        //             }
        //         })
        //         ->paginate($request->input('num', 10));


        // return view('admin.user.index', ['users'=>$users, 'request'=>$request]); // 分配之后的前端分页操作:<!-- <div id="pages">{!! $users->appends($request->only['num', 'keyword'])->render() !!}</div> -->
        // 恢复被删除的软删除的模型实例
        // $users = new User;
        // $users->restore();

        // 数据查询
        $users = User::orderBy('id', 'desc')->get();
        // 分配变量 解析模板
        return view('admin.user.index', ['users'=>$users]); // assign('users', $users); $this->display('index');
    }


    /**
     * 用户的修改
     */

    public function edit($id)
    {
        // 读取用户的信息
        $user = User::findOrFail($id); // findOrFail():免去了对ID的检测动作,直接显示出检测之后的结果
        // 展现用户的信息
        return view('admin.user.edit', ['user'=>$user]);
    }



    /**
     * 用户的更新操作
     */
    public function update(Request $request)
    {
        // 读取用户的模型
        $user = User::findOrFail($request->input('id'));
        $user -> username = $request->input('username');

        $user -> email = $request->input('email');
        $user -> intro = $request->input('intro');

        // 处理图片上传
        if ($request->hasFile('profile')) {

            // 文件的存放目录
            $path = './Uploads/'.date('Ymd');
            // 获取文件后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();
            // 文件的名称
            $fileName = time().rand(100000, 999999).'.'.$suffix;
            $request->file('profile')->move($path, $fileName);
            $user -> profile = trim($path.'/'.$fileName, '.');
        }
        if($user->save()) {
            return redirect('/user/index')->with('info', '成功更新');
        }else{
            return back()->width('info', '更新失败');
        }
    }

    /**
     *
     */
    public function delete($id)
    {
        // 创建模型
        $user = User::findOrFail($id);

        // 读取用户的头像信息
        $profile = $user->profile;
        // 检测
        $path = '.'.$profile;
        if(file_exists($path)) {
            // 删除头像图片文件夹中头像信息
            unlink($path); // $profile=>/Uploads/20170413/1492066135274929.jpg 如果不加点指明他的正确访问路径,'/'在服务系统中是被默认成根目录
        }

        // 删除
        if($user->delete()) {
            return back()->with('info', '成功删除');
        }else{
            return back()->with('info', '删除失败');
        }
    }


    // public function ajax()
    // {
    //     return "this is ajax return";
    // }

    // public function html()
    // {
    //     return view('mytextajax.html');
    // }


    /**
     * 前台发布者文章显示
     */
    public function intro($id)
    {
        
        // 解密 获取ID
        // $uid = base64_decode($id);
        $uid = $id; 
        // 创建模型
        $posts = Post::where('isdelete', 0)->where(function($query) use ($uid){
            $query->where('user_id', '=', $uid);
        })->paginate(10);
        
        $userid = User::findOrFail($id);
        return view('home.intro', ['posts'=>$posts, 'userid'=>$userid]);
    }
}
