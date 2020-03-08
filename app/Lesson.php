<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model{
    //课时模型
    protected $table="lesson";
    protected $fillable=['lesson_name','course_id','lesson_length',
        'video_address','teacher_name','cover_img','lesson_desc','status'];
    public function course(){
        return $this->hasOne('App\Course','id','course_id');
    }
}
