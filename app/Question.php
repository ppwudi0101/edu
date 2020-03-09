<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table="question";
    public $timestamps=false;
    protected $fillable=["paper_id","question_name","question_score","question_type","question_answer","option_a","option_b","option_c","option_d"];

    //定义一个数字与答案的对应关系
    public static $QUESTION_ANSWER=[
    	"1"=>"A",
    	"2"=>"B",
    	"3"=>"AB",
    	"4"=>"C",
    	"5"=>"AC",
    	"6"=>"BC",
    	"7"=>"ABC",
    	"8"=>"D",
    	"9"=>"AD",
    	"10"=>"BD",
    	"11"=>"ABD",
    	"12"=>"CD",
    	"13"=>"ACD",
    	"14"=>"BCD",
    	"15"=>"ABCD"
    ];
}
