
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="gb2312">
 <title>@yield('title')</title>
 <meta name="关键字" content="html php laravel">
 <meta name="description" content="这是小nu的博客网站">
 <meta name="author" content="nuker">
 <link href="{{asset('/home/css/buju.css')}}" rel="stylesheet">
 <link href="{{asset('/home/css/index.css')}}" rel="stylesheet">
 <script type="text/javascript" src="{{asset('/home/js/jquery.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('/home/js/sliders.js')}}"></script>

 <link rel="shortcut icon" href="{{asset('/home/muzhuangshow/images/favicon.ico')}}">

</head>

<body style="background-color:#F8F8FF;margin-top:-25px;">
  <header style="position:fixed;z-index:1000;margin:auto;text-align:center;border-bottom:solid 0px #cccccc;padding-top:30px;background-color:white;width:100%;" class="floatfix">
    <div class="logo f_l" style="margin-left:290px;">
	   <a href="#">
	      <img src="http://nuker.top/wp-content/themes/Cui2.0/Cui2.0/img/logo.png">
	   </a>
	 </div>
	 <style type="text/css">
	 #topnav ul a.active{
	 	background-color: gold !important;
	 	color: black;
	 }	 
	 </style>

	 <div id="topnav" class="f_r" style="width:40%;margin-right:290px;">
	 	<?php $cates = \App\Cate::where('pid', '0')->where(function($query){
	 			$query->where('isdelete', '0');
	 		})->get();?>
	     <ul>
		     <a href="/" target="_self" class="topnav" id="topnavcurrent" data-id="0">首页</a>
		     @foreach($cates as $k => $v)
			  <a href="{{route('cate', ['id'=>$v->id])}}" target="_self" class="link" data-id="{{$v->id}}">{{$v->name}}</a>
			 @endforeach			  
		  </ul>
	 </div>
  </header>

  <script type="text/javascript">
	  $(function(){
	  	var href = location.href; // js获取url
	  	hrefprev = href.split('/')[4]; // 以'/'为条件进行切割
	  	if(hrefprev == null){
	  		$('.topnav').addClass('active');
	  	}else{
	  		hrefnext = hrefprev.split('.')[0]; // 以'.'为条件进行切割取得url中的id
	  		var active = $(".link");  	
	  	
		  	$.map(active, function(val){ // map() 把每个元素通过函数传递到当前匹配集合中，生成包含返回值的新的 jQuery 对象
		  		if(hrefnext == $(val).data('id')){
		  			$(val).addClass('active');
		  			$('.topnav').removeClass('active');
		  		}else{
		  			$(val).removeClass('active');
		  		}
		  	})
	  	}
	  	
		

	  });
  </script>  
  <style type="text/css">
	#center{
		width: 100%;



		/*border: solid 1px #cccccc;*/
		margin-top: 25px;
	}
	.floatfix{
		content:"";
		display: table;
		clear: both;
	}
  </style>
  <article style="padding:70px 0 0 0;">
  	<div id="center" class="floatfix">
  	@section('article')
    <div class="l_box f_l">
	  <div class="banner">
	    <div id="slide-holder">
		   <div id="slide-runner">
		     <a href="/" target="_blank">
			     <img id="slide-img-1" src="{{asset('/home/images/a1.jpg')}}" alt style>
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
		 <?php $posts = \App\Post::where('isdelete', '0')->get(); ?>
		 @foreach($posts as $k => $v)
	     <div class="blogs">
		      <figure>
			     <img src="{{$v->img}}">
			   </figure>
			   <ul>
			     <h3><a href="/">住在手机里的朋友</a></h3>
				  <p>"通信时代，无论是初次相见还是老友重逢，交换联系方式，常常是彼此交换名片，然后郑重或是出于礼貌用手机记下对方的电话号码。在快节奏的生活里，我们不知不觉中就成为住在别人手机里的朋友。又因某些意外，变成了别人手机里匆忙的过客，这种快餐式的友谊 ..."</p>
			     <p class="autor">
				    <span class="lm f_l">
					    <a href="/">个人博客</a>
					 </span>
					 <span class="dtime f_l">2016-02-16</span>
					 <span class="viewnum f_r">
					    浏览（<a href="/">666</a>）</span>
					 <span class="pingl f_r">	
					    评论（<a href="/">60</a>）</span>
				  </p>
			   </ul>
	       </div>
		  @endforeach
	   </div>
	   
	 </div>  
	@show
	
	<style type="text/css">
	.widget {
	    clear: both;
	    position: relative;
	    margin-bottom: 15px;
	    background-color: #fff;
	    border-radius: 4px;
	    border: 1px solid #eaeaea;
	    overflow: hidden;
	}
	.navbar-form {
	    width: auto;
	    padding-top: 0;
	    padding-bottom: 0;
	    margin-right: 0;
	    margin-left: 0;
	    border: 0;
	    box-shadow: none;
	    padding: 10px 15px;
    	margin-top: 8px;
    	margin-bottom: 8px;
	}
	.input-group input{
		width: 200px;
		height: 28px;
	}
	.input-group-btn button{
		width: 55px;
		height: 35px;
		border: solid 1px white;
		border-radius: 5px;
		background-color: #3399CC;
		color: white; 
	}
	.input-group-btn button:hover{
		border: solid 1px #3399CC;
		color: #3399CC;
		background-color: white;
	}
	.form-control{
		padding-top: 2px;
	}
	</style>
    <div class="r_box f_r">
    	@section('keyword')
    	<div class="widget widget_search">
			<form class="navbar-form" action="{{url('/article')}}" method="post">
				<div class="input-group">
					<input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字"
					maxlength="15" autocomplete="off" value="">
					<span class="input-group-btn">
					{{csrf_field()}}
						<button class="btn btn-default btn-search" name="search" type="submit">
							搜索
						</button>
					</span>
				</div>
			</form>
		</div>
		@show
	   <div class="tit01">
         <h3>关注我</h3>
		  <div class="gzwm">
		    <ul>
			   <li><a class="xlwb" href="#" target="_blank">新浪微博</a></li>
			   <li><a class="txwb" href="#" target="_blank">腾讯微博</a></li>
			   <li><a class="rss" href="#" target="_blank">RSS</a></li>
			   <li><a class="wx" href="#" target="_blank">邮箱</a></li>
			</ul>
		  </div>
       </div> 
	   
	   <div class="tab" id="lp_right_select">
	     <script>
		     window.onload=function()
			 {
			     var oLi=document.getElementById("tb").getElementsByTagName("li");
				 var oUl=document.getElementById("tb-main").getElementsByTagName("div");
				 for(var i=0;i<oLi.length;i++)
				 {
				     oLi[i].index=i;
					 oLi[i].onmouseover=function()
					 {
					    for(var n=0;n<oLi.length;n++)
						    oLi[n].className="";
							this.className="cur";
						for(var n=0;n<oUl.length;n++)
                            oUl[n].style.display="none";
                            oUl[this.index].style.display="block";							
					 }
				 }
			 }
		  </script>
	     <div class="tab-top">
		      <ul class="hd" id="tb">
			       <li class="cur"><a href="/">点击排行</a></li>
				   <li><a href="/">最新文章</a></li>
				   <li><a href="/">站长推荐</a></li>
			  </ul>
		  </div>
		  <?php $showPosts = \App\Post::where('isdelete', '0')->orderBy('id', 'desc')->take(5)->get(); ?>
		  <div class="tab-main" id="tb-main">
		      <div class="bd bd-news" style="display:block;"><ul>
		      	@foreach($showPosts as $k => $v)
			      <li><a href="{{route('detail', ['id'=>$v->id])}}" target="_blank">{{$v->title}}</a></li>
				@endforeach  
			  </ul></div>
			  <?php $recentPosts = \App\Post::where('isdelete', '0')->orderBy('created_at', 'desc')->take(5)->get(); ?>
			   <div class="bd bd-news" ><ul>
			   	@foreach($recentPosts as $k => $v)
			      <li><a href="{{route('detail', ['id'=>$v->id])}}" target="_blank">{{$v->title}}</a></li>
				@endforeach   
			  </ul></div>
			  <?php $blogPosts = \App\Post::where('isdelete', '0')->orderBy('id', 'desc')->skip(3)->take(5)->get(); ?>
			   <div class="bd bd-news" ><ul>
			   	@foreach($blogPosts as $k => $v)
			      <li><a href="{{route('detail', ['id'=>$v->id])}}" target="_blank">{{$v->title}}</a></li>
				@endforeach   
			  </ul></div>
		  </div>
	   </div>
	   <?php
	   $post = \App\Post::where('isdelete', '0')->get(); 
	   foreach ($post as $k => $v) {
	   	$post = \App\Post::find($v->id);
		$tag = $post->tag;
		foreach ($tag as $key => $value) {
			$tagarr[] = $value->name.','.$value->id;
		}		
	   }
	   $unique = array_unique($tagarr);
	   ?>
	   <div class="cloud">
	     <h3>标签云</h3>
		  <ul>
			
		  	<?php foreach ($unique as $k => $v) { ?>
		    <li><a href="{{route('tag', ['id'=>explode(',', $v)[1]])}}">{{explode(',',$v)[0]}}</a></li>
		  	<?php } ?>
			 <!-- <li><a href="/">web开发</a></li>
			 <li><a href="/">前端设计</a></li>
			 <li><a href="/">Html</a></li>
			 <li><a href="/">CSS3</a></li>
			 <li><a href="/">CSS3+HTML5</a></li>
			 <li><a href="/">百度</a></li>
			 <li><a href="/">JavaScript</a></li>
			 <li><a href="/">C/C++</a></li>
			 <li><a href="/">ASP.NET</a></li>
			 <li><a href="/">IOS开发</a></li>
			 <li><a href="/">Android开发</a></li>
			 <li><a href="/">PHP</a></li>
			 <li><a href="/">VS</a></li> -->
		  </ul>
	   </div>
	   <div class="tuwen">
	     <h3>图文推荐</h3>
		 <ul>
		 	@foreach($blogPosts as $k => $v)
		   <li><a href="{{route('detail', ['id'=>$v->id])}}"><img src="{{$v->img}}" height="75px;"><b>{{$v->title}}</b></a>
		      <p>
			      <span class="tulanum"><a href="/">手机配件</a></span>
				   <span class="tutime">{{date('Y-m-d', strtotime($v->created_at))}}</span>
			   </p>
		   </li>
			@endforeach

		 </ul>
	   </div>
	   <div class="ad"><img src="{{asset('/home/images/03.jpg')}}"></div>
	   <div class="links">
	     <h3><span><a href="/">申请友情链接</a></span>友情链接</h3>
		 <ul>
		   <li><a href="/">醉牛逼的武魂生涯</a></li>
		    <li><a href="/">观察者网</a></li>
			 <li><a href="/">中国投资</a></li>
			  <li><a href="/">强国论坛</a></li>
			   <li><a href="/">车讯网</a></li>
			    <li><a href="/">360导航</a></li>
				 <li><a href="/">一带一路门户网</a></li>
		 </ul>
	   </div>
	 </div>
	</div>
  </article>
 
<style type="text/css">
	#footer {

	     width:100%;
	     height:60px;   /* Height of the footer */
	     background:#6cf;
	     border-top: solid 1px #cccccc;
	     line-height: 60px;
	     text-align: center;
	      
	}
	.copy p{
		color: white;
		font-size: 16px;
	}
</style>
<div id="footer">
	<div class="copy">
		<p>CopyRight © 攀爬菜小强 | 京ICP备17013291号</p>
	</div>
</div>		
  
</body>
</html>
