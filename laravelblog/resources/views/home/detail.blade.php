@extends('layout.home')

@section('keyword')
@endsection
@section('title', $article->title)
@section('article')



<style type="text/css">
	.article-header{
		width:650px;
		margin: 0;
		height: 100px;
		overflow: hidden;
		float: left;
		margin: 15px 0 15px 15px;
		border-bottom: solid 1px #DCDCDC;		
	}
	.article-title{
		font-size: 28px;
		text-align: center;
	}
	.article-meta{
		text-align: center;
	}
	.article-meta span{
		padding: 10px;
	}
	.content{
		width: 680px;
		height: auto;
		border: solid 1px #DCDCDC;
		float: left;
	}
	.article-content{
		width:650px;

		text-indent: 30px;
	    margin-bottom: 18px;
	    word-wrap: break-word;
	    font-size: 16px;
	}

	.article-content p{
		margin: 10px 0 10px 0;
	}
	.article-tags {
	    margin: 30px 0;
	    text-align: center;
	    cursor: default;
	    font-size: 14px;
	}


	.article-pages{
		width: 650px;
		border: solid 1px #DCDCDC;
		border-radius: 5px;
		margin: 15px;
		padding: 10px 0 0 0;
		font-size: 14px;
		background-color: white;
	}
	.article-to{
		padding: 0 0 10px 10px;
	}
	.article-to a{
		color: #00F5FF;
	}
	.article-to-intro{
		background-color: #3399cc;
		color: white;
	}
</style>


<div class="content">
	<header class="article-header">
		<h1 class="article-title">
			<a href="{{route('detail', ['id'=>$article->id])}}" title="用DTcms做一个独立博客网站（响应式模板）"
			draggable="false">
				{{$article->title}}
			</a>
		</h1>
		<div class="article-meta">
			<span class="item article-meta-time">
				<time class="time" data-toggle="tooltip" data-placement="bottom" title=""
				data-original-title="发表时间：2016-10-14">
					时间:
					{{date('Y-m-d', strtotime($article->created_at))}}
				</time>
			</span>
			<span class="item article-meta-source" data-toggle="tooltip" data-placement="bottom"
			title="" data-original-title="来源：木庄网络博客">
				发布者:
				{{$article->user->username}}
			</span>
			
			<span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom"
			title="" data-original-title="浏览量：219">
				浏览:
				219
			</span>
			<span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom"
			title="" data-original-title="评论量">
				评论:
				暂无
			</span>
		</div>
	</header>
	<article class="article-content">
		<p>
			<img data-original="{{$article->img}}"
			src="{{$article->img}}"
			alt="" draggable="false" style="display: block;" width="650px;">
		</p>
		<p>
			{!!$article->content!!}
		</p>
		
		<div class="bdsharebuttonbox bdshare-button-style1-32" data-bd-bind="1493088639237">
			<a href="#" class="bds_more" data-cmd="more" draggable="false">
			</a>
			<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间" draggable="false">
			</a>
			<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博" draggable="false">
			</a>
			<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博" draggable="false">
			</a>
			<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信" draggable="false">
			</a>
			<a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧" draggable="false">
			</a>
			<a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友" draggable="false">
			</a>
		</div>
		<script>
			window._bd_share_config = {
	    "common": {
	        "bdSnsKey": {},
	        "bdText": "",
	        "bdMini": "2",
	        "bdMiniList": false,
	        "bdPic": "",
	        "bdStyle": "1",
	        "bdSize": "32"
	    },
	    "share": {}
	};
	with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
		</script>
	</article>
	<style type="text/css">
	
	.taglist a{
		color: #00F5FF;

	}
	.taglist a:hover{
		color: white;
		background-color: #00F5FF;
	}
	</style>
	<?php 
	$post = \App\Post::find($article->id);
	$tag = $post->tag->toArray();
		
	?>
	<!-- get_object_vars($tag): 对象转换数组 -->
	<div class="article-tags">
		标签：@if(empty($tag)) 暂无 @endif
		<?php foreach ($tag as $k => $v) { ?>
		
		<span class="taglist"><a href="/" rel="tag" draggable="false">
			{{$v['name']}}
		</a></span>
		<?php } ?>
		
	</div>
	
	<div class="article-pages">
		<?php
		// 取得上一篇文章的ID 方法在function.php 
		$previd = getPrevArticleId($article->id);
		// 取得下一篇文章的ID 方法在function.php
		$nextid = getNextArticleId($article->id);		
		?>
		@if(empty($previd))
		<div class="article-to">上一篇: 没有上一篇文章了</div>
		@elseif(!empty($previd))
		<?php $prev = \App\Post::find($previd); ?>
		<div class="article-to">上一篇: <a href="{{route('detail', ['id'=>$prev->id])}}">{{$prev->title}}</a></div>
		@endif

		@if(empty($nextid))
		<div class="article-to">下一篇: 没有下一篇文章了</div>
		@elseif(!empty($nextid))
		<?php $next = \App\Post::find($nextid); ?>
		<div class="article-to">下一篇: <a href="{{route('detail', ['id'=>$next->id])}}">{{$next->title}}</a></div>
		@endif
		<div class="article-to">声&nbsp;&nbsp;&nbsp;明: <span class="article-to-intro">本文由小no原创,转载请注明: <a href="{{route('detail', ['id'=>$article->id])}}">{{route('detail', ['id'=>$article->id])}}</a></span></div>		
	</div>

</div>



@endsection





