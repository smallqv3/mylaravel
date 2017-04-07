<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id')->comment('主键字段ID');
            $table->integer('user_id')->comment('用户的ID');
            $table->text('content')->comment('评论内容');
            $table->integer('pid')->default('0')->comment('父级评论的ID:0代表的是评论,大于0的话是回复');
            $table->integer('post_id')->comment('文章ID');
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
        Schema::drop('comments');
    }
}
