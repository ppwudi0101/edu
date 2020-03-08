<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //添加课程数据
        DB::table('course')->insert([
            [
                'course_name'=>'PHP初级篇-1',
                'profession_id'=>1,
                'coures_price'=>648.88,
                'course_desc'=>'非常值得学习'
            ],
            [
                'course_name'=>'PHP初级篇-2',
                'profession_id'=>1,
                'coures_price'=>168.88,
                'course_desc'=>'非常值得学习'
            ],
            [
                'course_name'=>'PHP高级篇-1',
                'profession_id'=>2,
                'coures_price'=>1588.88,
                'course_desc'=>'非常值得学习'
            ],
            [
                'course_name'=>'PHP高级篇-2',
                'profession_id'=>2,
                'coures_price'=>1688.88,
                'course_desc'=>'非常值得学习'
            ]
        ]);
    }
}
