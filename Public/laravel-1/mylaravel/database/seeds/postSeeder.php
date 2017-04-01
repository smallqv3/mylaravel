<?php

use Illuminate\Database\Seeder;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [];
        // 循环
        for($a = 0; $a < 30; $a++){
        	$tmp = [];
        	$tmp['title'] = str_random(20); // str_random()随机字符串
        	$tmp['content'] = str_random(100);
        	$tmp['created_at'] = date('Y-m-d H:i:s');
        	$tmp['updated_at'] = date('Y-m-d H:i:s');
        	$data[] = $tmp;
        }
        // 插入
        DB::table('posts')->insert($data);
    }
}
