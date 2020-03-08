<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void;
     */
    public function run()
    {
        //添加课时表数据
        DB::table('lesson')->insert(
            [
                [
                    'lesson_name'=>'PHP小白零基础入门',
                    'lesson_desc'=>'入门课程',
                    'course_id'=>1,
                    'teacher_name'=>'黄米威'
                ],
                [
                    'lesson_name'=>'PHP入门篇',
                    'lesson_desc'=>'入门课程',
                    'course_id'=>2,
                    'teacher_name'=>'娄德亮'
                ],
                [
                    'lesson_name'=>'PHP进阶篇',
                    'lesson_desc'=>'高级课程',
                    'course_id'=>3,
                    'teacher_name'=>'黄米威'
                ],
                [
                    'lesson_name'=>'PHP消息队列实用及应用',
                    'lesson_desc'=>'高级课程',
                    'course_id'=>4,
                    'teacher_name'=>'娄德亮'
                ],

            ]
        );
    }
}
