<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * 显示功能
     */
    // public function show(){
    // 	return 'aaaaaaaaaaaa';
    // }

    /**
     * 用户的更改操作
     */
    public function edit($id){
    	echo '这里是用户的更新操作..................... 需要更新的ID为'.$id;
    }
    /**
     * 用户的删除操作
     */
    public function delete($id){
    	// echo '这里是用户的删除操作................ 删除的用户ID为'.$id;
    	// 通过别名来创建url
    	echo route('udelete', ['id'=>100]); // 使用路由中设置的别名可为该命名路由生成对应的URL:$redirect = redirect()->route('profile'); // 跳转指定路径
    }

    /**
     * 用户的升级操作
     */
    public function shengji(){

    	echo '用户的升级操作.............';
    }
    /**
     * 用户的禁用操作
     */
    public function jinyong(){
    	echo '用户的禁用操作...................';
    }


    /**
     * 用户的请求操作
     */
    public function qingqiu(Request $request) //Request:注入操作以及php反射,需要什么对象,可把此对象的类型约束传递过去,并且可以在方法中去使用  框架内部则会自动创建这个对象,再把此对象传递给方法去完成功能实现   php反射:好比一面镜子,它可告知当前的方法需要哪些参数,而框架则会去帮你把这些对象进行创建,并且把获取到的参数传递给对象中的成员方法   
    {

    	// 请求的方法获取
    	// $method = $request->method();
    	// 检测请求方法
    	// $res = $request->isMethod('get');
    	// 请求的路径
    	// $path = $request->path(); // 请求行路径中的 / 之后 ? 之前的路径进行获取
    	// 获取完整的url
    	// $url = $request->url();
    	// 获取请求的ip
    	// $ip = $request->ip();
    	// 获取端口
    	// $port = $request->getPort();


    	// 参数的获取
    	// $username = $request->input('username'); // input()括号中放入需要提取的参数名称
    	// $password = $request->input('password');
    	// print_r($username);
    	// echo '<br>';
    	// print_r($password);

    	// 设置默认值
    	// $res = $request->input('vip', '10'); // 检测参数是否为空,空的话用默认值,不空的话用你所穿的参数:I('get.name', 'xiaohigh')
    	// 检测请求参数是否存在
    	// $res = $request->has('username'); // 包含此参数就会返回true 或者 1,不包含则返回false 或者 0
    	// 获取所有的请求参数
    	// $res = $request->all();
    	// 获取其中的一部分参数
    	// $res = $request->only(['username', 'password']); // 只获取部分参数
    	// 剔除不需要的参数
    	// $res = $request->except(['username', 'password']); // 剔除部分参数
    	// 获取请求头信息
    	// $res = $request->header('Connection'); // 括号内不放键名,则获取全部的Request Headers头信息,放入键名的话,则只获取对应键名的头信息

    	print_r($res);
    }

    public function form()
    {
    	return view('user');
    }

    public function insert(Request $request)
    {
    	// 获取请求的post参数
    	$username = $request->input('username');
    	print_r($username);
    }

    /**
     * 显示form表单
     */
    public function show()
    {
    	return view('upload');
    }


    /**
     * 文件上传操作
     */
    public function upload(Request $request)
    {	

    	// 检测文件是否上传
    	// $res = $request->hasFile('profile'); // 返回的结果正确:true 或者 1 返回的错误结果:false 或者 0
    	// php脚本中的相对路径,都是相对于当前正在请求的文件(所有的相对路径对于mvc框架都是相对于网站根目录index.php(laravel中的网站根目录在public/index.php))
    	if($request->hasFile('profile')){
    		$request->file('profile')->move('./upload', 'xiaohigh.jpg'); // 将文件移动到指定位置 move()中的两个参数:第一个参数文件夹路径,第二个参数图片名称
    	}
    }

    /**
     * cookie操作
     */
    public function cookie()
    {
    	// 写入cookie setcookie
    	// \Cookie::queue('name', 'xdl', 20); // 括号中的三个参数:第一个是键名,第二个是键值,第三个是cookie生命周期时间(时间单位分钟)
    	return response('aaaaaaaaaaa')->withCookie('xiongdilian', 'zhenbang', 5); // withCookie括号中的三个参数:第一个是键名,第二个是键值,第三个是cookie生命周期时间(时间单位分钟) 注意:response('')括号中必须得有值,可以自定义值,值为空也行不能写成response()这样,否则会报错

    	// 读取
    	// $res = \Cookie::get('name');

    	// $res = $request->cookie('xiongdilian');
    }

    /**
     * 内存的演示
     */
    public function flash()
    {
    	return view('flash');
    }
    public function doflash(Request $request)
    {
    	// print_r($request->all());
    	$request->flash(); // 将请求过来的参数 都闪存起来,一般用作用户填写表单信息漏填之后,return back()跳转回原来页面信息全部清空且重新填写,这个时候之前填写的信息就可以读取闪存了,可以减少了用户正确信息重复填写的麻烦
    	// 跳转到原来页面重新填写参数
    	return back(); // return back()->with():with括号中第一个参数是键名,第二个参数是键值
    }

    /**
     * 实例:闪存信息自定义方法读取闪存(相当于把闪存信息存入了在这个方法中一次,闪存必须先读取,之后才能生效)
     */
    public function old()
    {
    	print_r(old('username')); // 系统定义的函数名称
    }

    /**
     * 自定义闪存 
     */
    public function flash_1()
    {
    	// 手动闪存数据
    	\Session::flash('name', 'xiaohigh'); // 第一个参数键名称,第二参数是键值
    }

    /**
     * 读取闪存
     */
    public function get_flash()
    {
    	echo session('name'); // 系统定义的函数名称
    }

    /**
     * 响应
     */
    public function response()
    {	
    	// 返回字符串类型
    	// return "aaaaaaaaaaaaaa";

    	// 返回并设置cookie
    	// return response('')->withCookie('name', '兄弟连', 10); // withCookie括号中的三个参数:第一个是键名,第二个是键值,第三个是cookie生命周期时间(时间单位分钟) 注意:response('')括号中是对响应体做一个数据返回,必须得有值,可以自定义值,值为空也行不能写成response()这样,否则会报错(当然只对于这个方法操作)

    	// 返回json字符串:在线解析json网址:http://json.parser.pnline.fr(强哥推荐进行转码的网站)
    	// return response()->json(['name'=>'兄弟连', 'age'=>11, 'position'=>'昌平区']);

    	// 文件下载:绝对路径以及相对路径	return response()->download('./upload/xiaohigh.jpg'); 
    		// 相对路径:在整个框架脚本当中,所有的相对路径相对的都是入口文件index.php开始的路径,脚本中的相对路径是相对当前正在请求的文件

    	// 页面跳转:网站内部路径
    		// return redirect('/file');
    	// 网站外部路径:
    		// return redirect('http://www.baidu.com');

    	// 模板解析
    	// return view('response'); return response()->view('response.index'); // response目录下的index文件

    	// 设置响应头信息
    	// return response('a')->header('name', 'lamp兄弟连'); // header括号中第一个参数是键名名称,第二个参数是键值,注意:response('')括号中是对响应体做一个数据返回,必须得有值,可以自定义值,值为空也行不能写成response()这样,否则会报错(当然只对于这个方法操作)
    	
    	// 设置返回内容并跳转
    	// return 'aaaaaaaaaaa<script>
					// setTimeout(function(){
					// 	location.href="/file";
					// },3000)
    	// 		</script>';

    }

    /**
     * 模板解析
     */
    public function view()
    {
    	// 解析模板
    	// return view('xdl');

    	// 划分目录 结构:目录.页面
    	// return view('user.index');

    	// 解析模板并分配数据
    	// substr()
    	// $arr = ['name'=>'xdl', 'age'=>11, 'position'=>'北京昌平区'];
    	// return view('user.xdl', ['xdl'=>$arr]); // 第一个参数是页面路径,第二个参数是关联数组数据信息,第二个参数中的数据形式类似tp中$this->assign('键名', '键值')
    }

    /**
     * blade的使用
     */
    public function blade()
    {
    	// 这里的路径分隔要使用. (.相当于这里代替了/的作用)
    	return view('admin.user.index', [
    		'title'=>'用户的列表页',
    		'username'=>'xdl',
    		'page'=>'<a href="/1.html">1</a><a href="/2.html">2</a><a href="/3.html">3</a>',
    		]); 
    }
}
