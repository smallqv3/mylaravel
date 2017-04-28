<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class ArticleController extends Controller
{
    /**
     * 文章列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // // 读取文章内容
        // $posts = Post::orderBy('id', 'desc')
        //     ->where(function($query) use ($request){
        //         // 检测当前的请求中是否包含keyword参数
        //         $keyword = $request->input('keyword', '');
        //         if(!empty($keyword)) {
        //             $query->where('title', 'like', '%'.$keyword.'%')
        //         }
        //     })
        //     ->paginate(10);
        
        // return view('admin.article.index', ['posts'=>$posts, 'request'=>$request]);
        $posts = Post::where('isdelete', '=', '0')->get();

        return view('admin.article.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 读取分类信息和标签信息
        $cates = CatesController::getCates();
        // 读取标签的内容


        $tags = TagController::getTags();
        return view('admin.article.add', ['cates'=>$cates, 'tags'=>$tags]);
    }

    /**
     * 将数据插入到数据库中
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 创建模型
        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->cate_id = $request->input('cate_id');
        $post->user_id = 1; // 潜规则 当前用户登录之后需要将用户的这个uid写入到session中

        // 检测是否有文件上传
        if($request->hasFile($request->input('img'))) {
            // 拼接我们的文件夹路径
            $destinationPath = './Uploads/'.date('Y-m-d').'/'; // 规则 /Uploads/20170420/1111111111.jpg
            // 拼接我们的文件路径
            $fileName = time().rand(100000, 999999);
            // 获取上传文件的后缀
            $suffix = $request->file('img')->getClientOriginalExtension();
            // 文件的完整的名称
            $fullName = $fileName.'.'.$suffix;
            // 保存文件
            $request->file('img')->move($destinationPath, $fullName);
            // 拼接文件上传之后的路径
            $post->img = trim($destinationPath.$fullName, '.');
            
        }

        if($post->save()) {
            // 将tag数据存入到中间表 post_tag中 sync:同步数据插入中间表中
            if($post->tag()->sync($request->tag_id)) {
                return redirect('/article')->with('info', '成功添加');
            }
             
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
        // 读取文章的内容
        $article = Post::findOrFail($id);
        // 显示文章的内容
        return view('home.detail', ['article'=>$article]);
    }

    /**
     * 显示修改文章的表单
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 读取当前id文章的内容
        $info = Post::findOrFail($id);
        $cates = CatesController::getCates();
        $tags = TagController::getTags();
        // 获取所有的文章标签:使用这种用法之前$info->tag,需要先到模型中对tag模型进行关联才会生效,否则没有数据  toArray()对象转数组,提取其中的数组数据
        $allTags = $info->tag;
        $ids = [];
        foreach ($allTags as $key => $value) {
            $ids[] = $value['id'];
        }

        // 解析模板
        return view('admin.article.edit', ['info'=>$info, 'cates'=>$cates, 'tags'=>$tags, 'ids'=>$ids]);
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
        // 创建模型 获取数据
        $post = Post::findOrFail($id);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->cate_id = $request->input('cate_id');

        // 检测是否有文件上传
        if($request->hasFile($request->input('img'))) {
            // 拼接我们的文件夹路径
            $destinationPath = './Upload/'.date('Y-m-d').'/'; // 规则 /Uploads/20170420/1111111111.jpg
            // 拼接我们的文件路径
            $fileName = time().rand(100000, 999999);
            // 获取上传文件的后缀
            $suffix = $request->file('img')->getClientOriginalExtension();
            // 文件的完整的名称
            $fullName = $fileName.'.'.$suffix;
            // 保存文件
            $request->file('img')->move($destinationPath, $fullName);
            // 拼接文件上传之后的路径
            $post->img = trim($destinationPath.$fullName, '.');
            
        }
        if($post->save()) {
            // 将tag数据存入到中间表 post_tag中 注:sync()方法:更新时不属于数组中的数据会全部干掉,再把新数据插入进去
            if($post->tag()->sync($request->tag_id)) {
                return redirect('/article')->with('info', '成功更新');
            }
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
        // 获取模型
        $post = Post::findOrFail($id);
        $post->isdelete = 1;
        // // 删除图片
        // $img = $post->img;
        // // @unlink('.'.$img);
        // // 检测
        // $path = '.'.$img;
        // if(file_exists($path)) {
        //     unlink($path);
        // }
        // 删除
        if($post->save()) {
            return redirect('/article')->with('info', '成功删除');
        }else{
            return back()->with('info', '删除失败');
        }
    }

    /**
     * 前台文章列表页显示
     */
    public function lists(Request $request)
    {
        
        // 读取文章的列表信息
        $articles = Post::orderBy('id', 'desc')->where(function($query) use ($request){
            // 获取关键字
            $keyword = $request->input('keyword');
            // 检测参数
            if(!empty($keyword)) {
                $query->where('title', 'like', '%'.$keyword.'%');
            }
            
        })->orWhere('isdelete', '0')->paginate(10);
        // 解析模板
        return view('home.lists', ['articles'=>$articles, 'request'=>$request]);
    }
    
}
