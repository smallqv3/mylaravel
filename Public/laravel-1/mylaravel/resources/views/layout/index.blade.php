<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
</head>
<body>
	<div style="height:100px;background:#123456"></div>
	@section('content')
	<div style="height:400px;background:#acbdef">
		@section('smallq')
		@show
	</div>
	@show

	@section('footer')
	<div style="height:100px;background:#abcdef"></div>
	@show

	@section('js')
	@show
</body>
</html>