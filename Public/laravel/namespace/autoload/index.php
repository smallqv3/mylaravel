<?php 	
	// 魔术函数(__autoload自动实例化类文件)
	function __autoload($className){ // A\a
		// echo $className;  
		//  '\' 替换成 '/'
		$class = str_replace('\\','/',$className); // A/a
		// 拼接   需引入的文件路径(./A/a.php)
		$path = './' . $class . '.php';
		// echo basename($path).'<br>';
		// echo scandir(basename($path));
		// 检测路径文件是否存在
		if(file_exists($path)){
			include $path; // 引入该类文件
		}else{
			echo "aaaaaaaaaaaa";
		}
	}
	// composer config -g repo.packagist composer https://packagist.phpcomposer.com
	// $obja = new \A\a;
	// print_r($obja);
	// $obj = new \B\a; // include './Org/a.php'
	// print_r($obj);
	// echo __FILE__;
	// echo __DIR__;
	// echo getcwd();
	// echo $_SERVER["DOCUMENT_ROOT"];
	// echo $_SERVER["SCRIPT_FILENAME"];
	// echo $_SERVER["PHP_SELF"];
 ?>