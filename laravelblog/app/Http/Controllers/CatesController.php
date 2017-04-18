<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cate;

use DB;
class CatesController extends Controller
{
    /**
     * 显示分类列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 读取分类 按照父子分类进行排序
        $cates = Cate::select(DB::raw('*, concat(path, "," ,id) as paths'))->orderBy('paths')->where('isdelete', 'like', '0')->get();
        // 遍历数组 调整分类的名称 laravel ====> |-----laravel
        foreach ($cates as $key => $value) {
            // 判断当前的分类是几级分类
            $tmp = count(explode(',', $value->path)) - 1;
            $prefix = str_repeat('|-- ', $tmp);
            $value->name = $prefix . $value->name; // 重新赋值给name值
        }
        // 解析模板
        return view('admin.cate.index', ['cates'=>$cates, 'request'=>$request]);
    }

    /**
     * 显示一个表单用来创建分类
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 读取所有分类
        $cates = Cate::get();
        return view('admin.cate.add', ['cates'=>$cates]);
    }

    /**
     * 将分类信息 存入到数据库中
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        // 如果要添加的是顶级分类 pid 和 path都是0
        if($data['pid'] == 0) {
            $data['path'] = '0';
        }else{ // 如果不是顶级分类 
            // 读取父级分类的信息
            $info = Cate::find($data['pid']);
            $data['path'] = $info->path . ',' . $info->id;
        }

        // 创建模型
        $cate = new Cate;
        $cate->name = $data['name'];
        $cate->pid = $data['pid'];
        $cate->path = $data['path'];
        // 
        if($cate->save()) {
            return redirect('/cate')->with('info', '分类成功添加');
        }else{
            return back()->with('info', '分类添加失败');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 读取当前分类的信息
        $info = Cate::findOrFail($id);
        // 读取
        $cates = Cate::get();
        // 解析模板
        return view('admin.cate.edit', ['info'=>$info, 'cates'=>$cates]);
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
        //
        $cate = Cate::findOrFail($id);

        $cate->name = $request->name;
        $cate->pid = $request->pid;

        if($cate->save()) {
            return redirect('/cate')->with('info', '分类成功更新');
        }else{
            return back()->with('info', '分类更新失败');
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
        // 删除分类
        $cate = Cate::findOrFail($id);
        $cate->isdelete = 1;
        // 删除子集分类(父级分类被删除的情况下,子集分类连带被删除)
        $path = $cate->path . ',' . $cate->id;
        DB::table('cates')->where('path', 'like', $path.'%')->update(['isdelete'=>1]);
        
        if($cate->save()) {
            return back()->with('info', '成功删除');
        }else{
            return back()->with('info', '删除失败');
        }
        // 下面是真正删除的操作
        // DB::table('cates')->where('path', 'like', $path.'%')->delete(); 
        // if($cate->delete()) {
        //     return back()->with('info', '成功删除');
        // }else{
        //     return back()->with('info', '删除失败');
        // }

    }
}
