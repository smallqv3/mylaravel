<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Test extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('test', function(Blueprint $table){
            $table->increments('id')->comment('主键字段');
            $table->string('username')->nullable()->default('a')->comment('用户名');
            $table->char('password', 100)->comment('密码');
            $table->string('nickname')->comment('昵称');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('test');
    }
}
