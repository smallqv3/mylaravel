<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>闪存表单</title>
</head>
<body>
	<form action="/flash" method="post">
		用户名:<input type="text" name="username" value="{{old('username')}}"><br>
		密码:<input type="text" name="password" value="{{old('password')}}"><br>
		年纪:<input type="text" name="smallq" value="{{old('smallq')}}"><br>
		<button>提交</button>
		{{csrf_field()}}
	</form>
</body>
</html>