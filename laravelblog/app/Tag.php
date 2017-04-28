<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    /**
     * tag和post多对多操作
     */
    public function post()
    {
    	return $this->belongsToMany('\App\Post', 'post_tag');
    }
}
