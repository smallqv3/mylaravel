<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ajax请求测试</title>
</head>
<body>
	<button id="btn">点击发送ajax请求</button>
	<script type="text/javascript">
	var btn = document.getElementById('btn');

	btn.onclick = function(){
		// 
		var x = new XMLHttpRequest();
		// 
		x.onreadystatechange = function(){
			if(x.readyState == 4 && x.status == 200) {
				console.log(x.responseText);
				alert(x.responseText);
			}
		}


		// x.open('GET', '/ajax', true);
		// x.send();	

		x.open('POST', '/ajax', true);

		x.setRequestHeader('content-type', 'application/x-www-form-urlencoded'); // ajax发送POST请求才会有

		x.send('_token={{csrf_token()}}&user=admin');
	} 
	</script>
</body>
</html>