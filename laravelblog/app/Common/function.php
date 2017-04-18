<?php 

	function test()
	{
		echo 'aaaaaaaaaaaaaaaaa';
	}

	/**
	 * 通过分类id获取分类名称
	 */
	function getCateNameByCateId($id)
	{
		if($id == 0){
			return "顶级分类";
		}
		$cate = \App\Cate::find($id);
		if(empty($cate)) {
			return '无';
		}else{
			return $cate->name;
		}
	}


 ?>