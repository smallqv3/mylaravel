<?php 

	//创建连接
	$fp = fsockopen('apis.baidu.com',80, $errno, $errstr, 10);

	if(!$fp) {
		echo $errstr;die;
	}

	//
	$http = '';

	//请求行
	$http .= "GET /apistore/weatherservice/citylist?cityname=北京 HTTP/1.1\r\n";

	//请求头
	$http .= "Host: apis.baidu.com\r\n";
	$http .= "Connection: close\r\n";
	$http .= "apikey: 1ae6f08bddd8e5cb8c34e9941cfaa93c\r\n\r\n";

	//发送
	fwrite($fp, $http);

	//获取结果
	$res = '';

	while(!feof($fp)) {
		$res .= fgets($fp);
	}

	echo $res;


 ?>