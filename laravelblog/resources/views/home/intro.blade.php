@extends('layout.home')

@section('keyword')
@endsection
@section('article')
<div class="l_box f_l">	  
	  
	   <div class="topnews">
		   <h2>
		   <span>
		    <a href="/" target="_blank">武魂大罗</a>
			 <a href="/" target="_blank">装逼大神</a>
			 <a href="/" target="_blank">屌毛推荐</a>
		   </span>	 
		    文章发布者:{{$userid->username}}
		   </h2>
		 
		 @foreach($posts as $k => $v)
	     <div class="blogs">
		      <figure>
			     <img src="{{$v->img}}">
			   </figure>
			   <ul>
			     <h3><a href="{{route('detail', ['id'=>$v->id])}}">{{$v->title}}</a></h3>
				  <p>{!!str_limit($v->content, '15', '...')!!}</p>
			     <p class="autor">
				    <span class="lm f_l">
					    <a href="/">{{$v->user->username}}</a>
					 </span>
					 <span class="dtime f_l">{{date('Y-m-d', strtotime($v->created_at))}}</span>
					 <span class="viewnum f_r">
					    浏览（<a href="/">0</a>）</span>
					 <span class="pingl f_r">	
					    评论（<a href="/">暂无</a>）</span>
				  </p>
			   </ul>
	       </div>
		  @endforeach
	   </div>
	   <style type="text/css">
		#page ul li{
			width: 25px;
			height: 25px;
			background-color: #3399cc;
			margin-right: 5px;
			float: left;
			text-align: center;
			line-height: 25px;
			color: #cccccc;
		}
		#page ul li a{
			color: white;
		}
		#page{
			margin-bottom: 100px;
		}
	</style>
	<div id="page" class="pull-right">
		{!! $posts->render() !!}
	</div>
	 </div>  
@endsection