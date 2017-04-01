<?php

use Illuminate\Database\Seeder;

class loveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arr = [];
        // 循环
        for($a = 0; $a < 20; $a++){
        	$tmp = [];
        	$tmp['group_id'] = rand(1, 10);
        	$tmp['username'] = str_random(20);
        	$tmp['password'] = str_random(20);
        	$tmp['nickname'] = str_random(20);
        	$tmp['sex'] = rand(0, 1);
        	$tmp['age'] = rand(10, 60);
        	$tmp['email'] = rand(100000, 9999999999) . '@qq.com';
        	// 压入到数组中
        	$arr[] = $tmp;
        }
        // 插入
        DB::table('love')->insert($arr);
    }
}
