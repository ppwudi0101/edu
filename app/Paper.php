<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;
class Paper extends Model
{
    //
    protected $table="paper";
    public $timestamps=false;
    protected $fillable=["course_id","paper_name","paper_course"];

    //一个试卷所属一个课程
    public function course(){
    	return $this->hasOne("App\Course","id","course_id");
    }

}
