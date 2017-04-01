<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hasTable('posts')){        
            // 创建表
            Schema::create('posts', function (Blueprint $table) {
                // 创建主键字段
                $table->increments('id')->comment('主键字段');
                $table->string('title')->comment('文章标题');
                $table->text('content')->comment('文章的内容');
                $table->timestamps(); // 自动帮你创建两个字段:添加时间字段(created_at),修改时间字段(updated_at)
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 刷新数据表时会自动清除之前的所有数据
        Schema::drop('posts');
    }
}
