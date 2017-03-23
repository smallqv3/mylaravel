<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文章的修改</title>
</head>
<body>
	<form action="/article/20" method="post">
		<input type="text" name="username">
		<input type="hidden" name="_method" value="PUT">
		{{csrf_field()}}
		<input type="submit" value="点击删除">
	</form>
	<form action="/article/20" method="post">
		<input type="text" name="username">
		<input type="hidden" name="_method" value="DELETE">
		{{csrf_field()}}
		<input type="submit" value="点击修改">
	</form>
</body>
</html>