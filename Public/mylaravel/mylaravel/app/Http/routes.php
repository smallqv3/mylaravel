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
Event::listen('illuminate.query', function($query){
	print_r($query);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/relation', 'UserController@relation');