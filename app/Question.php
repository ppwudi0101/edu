<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table="question";
    public $timestamps=false;
    protected $fillable=["paper_id","question_name","question_score","question_type","question_answer","option_a","option_b","option_c","option_d"];
}
