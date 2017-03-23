<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- 使用变量 -->
	<title>{{$title}}</title>
	<style>
	#pages a{
		display: block;;
		width: 50px;
		height: 50px;
		border: solid 1px #ddd; 
		float: left;
		text-align: center;
		line-height: 50px;
		margin: 10px 10px 0 0; 
	}
	</style>
</head>
<body>
	<!-- thinkphp中页面使用函数的书写方式:{:substr()} -->
	<!-- smarty模板引擎中页面使用函数的书写方式:{substr()} -->
	<!-- 以上两种效率都不是很快,最快的是这种:<?php echo 'iloveyou'; ?> -->
	<!-- 使用函数 <?php echo time(); ?> <?= time(); ?> blade模板引擎作用:做数据和页面进行分离的角色 --> 
	当前时间:<span style="color:red;">{{date('Y-m-d H:i:s', time())}}</span><br>
	格式化字符串:<span style="color:yellowgreen">{{date('Y-m-d H:i:s', time())}}</span><br>
	字符串截取:<span style="color:green">{{mb_substr($title, 0, 2)}}</span><br>
	<hr>
	<!-- 使用默认值 -->
	欢迎您回来:{{$username or 'guest'}}<hr>

	<!-- html代码显示 -->
	分页的页码:
	<div id="pages">
	{!!$page!!}

	<?php 

		$a = 'iloveyou';
		echo $a;
	 ?>
	</div>
</body>
</html>