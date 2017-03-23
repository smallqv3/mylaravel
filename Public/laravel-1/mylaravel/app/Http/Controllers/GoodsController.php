<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    // 商品的添加操作
    public function getAdd()
    {
    	return view('add');
    }

    /**
     * 商品的显示操作
     */
    public function getShow()
    {
    	echo '这里时尚品的显示操作.............';
    }

    /**
     * 商品的插入操作
     */
    public function postInsert()
    {
    	echo '这里是商品的插入操作............';
    }
}
