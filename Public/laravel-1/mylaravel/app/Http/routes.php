<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// 打印sql语句
Event::listen('illuminate.query', function(){
	print_r($query);
});

Route::get('/', function () {
    return view('welcome'); // 请求 / 根路径,指向welcome页面 
});

Route::get('/test', function () {
    echo "这是一个测试............."; // 请求 /test 路径,输出
});

Route::get('/admin/user', function () {
    echo "这是后台的一个页面............."; // 请求 /test 路径,输出
});

//get形式的路由
Route::get('/qixi', function () {
    echo '这是一个get形式的路由'; 
});

//post形式的路由
Route::post('/insert', function () {
    echo '这是一个添加操作';
});

//显示html表单页路由
Route::get('/form', function () {
    return view('form');
});

//put请求
Route::get('/put', function () {
    return view('put');
});

Route::put('/update', function () {
    echo '这是一个put请求';
});

// delete请求
Route::get('/delete', function () {
    return view('delete');
});

Route::delete('/del', function () {
    echo '这是一个delete请求...........';
});

// 带参数的路由规则
// Route::get('/article/100', function () {
//     echo '这是文章的详情..........';
// });
// Route::get('/article/{id}', function ($id) {
//     echo '这是文章的ID.......... 当前文章的id为' . $id;
// });

// 限制参数的类型
Route::get('/goods/{id}', function ($id) {
    echo '这是商品的详情页.......... 当前id为' . $id;
})->where('id' , '\d+'); // 带限制参数进行路由匹配

// // 多个参数
// Route::get('/{type}-{id}', function ($type, $id) {
//     echo '当前的类型为'. $type . '.......... 当前id为' . $id;
// }); // 这里的ID参数已被RouteServiceProvider 的 boot 方法里定义的模式所限制

// 前台用户注册页面
Route::get('/register', 'HomeController@register'); // 第一个参数是访问的页面,第二个参数是访问的控制器@以及方法

// 用户注册操作
Route::post('/register', 'HomeController@doregister');

// 用户密码重置操作
Route::get('/{id}.html', 'HomeController@register')->where('id' , '\d+');

// // 路由组
// Route::group(['middleware'=>'hlogin'], function(){

// 	// 购物车添加操作
// 	Route::post('/cart/insert', 'CartController@insert');


// 	// 购物车列表页
// 	Route::get('/cart', 'CartController@index');

// });

// // 路由组
// Route::group(['middleware'=>'login'], function(){

// 	// 后台页面显示的路由规则
// 	Route::get('/admin', 'AdminController@index');

// 	// 用户管理
// 	Route::controller('/user', 'UserController');

// });
// 后台的路由组规则显示
Route::group([], function () {

	// Route::get('user/{name?}', function ($name = 'John') {
	//     return $name;
	// });


	Route::get('/as', function () {
	    echo '这是一个get请求路由规则';
	});

	Route::get('/Admin/User/index', [
		'as' => 'ulist',
		'uses' => function(){
			// echo '这里是后台用户显示........';
			echo route('ulist'); // route是一个函数,通过路由别名来快速创建完整的url
		}
	]);

	// Route::get('/404',function(){
	// 	abort(404); // 没有找到相关页面,重定向到相关错误页面404、503、500都行
	// }); // 提示:找到404页面和路由没有关系,只要你有404的模板页面,框架内异常报错之后就会去找404页面

	Route::get('/login', function(){
		echo '这里是用户的登录页面...........';
	});



	// 路由关联中间件数组操作
	Route::get('/setting', [
		'middleware' => 'login', // 
		'uses' => function(){ // uses:方法放入数组中的键名,数组中的连接
			echo '这里是网站的设置页面..............';
		}
	]);

	// 路由连贯中间件操作
	// Route::get('/admin',function(){
	// 	echo '这里是网站的后台页面..........'
	// })->middleware('login');


	// 写入session uid
	Route::get('/session',function(){
		session(['uid'=>10]);
	});
});




// 当用户请求服务器上的 /controller路径时,会执行UserController控制器文件中的show方法
Route::get('/controller', 'UserController@show')->middleware('login');

// 用户的修改操作
Route::get('/user/edit/{id}', 'UserController@edit')->middleware('login');

// 用户的删除操作
Route::get('/admin/user/delete/{id}', [
	'as' => 'udelete', // 别名操作
	'uses' => 'UserController@delete', // 路径键名设置
	]);

// 用户的升级操作
Route::get('/user/shengji', [
	'middleware' => 'login',
	'uses' => 'UserController@shengji',
	]);

// 用户的禁用操作
Route::get('/user/jinyong', 'UserController@jinyong')->middleware('login');

// 隐式控制器 如果是goods开头的路径 都是交给GoodsController去实现
Route::controller('goods', 'GoodsController');

// restful控制器
// Route::resource('img', 'ImgController', );

// rrestful控制器路由规则
Route::resource('article', 'ArticleController');

// 

Route::get('/request', 'UserController@qingqiu');

// 显示一个form表单
Route::get('/user-form', 'UserController@form');

Route::post('/form', 'UserController@insert');


// 文件上传
Route::get('/file', 'UserController@show');

Route::post('upload', 'UserController@upload');

// cookie操作
Route::get('/cookie', 'UserController@cookie');

// 闪存操作
Route::get('/flash', 'UserController@flash');


Route::get('/old', 'UserController@old'); 

Route::post('/flash', 'UserController@doflash');

Route::get('/flash_1', 'UserController@flash_1');

Route::get('/get_flash', 'UserController@get_flash');

// 响应的路由	html页面icon修改:<link rel="shortcut icon" href="myicon.ico">
Route::get('/response', 'UserController@response');

// 视图的路由
Route::get('/view', 'UserController@view');

// blade的使用路由
Route::get('/blade', 'UserController@blade');


?>