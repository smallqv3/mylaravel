<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 
    /**
     * 关联模型多对多操作 (文章模型关联标签模型)
     */
    public function tag()
    {
    	return $this->belongsToMany('\App\Tag', 'post_tag');
    }

    /**
     * post和cate是属于关系		cate和post是一对多的关系 当cate关联被定义之后,cate(动态属性)获取了post中被关联的cate模型中的操作,cate()方法继承了cate模型
     */

    public function cate()
    {
    	return $this->belongsTo('\App\Cate');
    }
}
