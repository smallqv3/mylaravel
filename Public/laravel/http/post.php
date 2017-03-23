<?php 

	// 创建连接
	$fp = fsockopen('127.0.0.1', 80, $errno, $errstr, 10);

	// 判断
	if(!$fp){
		echo $errstr;exit;
	}

	$http = "";

	// 请求行
	$http .= "POST /class/Public/laravel/http/server.php HTTP/1.1\r\n";

	// 请求头
	$http .= "Host: localhost\r\n";
	$http .= "Connection: close\r\n";
	$http .= "Cookie: username=admin;uid=200\r\n"; // cookie模拟
	$http .= "User-agent: firefox-chrome\r\n"; // 可请求的浏览器
	$http .= "Content-type: application/x-www-form-urlencoded\r\n"; // post访问请求
	$http .= "Content-length: 37\r\n\r\n";

	// 请求体
	$http .= "emali=xiaohign@163.com&username=admin\r\n";

	// 发送
	fwrite($fp, $http);

	$res = '';
	// 获取结果
	while (!feof($fp)) {
		$res .= fgets($fp);
	}

	// 输出结果
	echo $res;

 ?>