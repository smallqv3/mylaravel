<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{
    /**
     * 显示标签列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $tags = Tag::orderBy('id', 'desc')
        //         ->where(function($query) use ($request){
        //         // $query:laravel框架中自带的依赖注入变量 在一个函数内部使用php全局变量是没法直接去使用:再这匿名函数中用global实现不了全局,必须使用use ($request),这是语法限定
        //             // 获取关键字
        //             $keyword = $request->input('keyword');
        //             // 检测参数
        //             if(!empty($keyword)) {
        //                 $query->where('name', 'like', '%'.$keyword.'%');
        //             }
        //         })
        //         ->paginate($request->input('num', 10));
        // return view('admin.tag.index', ['tags'=>$tags, 'request'=>$request]);
        // 读取标签
        $tags = Tag::where('isdelete', '=', 0)->get();
        return view('admin.tag.index', ['tags'=>$tags]);
    }

    /**
     * 显示一个表单用来创建标签
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        return view('admin.tag.add');
    }

    /**
     * 将标签信息 存入到数据库中
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:tags'
        ], [
            'name.required' => '标签名称不能为空',
            'name.unique' => '标签名称已经存在'
        ]);
        // 创建模型
        $tag = new Tag;
        $tag -> name = $request->input('name');
        // 插入
        if($tag->save()) {
            return redirect('/tag')->with('info', '成功添加');
        }else{
            return back()->with('info', '添加失败');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 读取当前标签文章内容 模型多对多
        $tagspost = Tag::find($id)->post()->where('isdelete', '0')->orderBy('id', 'desc')->paginate(10);
        $tagsshow = Tag::findOrFail($id);
        // 前台文章标签页显示
        return view('home.tag', ['tagspost'=>$tagspost, 'tagsshow'=>$tagsshow]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 读取当前标签信息
        $info = Tag::findOrFail($id);
        return view('admin.tag.edit', ['info'=>$info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 创建模型
        $tag = Tag::findOrFail($id);
        // 修改对象的属性
        $tag -> name = $request->input('name');
        if($tag->save()) {
            return redirect('/tag')->with('info', '成功更新');
        }else{
            return back()->with('info', '更新失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 创建模型
        $tag = Tag::findOrFail($id);
        // 
        $tag -> isdelete = 1;
        // 删除
        if($tag->save()) {
            return back()->with('info', '成功删除');
        }else{
            return back()->with('info', '删除失败');
        }
    }

    /**
     * 获取标签的内容
     */
    public static function getTags()
    {
        return Tag::where('isdelete', '=', '0')->orderBy('id', 'desc')->get();
    }
}
