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
        	$tmp['content'] = '<p>以vue写前端,python作后台的博客搭建,mvvm的技术,让你有一种不一样的体验<br/></p>';
        	$tmp['user_id'] = 1;
        	$tmp['cate_id'] = rand(1, 15);
        	$tmp['img'] = '/Uploads/2017-04-24/1493004034376278.jpg';

            $tmp['created_at'] = date('Y-m-d H:i:s');
            $tmp['updated_at'] = date('Y-m-d H:i:s');
        	$arr[] = $tmp;
        }
        // 数据填充
        DB::table('posts')->insert($arr);
    }
}
