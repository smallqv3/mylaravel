<?php 

	// 创建连接
	$fp = fsockopen('nuker.top', 80, $errno, $errstr, 10);

	// 检测
	if(!$fp){
		echo $errstr;exit;
	}

	// 拼接http请求报文
	$http = '';

	// 请求行
	$http .= "GET nuker.top?p=528 HTTP1.1\r\n";

	// 请求头
	$http .= "Host: nuker.top\r\n";
	$http .= "Connection: close\r\n";

	// 发送请求
	fwrite($fp, $http);

	// 获取结果
	$res = ''; // 自定义空字符串
	while (!feof($fp)) { // feof()检测是否已到达文件末尾
		$res .= fgets($fp);
	}

	// 输出
	echo $res;


 ?>