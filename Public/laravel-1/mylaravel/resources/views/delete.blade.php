<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>delete请求页面</title>
</head>
<body>
	<div></div>
	<form action="/del" method="post">
		用户名:<input type="text" name="username"><br>
		密码:<input type="password" name="password"><br>
		<input type="hidden" name="_method" value="DELETE">
		<button>点击提交</button>
		{{csrf_field()}}
	</form>
</body>
</html>