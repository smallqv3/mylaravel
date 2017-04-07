<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password']; // 只针对create()批量创建才会起效果

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /**
     * 一对一的关系设置(关联模型)
     */
    public function userinfo()
    {
        return $this->hasOne('App\Userinfo', 'user_id'); // 第一个参数:关联类的位置路径 第二个参数:所对应的关联外键
    }

    /**
     * 一对多的关系设置
     */
    public function post()
    {

        return $this->hasMany('App\Post', 'user_id');
    }

    /**
     * 属于关系创建
     */
    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }

    /**
     * 多对多的关系创建
     */
    public function group()
    {
        return $this->belongsToMany('App\Group', 'group_user', 'user_id', 'group_id'); // 第一个参数:关联类的位置路径 第二个参数:多对多关联表的中间表名称 第三个参数:本类在关联表里面的外键 第四个参数:中间表在关联表里面的外键
    }
}
