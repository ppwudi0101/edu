<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Paper;
use Validator;
class QuestionController extends Controller
{
    //试卷列表首页
    public function index(Request $request,Paper $paper){
    	$question=Question::where('paper_id',$paper->id)->get();
    	return view("admin.question.index",compact("paper","question"));
    }

    public function add(Request $request,Paper $paper){
    	if($request->isMethod("get")){
    		return view("admin.question.add",compact("paper"));

    	}else if($request->isMethod("post")){
    		$rules=[
    			"question_name"=>"required",
    			"question_score"=>"required|integer",
    			"question_type"=>"required",
    			"option_a"=>"required",
    			"option_a"=>"required",
    			"option_a"=>"required",
    			"option_a"=>"required",
    			"question_answer"=>"array"
    		];
    		$msg=[
    			"question_name.required"=>"试题名称不能为空",
    			"question_score.required"=>"试题分数不能为空",
    			"question_score.integer"=>"试题分数只能是数字",
    			"question_type"=>"试题类型不能为空",
    			"option_a.required"=>"选项A不能为空",
    			"option_b.required"=>"选项B不能为空",
    			"option_c.required"=>"选项C不能为空",
    			"option_d.required"=>"选项D不能为空",
    			"question_answer.array"=>"答案数据不合法"

    		];
    		$validator=Validator::make($request->all(),$rules,$msg);
    		if($validator->passes()){
    			//数据验证通过
    			$data=$request->all();
    			unset($data["_token"]);
    			$data["question_answer"]=array_sum($data["question_answer"]);
    			$data["paper_id"]=$paper->id;
    			$res=Question::create($data);
    			if($res){
    				//添加成功
    				return ["info"=>1];
    			}else{
    				return ["info"=>0,"error"=>"添加失败"];
    			}
    		}else{
    			$error=collect($validator->messages())->implode(0,",");
    			return ["info"=>0,"error"=>$error];
    		}
    	}

    }
}
