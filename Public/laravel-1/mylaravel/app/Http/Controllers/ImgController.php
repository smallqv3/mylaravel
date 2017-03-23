<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImgController extends Controller
{
    // 图片的添加操作
    public function add(){
    	echo '这是一个添加操作';
    }

    /**
     * 图片的显示操作
     */
    public function show(){
    	echo '这是一个显示操作...........';
    }
}
