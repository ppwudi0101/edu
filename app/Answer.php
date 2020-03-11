<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //答案模型类
    protected $table ="answer";
    protected $fillable=["paper_id","question_id","stu_id","answer_result","answer_score","right_wrong"];
    public $tiemstamps=false;


  

    

}