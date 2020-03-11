<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paper;
use App\Question;
use DB;
use App\Answer;
class PersonController extends Controller
{
    //试卷列表
    public function paper(){
    	$paper=Paper::all();
    	return view("home.person.paper",compact("paper"));
    }

    //开始考试
    public function exam(Paper $paper){
    	$dan=Question::where("question_type",1)->where("paper_id",$paper->id)->get();
    	$duo=Question::where("question_type",2)->where("paper_id",$paper->id)->get();
    	return view("home.person.exam",compact("paper","dan","duo"));
    }

    //学员答题结果
    public function answer(Request $request,Paper $paper){
    	$data=$request->all();
    	foreach($data["answer_"] as $k=>$v){
    		//创建一个question对象
    		$q=Question::find($k);    		
    		DB::table("answer")->insertGetId([
    			"paper_id"=>$paper->id,
    			"question_id"=>$k,
    			"stu_id"=>50,
    			"answer_result"=>array_sum($v),
    			"answer_score"=>$q->is_right(array_sum($v))["score"],
    			"right_wrong"=>$q->is_right(array_sum($v))["right_wrong"]
    		]);
    	}
    	return redirect('person/result/'.$paper->id);
    }

    //考试结果页面
    public function result(Paper $paper){
    	//取出单选题和多选题
    	$dan=Question::with("answer")->where("paper_id",$paper->id)->where("question_type",1)->get();
    	$duo=Question::with("answer")->where("paper_id",$paper->id)->where("question_type",2)->get();
    	//总分
    	$total=(int)answer::sum("answer_score");
    	return view("home.person.result",compact("dan","duo","paper","total"));
    }

}
