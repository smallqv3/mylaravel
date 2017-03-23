<?php 
	
	// namespace a;
	// class obj{}
	// function love(){
	// 	echo "I love you";
	// }

	// namespace a\aa;

	// class obj{}
	// function love(){	
	// 	echo "I like you";
	// }

	// 绝对路径:$obj = new \a\obj;
	// 相对路径:$obj = new aa\obj;
	// 直接实例化,根据命名空间来定(命名空间只是namespace a,那么就实例化空间a下面的类,如果是namespace a\aa,那么就实例化a\aa下面的类):$obj = new obj;

	// 系统类
	$pdo = new PDO('mysql:host=localhost;dbname=myselfs;charset=utf8','root','root');
	print_r($pdo);

 ?>