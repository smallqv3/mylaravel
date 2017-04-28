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

	/**
	 * 取得上一篇文章的ID
	 */
	function getPrevArticleId($id)
	{
		// 多条件查询
		return \App\Post::where('id', '<', $id)->where(function($query){
			$query->where('isdelete', '0');
		})->max('id');
	}


	/**
	 * 取得下一篇文章的ID 
	 */
	function getNextArticleId($id)
	{
		// 多条件查询
		return \App\Post::where('id', '>', $id)->where(function($query){
			$query->where('isdelete', '0');
		})->min('id');
	}

 ?>