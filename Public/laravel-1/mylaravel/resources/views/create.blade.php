<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文章的添加页面</title>
</head>
<body>
	<form action="/article" method="post">
		<input type="text" name="a">
		<button>添加</button>
		{{csrf_field()}}
	</form>
</body>
</html>