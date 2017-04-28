@extends('layout.home')
@section('article')


<div class="l_box f_l">
  <div class="banner">
    <div id="slide-holder">
	   <div id="slide-runner">
	   <?php 
	   $post = \App\Post::where('isdelete', '0')->get();
	   foreach ($post as $k => $v) {
	   		$ids[] = $v->id;
	   }
	   $rand = array_rand($ids, 4); // 从数组中随机取出几个值
	   foreach ($rand as $k => $v) {
	   		$randFind = \App\Post::where('isdelete', '0')->findOrFail($v);
	   		$randPost[] = $randFind;
	   }
	   ?>



	   <!-- @foreach($randPost as $k => $v)
	   
	     <a href="{{route('detail', ['id'=>$v->id])}}" target="_blank">
		     <img id="slide-img-{{$v->id}}" src="{{$v->img}}" alt style width="670px" height="280px" class="img-reponsive">
		  </a>
		@endforeach  -->
		<a href="/" target="_blank">
		     <img id="slide-img-1" src="{{asset('/home/images/a1.jpg')}}" alt style width="670px" height="280px" class="img-reponsive">
		  </a> 
		  <a href="/" target="_blank">
		     <img id="slide-img-2" src="{{asset('/home/images/a2.jpg')}}" alt style>
		  </a>
		  <a href="/" target="_blank">
		     <img id="slide-img-3" src="{{asset('/home/images/a3.jpg')}}" alt style>
		  </a>
		  <a href="/" target="_blank">
		     <img id="slide-img-4" src="{{asset('/home/images/a4.jpg')}}" alt style>
		  </a>
		  <div id="slide-controls" style="display:block;">
		    <p id="slide-client" class="text">
			    <strong></strong>
				 <span></span>
			 </p>
          <p id="slide-desc" class="text"></p> 	
          <p id="slide-nav"></p>		     			  
		  </div>
	   </div> 
	 </div>
  </div>
  <script>
     if(!window.slider){
	     var slider={};
	 }
	 slider.data=[
	 {
	     "id":"slide-img-1", //与slide-runner中的img标签id对应
		 "client":"醉牛逼",
		 "desc":"醉牛逼是武魂醉牛逼的存在"     //这里描述图片内容
	 },
	 {
	     "id":"slide-img-2", 
		 "client":"醉牛逼",
		 "desc":"醉牛逼是武魂醉牛逼的存在"
	 },
	 {
	     "id":"slide-img-3", 
		 "client":"醉牛逼",
		 "desc":"醉牛逼是武魂醉牛逼的存在"
	 },
	 {
	     "id":"slide-img-4", 
		 "client":"醉牛逼",
		 "desc":"醉牛逼是武魂醉牛逼的存在"
	 }
	 ];
   </script>
   <div class="topnews">
	   <h2>
	   <span>
	    <a href="/" target="_blank">武魂大罗</a>
		 <a href="/" target="_blank">装逼大神</a>
		 <a href="/" target="_blank">屌毛推荐</a>
	   </span>	 
	    文章推荐
	   </h2>
	 
	 @foreach($articles as $k => $v)
     <div class="blogs">
	      <figure>
		     <img src="{{$v->img}}" width="170px" height="100px">
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
		{!! $articles->appends($request->only(['keyword']))->render() !!}
	</div>

</div>





@endsection