<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cate extends Model
{
    // 
    /**
     * 关联模型 cate和post是一对多的关系
     */
    public function post()
    {
    	return $this->hasMany('\App\Post', 'cate_id');
    }
}
