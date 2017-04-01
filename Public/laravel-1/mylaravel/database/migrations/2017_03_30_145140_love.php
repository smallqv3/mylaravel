<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Love extends Migration
{

    /**
     * 检索索引是否存在的自定义方法
     * $table : 表名名称
     * $name : 索引名称
     */
    // 检索索引是否存在的自定义方法($table:表名名称,$name:索引名称)
    public function hasIndex($table, $name)
    {
        $conn = Schema::getConnection();
        $dbSchemaManager = $conn->getDoctrineSchemaManager();
        $doctrineTable = $dbSchemaManager->listTableDetails($table);
        return $doctrineTable->hasIndex($name);
    }    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 如果当前数据中没有 test表则创建test表
        if(!Schema::hasTable('love')){
            // 创建表
            Schema::create('love', function (Blueprint $table) {
                // 创建主键字段
                $table->increments('id')->comment('主键字段');
                // 创建用户名字段
                $table->string('username')->nullable()->default('a')->comment('用户名');
                // 创建密码字段
                $table->char('password', 100)->comment('密码');
                // 创建新字段
                $table->string('nickname')->comment('昵称');
                $table->integer('group_id')->comment('组id');

                // 唯一索引
                $table->unique('username');
                // 一般索引
                $table->index('nickname');
                // 设置数据表的引擎
                $table->engine = 'innodb';
            });
        }else{            
            // 如果表存在的话 调整表结构
            Schema::table('love', function($table) {
                if(!Schema::hasColumn('love', 'sex')) {
                    // 添加
                    $table->tinyInteger('sex')->comment('性别');
                }
                // 检测表字段是否存在
                if(!Schema::hasColumn('love', 'age')) {
                    $table->integer('age')->default('15')->comment('age');
                }
                if(!Schema::hasColumn('love', 'email')){
                    $table->char('email')->comment('邮箱');
                }


                if(Schema::hasColumn('love', 'password')) {
                    // 修改字段类型
                    $table->text('password')->change();
                    
                }
                if(Schema::hasColumn('love', 'email')) {
                    // 删除字段类型
                    $table->dropColumn('email');
                }

                                
                // 创建索引
                // $table->index('nickname');
                // $table->index('sex');

                // $table->unique('username');

                
                // if($this->hasIndex('love', 'PRIMARY')) {
                //     // 删除主键索引
                //     $table->dropPrimary('id');
                // }
                // if($this->hasIndex('love', 'love_username_unique')) {
                //     // 删除唯一索引
                //     $table->dropUnique('love_username_unique');
                // }
                // if($this->hasIndex('love', 'love_nickname_index')) {
                //     // 删除一般索引
                //     $table->dropIndex('love_nickname_index');
                // }
                // if($this->hasIndex('love', 'love_sex_index')) {
                //     // 删除一般索引
                //     $table->dropIndex('love_sex_index');
                // }
                
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
        // 删除表(弊端:作用类似mysql中的truncate table love,清除所有数据)
        // Schema::drop('love');
    }
}
