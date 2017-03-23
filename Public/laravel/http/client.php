<?php 
	
	// 创建连接 preg_match('//', $str, $res);
	$fp = fsockopen('127.0.0.1', 80, $errno, $errstr, 10); // fsockopen('访问地址',端口,错误编号,错误信息, 请求超时时间)

	// 检测
	if(!$fp){
		echo $errstr;exit;
	}

	// 拼接http请求报文
	$http = "";

	// 请求报文包括三个部分  请求行  请求头  请求体
	$http .= "GET /class/Public/laravel/http/server.php?uid=100&name=xiaohign HTTP/1.1\r\n"; // 请求行包括三个部分:请求方式(get or post)请求脚本的绝对路径: /class/Public/laravel/http/server.php 协议的版本号: HTTP/1.1   协议限定\r\n必须要加,否则请求不成功,并且单引号不解析大部分转义字符

	// 请求头信息
	$http .= "Host: 127.0.0.1\r\n";
	$http .= "Connection: close\r\n\r\n"; // keep-alive:通道不断开,留给下一个请求,提高请求速度

	// 请求体 无  (get请求不需要请求体,post请求需要)

	// 发送请求
	fwrite($fp, $http); // 向请求流当中写入内容

	$res = '';
	// 获取结果
	while (!feof($fp)) {
		$res .= fgets($fp); // fgets()默认读取1024字节=1KB内容
	}

	// 输出内容
	echo $res;
 ?>