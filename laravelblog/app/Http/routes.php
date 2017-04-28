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
// 打印sql语句(在此做一个事件或者sql操作监听)
// Event::listen('illuminate.query', function($query){
// 	print_r($query);
// });
// 首页显示
Route::get('/', 'ArticleController@lists');


// Route::get('/', function () {
//     return view('welcome');
// });
// 后台路由组规则
Route::group(['middleware'=>'login'], function(){
	// 后台路由规则
	Route::get('/admin', 'AdminController@index');


	// 用户的添加
	Route::get('/user/add', 'UserController@add');

	// 用户的插入操作
	Route::post('/user/insert', 'UserController@insert');
	// 用户的显示
	Route::get('/user/index', 'UserController@index');

	Route::get('/user/edit/{id}', 'UserController@edit');

	Route::post('/user/update', 'UserController@update');


	Route::get('/user/delete/{id}', 'UserController@delete');
	// ajax测试
	Route::post('/ajax', 'UserController@ajax');
	Route::get('/html', 'UserController@html');

	// restful 控制器 一条规则顶七条 分类
	Route::resource('cate', 'CatesController');

	// 标签管理
	Route::resource('tag', 'TagController');

	// 文章管理
	Route::resource('article', 'ArticleController');
});


// 登录的页面显示
Route::get('/login', 'LoginController@login');
Route::post('/login', 'LoginController@dologin');
Route::get('/logout', 'LoginController@logout');

// // 文章的详情显示页面
// Route::get('/article/{id}.html', 'ArticleController@show'); // <li><a href="/article/{{$v->id}}.html" target="_blank">{{$v->title}}</a></li>


// 文章的详情显示页面 get的第一个参数可改变路由规则:/article/{id}.html => http://noaa.xyz/article/1.html 	/{id}.html => http://noaa.xyz/1.html
Route::get('/article/{id}.html', [
	'uses' => 'ArticleController@show',
	'as' => 'detail' // 使用别名的优势
]); // <li><a href="{{route('detail', ['id'=>$v->id])}}" target="_blank">{{$v->title}}</a></li>

// 首页显示
Route::get('/article', 'ArticleController@lists');
// 首页搜索
Route::post('/article', 'ArticleController@lists');

// 文章分类
// Route::get('/cate/{id}.html', 'CatesController@show');
// 文章分类
Route::get('/cate/{id}.html', [
	'uses' => 'CatesController@show',
	'as' => 'cate'
	]);


// 文章标签
// Route::get('/tag/{id}.html', 'TagController@show');

// 文章标签
Route::get('/tag/{id}.html', [
	'uses' => 'TagController@show',
	'as' => 'tag'
	]);