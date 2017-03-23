<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="/form" method="post">
		<input type="text" name="username">
		<input type="text" name="password">
		<input type="submit" value="提交">
		{{csrf_field()}} 
	</form>
</body>
</html>