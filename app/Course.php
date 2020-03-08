<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lesson;
class Course extends Model
{
    //课程模型
    protected $table='course';
    protected $fillable=['course_name','profession_id','course_price','course_desc','cover_img'];
    public function profession(){
        return $this->hasOne('App\Profession','id','profession_id');

    }
    public function lesson(){
    	return $this->hasMany('App\Lesson',"course_id",'id');
    }
}
