<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Test extends Migration
{

    /**
     * Run the migrations.
     * 执行迁移时进行操作
     *
     * @return void
     */
    public function up()
    {
        // // 创建表
        // Schema::create('love', function (Blueprint $table) {
        //     // 创建主键字段
        //     $table->increments('id')->comment('主键字段');
        //     // 创建用户名字段
        //     $table->string('username')->nullable()->default('a')->comment('用户名');
        //     // 创建密码字段
        //     $table->char('password', 100)->comment('密码');
        //     // 创建新字段
        //     $table->string('nickname')->comment('昵称');

        // });
    }

    /**
     * Reverse the migrations.
     * 信息回滚时进行操作
     *
     * @return void
     */
    public function down()
    {
        // // 删除表
        // Schema::drop('love');
    }
}
