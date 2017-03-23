<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>aaaaaaaaaaaaaaa</title>
</head>
<body>
	<form action="/goods/insert" method="post">
		<input type="text" name="username"><br>
		<button>点击提交</button>
		{{csrf_field()}}
	</form>
</body>
</html>