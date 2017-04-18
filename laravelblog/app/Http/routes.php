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

Route::get('/', function () {
    return view('welcome');
});


// 后台路由规则
Route::get('/admin', 'AdminController@index');
// 认证路由...
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');

// 注册路由...
Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');

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

// restful 控制器 一条规则顶七条
Route::resource('cate', 'CatesController');

