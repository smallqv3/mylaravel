<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use App\Group;

class UserController extends Controller
{
    //
    public function relation()
    {
    	$user = User::find(1);
    	// 读取详细信息  一对一的关系操作(两种操作方法都可以)
    	// $detail = $user->userinfo()->first();
    	// $detail = $user->userinfo;


    	// 一对多操作
    	// $posts = $user->post()->where('id', 1)->get();
    	// $posts = $user->post;

    	// 属于关系
    	// $country = $user->country()->first();
    	// $country = $user->country;

    	// 多对多操作
    	// $groups = $user->group()->get();


    	// $groups = $user->group;


    	 
    	
    	// 一对多写入

    	// $post = new Post(['title'=>'test_1', 'content'=>'atest_content_1']);
    	// $post = new Post;
    	// $post->title = 'test_1';
    	// $post->content = 'atest_content_1';

    	// $post->save();

    	// 获取用户信息
    	
    	// $user = User::find(1);

    	// $user->post()->save($post);


    	// 多对多的创建
    	// $user = User::find(2);

    	// $user->group()->attach(2); // attach()可进行新增数据的插入

    	// $group = Group::find(1);
    	// $user->group()->attach($group); // attach():括号中既可以放置一个id, 也可以放置一个模型对象, 之后就可以插入数据了

    	// 多对多关系的删除
    	// $user = User::find(2);

    	// $user->group()->detach(1); // detach():多对多关系删除函数
    	// $group = Group::find(1);
    	// $user->group()->detach($group);

    	// 数据同步(内置执行步骤:进行对应对象指向关联模型的删除操作,再进行数据插入操作)
    	// $user = User::find(2); // 对应对象(在User模型中进行了方法指向)
    	// $user->group()->sync([1, 2, 3, 4]); // 对应对象指向关联的模型内进行操作,group()是关联模型方法,sync():括号内填入需要同步的数据

    	// User::create(['username'=>'aaa', 'password'=>'aaaaaaaaaaaaaaaaa']); // 注:create():批量插入,会受到模型中fillable()属性或者guard()属性的限制=>fillable()允许括号中的字段插入数据,guard()禁止括号中的字段插入数据

    	// date('Y-m-d H:i:s');执行


    	视频播放:
    		可使用video开源免费插件:videojs 支持流媒体m3u8,可把视频切割成一块一块去播放,类似优酷视频那样播放,在通过videojs一点一点去请求播放,
    		videojs ckplayer插件:国产插件,也可支持流媒体播放
    		sewise player插件:也可以支持流媒体播放
    }
}
