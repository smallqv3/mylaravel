<?php 
// 引入自动加载文件
include './vendor/autoload.php';

// use Endroid\QrCode\QrCode;

// $qrCode = new QrCode();
// $qrCode
//     ->setText('http://www.itxdl.cn') // 二维码连接地址
//     ->setSize(300)
//     ->setPadding(10)
//     ->setErrorCorrection('high')
//     ->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0])
//     ->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0])
//     // ->setLabel('Scan the code') // 标注
//     ->setLabelFontSize(16)
//     ->setImageType(QrCode::IMAGE_TYPE_PNG)
// ;

// // now we can directly output the qrcode
// header('Content-Type: '.$qrCode->getContentType());
// $qrCode->render();

// // save it to a file
// $qrCode->save('qrcode.png');

// // or create a response object
// $response = new Response($qrCode->get(), 200, ['Content-Type' => $qrCode->getContentType()]);

// // 使用curl类文件 进行请求发送
// $curl = new \xiaohigh\Curl; // 实例化curl
// // 调用方法 发送请求
// $res = $curl -> get('http://www.itxdl.cn');

// 创建验证码使用
// use Gregwar\Captcha\CaptchaBuilder;

// $builder = new CaptchaBuilder;
// $builder->build();

// header('Content-type: image/jpeg'); // 设置响应头信息
// $builder->output();

// echo $res;




// 简单的分词功能
//实例化对象
$obj = new \xiaohigh\Pscws4\Pscws4;

//调用实现分词功能
$res = $obj -> run('SCWS 是 Simple Chinese Word Segmentation 的首字母缩写（即：简易中文分词系统）。
这是一套基于词频词典的机械式中文分词引擎，它能将一整段的中文文本基本正确地切分成词。 词是中文的最小语素单位，但在书写时并不像英语会在词之间用空格分开， 所以如何准确并快速分词一直是中文分词的攻关难点。', 10);

//打印结果
print_r($res);
?>