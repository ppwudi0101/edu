<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Paper;
class QuestionController extends Controller
{
    //试卷列表首页
    public function index(Request $request,Paper $paper){
    	$question=Question::where('paper_id',$paper->id)->get();
    	return view("admin.question.index",compact("paper","question"));
    }
}
