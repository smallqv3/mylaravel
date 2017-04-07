<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->comment('主键字段ID');
            $table->string('title')->comment('文章标题');
            $table->text('content')->comment('文章内容');
            $table->integer('user_id')->comment('发布者ID');
            $table->integer('cate_id')->comment('分类ID');
            $table->string('img')->comment('文章主图');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
