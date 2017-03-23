<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>post请求页面</title>
</head>
<body>
	<div></div>
	<form action="/insert" method="post">
		用户名:<input type="text" name="username"><br>
		密码:<input type="password" name="password"><br>
		<button>点击提交</button>
		{{csrf_field()}}
	</form>
</body>
</html>