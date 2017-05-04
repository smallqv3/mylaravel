@extends('layout.home')
@section('article')

	<!--<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>-->
	<script src="{{asset('/home/jquerychajian/js/jquery.tiles.js')}}"></script>


	<link rel="stylesheet" href="{{asset('/home/jquerychajian/css/normalize.css')}}"/>
	<!-- <link rel="stylesheet" href="{{asset('/home/jquerychajian/css/styles.css')}}" media="screen"/> -->

	<!--必要样式表-->
	<link rel="stylesheet" href="{{asset('/home/jquerychajian/css/jquery.tiles.min.css')}}"/>
<style type="text/css">
	.code,
	#effects-select {
	  display: inline-block;
	}
	#effects-select {
	  padding: .4em;
	  margin-right: 1em;
	  font-size: 14px;
	  border: 1px solid #aaa;
	}
	.slider-wrap {
	  background: white;
	  padding: 10px;
	  height: 440px;
	  box-shadow: 0 1px 4px rgba(0,0,0,.2);
	}
	.slider strong { color: #F0E10E; }
	article {
	  position: relative;
	}
	.title {
	  padding: 1em 0;
	  position: relative;
	}
	/*body { width: 960px; margin: 0 auto; overflow-y: scroll; background-color: rgba(29,29,29,1.00); }*/
	header {
	  margin-top: 40px;
	}
	a {
	  color: #088BBF;
	  text-decoration: none;
	}
	h1 {
	  display: inline-block;
	  margin: 0;
	}

	.slider-wrap {
	  background: white;
	  padding: 10px;
	  height: 440px;
	  box-shadow: 0 1px 4px rgba(0,0,0,.2);
	}
	.slider {
	  width: 940px;
	  height: 400px;
	}
	.action {
	  position: absolute;
	  right: 0;
	  top: 13px;
	  color: white;
	  background: black;
	  border: 0;
	  width: 80px;
	  padding: .6em 0;
	}
	.stop {
	  display: none;
	  background: #088BBF;
	  text-shadow: 1px 1px rgba(0,0,0,.4)
	}
</style>
<div class="l_box f_l">
  <div class="title">
		<label>影响:</label>
		<select id="effects-select">
			<option value="default">default</option>
			<option value="simple">simple</option>
			<option value="left">left</option>
			<option value="up">up</option>
			<option value="leftright">leftright</option>
			<option value="updown">updown</option>
			<option value="switchlr">switchlr</option>
			<option value="switchud">switchud</option>
			<option value="fliplr">fliplr</option>
			<option value="flipud">flipud</option>
			<option value="reduce">reduce</option>
			<option value="360">360</option>
		</select>
		<div class="code">
			<code>x: 6</code>
			<code>y: 4</code>
			<code>random: true</code>
		</div>
		<button type="button" class="start action">Play</button>
		<button type="button" class="stop action">Stop</button>
	</div>

	<div class="slider-wrap" style="width:657px;height:310px;">
		<div class="slider" style="width:657px;height:280px;">
			<p><strong>Pig ham:</strong> hock pork loin brisket pastrami frankfurter andouille.</p>
			<img src="{{asset('/home/jquerychajian/img/img01.png')}}" width="109.5px" height="70"/><p><strong>Sausage:</strong> ground round sirloin ball tip beef ribs.</p>
			<img src="{{asset('/home/jquerychajian/img/img02.png')}}" width="109.5px" height="70"/><p><strong>Pig ham:</strong> hock pork loin brisket pastrami frankfurter andouille.</p>
			<img src="{{asset('/home/jquerychajian/img/img03.png')}}" width="109.5px" height="70"/><p><strong>Pork turkey:</strong> shoulder, filet mignon chuck t-bone bacon.</p>
			<img src="{{asset('/home/jquerychajian/img/img04.png')}}" width="109.5px" height="70"/><p><strong>Short loin:</strong> pig jowl fatback, pork loin pork chop.</p>
			<img src="{{asset('/home/jquerychajian/img/img05.png')}}" width="109.5px" height="70"/><p><strong>Sausage:</strong> ground round sirloin ball tip beef ribs.</p>
			<img src="{{asset('/home/jquerychajian/img/img06.png')}}" width="109.5px" height="70"/><p><strong>Pig ham:</strong> hock pork loin brisket pastrami frankfurter andouille.</p>
			<img src="{{asset('/home/jquerychajian/img/img07.png')}}" width="109.5px" height="70"/><p><strong>Pork turkey:</strong> shoulder, filet mignon chuck t-bone bacon.</p>
			<img src="{{asset('/home/jquerychajian/img/img08.png')}}" width="109.5px" height="70"/><p><strong>Short loin:</strong> pig jowl fatback, pork loin pork chop.</p>
			<img src="{{asset('/home/jquerychajian/img/img09.png')}}" width="109.5px" height="70"/><p><strong>Sausage:</strong> ground round sirloin ball tip beef ribs.</p>
			<img src="{{asset('/home/jquerychajian/img/img10.png')}}" width="109.5px" height="70"/><p><strong>Pig ham:</strong> hock pork loin brisket pastrami frankfurter andouille.</p>
		</div>
	</div>


	<script type="text/javascript">
		var $slider = $('.slider-wrap');
		var html = $slider.html();
		
		// Options
		
		var defaults = {
			thumbSize:20,
			onSlideshowEnd:function(){
				$('.stop, .start').toggle()
			}
		};
		
		var effects = {
			'default': { x:6, y:4, random: true },
			simple: { x:6, y:4, effect: 'simple', random: true },
			left: { x:1, y:8, effect: 'left' },
			up: { x:20, y:1, effect: 'up', rewind: 60, backReverse: true },
			leftright: { x:1, y:8, effect: 'leftright' },
			updown: { x:20, y:1, effect: 'updown', cssSpeed: 500, backReverse: true },
			switchlr: { x:20, y:1, effect: 'switchlr', backReverse: true },
			switchud: { x:1, y:8, effect: 'switchud' },
			fliplr: { x:20, y:1, effect: 'fliplr', backReverse: true },
			flipud: { x:20, y:3, effect: 'flipud', reverse: true, rewind: 75 },
			reduce: { x:6, y:4, effect: 'reduce' },
			360: { x:1, y:1, effect: '360', fade: true, cssSpeed: 600 }
		};
		
		$('#effects-select').change(function(){
			var effect = $(this).val();
			$slider.fadeTo( 0,0 ).html( html );
			$('.stop').hide();
			$('.start').show();
			
			setTimeout(function(){
				$('.slider').tilesSlider($.extend( {}, defaults, effects[ effect ]));
				$slider.fadeTo( 0,1 );
				$('body').removeClass('tiles-preload');
			}, 100 );
			
			$('.code').empty().html(function() {
				var e = effects[ effect ], c = [];
				for ( var i in e ) {
					if ( i !== 'effect' ) {
						c.push('<code>'+ i +': '+ e[i] +'</code>');
					}
				}
				return c.join('');
			});
		});
		
		$('.start').click(function() {
			$(this).hide();
			$('.stop').show();
			$('.slider').tilesSlider('start');
		});
		
		$('.stop').click(function() {
			$(this).hide();
			$('.start').show();
			$('.slider').tilesSlider('stop');
		});
		
		$('.slider').tilesSlider( $.extend( {}, defaults, effects['default'] ) );
	
	</script>
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
				    <a href="/intro/{{$v->user->id}}.html">{{$v->user->username}}</a>
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