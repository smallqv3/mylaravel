<?php 
	
	//引入自动加载文件
	include './vendor/autoload.php';

	// use Endroid\QrCode\QrCode;

	// $qrCode = new QrCode();
	// $qrCode
	//     ->setText('http://www.itxdl.cn')
	//     ->setSize(300)
	//     ->setPadding(10)
	//     ->setErrorCorrection('high')
	//     ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
	//     ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
	//     ->setLabelFontSize(16)
	//     ->setImageType(QrCode::IMAGE_TYPE_PNG)
	// ;

	// // now we can directly output the qrcode
	// header('Content-Type: '.$qrCode->getContentType());
	// $qrCode->render();

	// // or create a response object
	// $response = new Response($qrCode->get(), 200, array('Content-Type' => $qrCode->getContentType()));

	//使用curl类文件  进行请求发送
	// $curl = new \xiaohigh\Curl;

	// 调用方法 发送请求
	// $res = $curl->get('http://www.itxdl.cn');

	//创建验证码使用
	// use Gregwar\Captcha\CaptchaBuilder;

	// $builder = new CaptchaBuilder;
	// $builder->build();

	// header('Content-type: image/jpeg');//设置响应头信息
	// $builder->output();

	//简单的分词功能
	//实例化对象
	// $obj = new \xiaohigh\Pscws4\Pscws4;

	//调用实现分词功能
	// $str = '五年前的今天，Composer 诞生了。在某些方面，这感觉就像昨天发生的事，至少它不像过去了五年。但在其他方面，好像是上辈子的事了，没有一个完整的 PHP 生态系统，我的手指几乎都不记得如何编写 PHP 代码了。';
	// $res = $obj -> run($str, 10);

	//打印结果
	// print_r($res);

 ?>