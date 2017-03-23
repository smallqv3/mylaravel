<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * GET /article HTTP/1.1
     */
    public function index()
    {
        //
        echo '这里是文章显示的首页';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * GET /article/create HTTP/1.1 
     */
    public function create()
    {
        //
        // echo '这是文章的添加页面';
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * POST /article HTTP/1.1
     */
    public function store(Request $request)
    {
        //
        echo '这里是文章的插入操作';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * GET /article/{id} HTTP/1.1
     */
    public function show($id)
    {
        //
        echo '这里是文章的详情页面,id为' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * GET /article/{id}/edit HTTP/1.1
     */
    public function edit($id)
    {
        //
        // echo '这里是文章的修改页面,id为' . $id;
        return view('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * PUT /article/{id} HTTP/1.1
     */
    public function update(Request $request, $id)
    {
        //
        echo '这里是文章的更新操作,id为' . $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * DELETE /article/{id} HTTP/1.1
     */
    public function destroy($id)
    {
        //
        echo '这里是文章的删除操作,id为' . $id;
    }
}
