<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
	ul{
		list-style: none;
	}
	li{
		width: 200px;
		height: 100px;
		border: solid 1px #ccc;
		float: left;
		/*text-align: center;
		line-height: 100px;
		border-radius: 5px;*/
		color: green;
	}
	</style>
</head>
<body>
	<!-- for -->
	@for($i = 1; $i <= 10; $i++)
	{{$i}} <br>
	@endfor

	<hr>

	<!-- foreach -->
	<ul>
	@foreach($user as $k => $v)
	<li>
	名字:{{$v['name']}}<br>
	年纪:{{$v['age']}}<br>
	身高:{{$v['height']}}<br>
	</li>
	@endforeach
	</ul>
</body>
</html>