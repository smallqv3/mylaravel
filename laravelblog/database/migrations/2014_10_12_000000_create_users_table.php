<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('主键字段ID');
            $table->string('username')->comment('用户名称');
            $table->string('email')->unique()->comment('用户邮箱');
            $table->string('password', 60)->comment('用户密码');
            $table->rememberToken()->comment('找回密码标记');
            $table->string('profile')->comment('个人头像');
            $table->text('intro')->comment('个人介绍');
            $table->timestamps();
            $table->softDeletes()->comment('软删除');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
