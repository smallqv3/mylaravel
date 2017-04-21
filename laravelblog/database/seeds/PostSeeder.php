<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
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
        for($a = 0; $a < 100; $a++) {
        	$tmp = [];
        	$tmp['title'] = str_random(15);
        	$tmp['content'] = str_random(100);
        	$tmp['user_id'] = rand(1, 15);
        	$tmp['cate_id'] = rand(1, 15);
        	$tmp['img'] = '/Uploads/2017-04-20/1492671545725588.jpg';
        	$arr[] = $tmp;
        }
        // 数据填充
        DB::table('posts')->insert($arr);
    }
}
