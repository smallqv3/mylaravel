<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
        	$tmp['username'] = str_random(20);
        	$tmp['email'] = str_random(8).'qq.com';
        	$tmp['password'] = Hash::make('smallqnuker');
        	$tmp['profile'] = '/Uploads/20170411/1491898045295172.jpg';
        	$tmp['intro'] = str_random(100);
        	$tmp['created_at'] = date('Y-m-d H:i:s');
        	$tmp['updated_at'] = date('Y-m-d H:i:s');
            $tmp['remember_token'] = str_random(50);
        	$arr[] = $tmp;
        }
        // 数据填充插入
        DB::table('users')->insert($arr);
    }
}
