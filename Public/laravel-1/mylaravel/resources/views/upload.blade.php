<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="/upload" method="post" enctype="multipart/form-data">
		头像<input type="file" name="profile">
		<button>点击上传</button>
		{{csrf_field()}}
	</form>
</body>
</html>