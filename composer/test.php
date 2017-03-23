<?php 

	// $res = substr('我爱你亲爱的姑娘....', 0, 5);

	$res = mb_substr('我爱你亲爱的姑娘...', 0, 6, 'utf-8');

	echo $res;

	// composer create-project laravel/laravel your-project-name --prefer-dist "5.1.*"
	// 命令      命令(创建项目)   包的名称        你的文件夹名称   优先   版本   

 ?>