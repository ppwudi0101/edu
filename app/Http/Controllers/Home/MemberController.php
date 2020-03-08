<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
class MemberController extends Controller
{
    //展示首页
    public function login(){
    	return view('home.member.login');
    }

    //登录验证
    public function login_check(Request $request){
    	//数据验证规则
    	$rules=[
    		"username"=>"required | min:2",
    		"password"=>"required | size:6"
    	];
    	$msg=[
    		"username.required"=>"用户名不能为空",
    		"username.min"=>"用户名长度不得低于2位",
    		"password.required"=>"密码不能为空",
    		"password.size"=>"密码长度必须为6位",
    	];
    	$validator=Validator::make($request->all(),$rules,$msg);
    	if($validator->passes()){
    		//验证成功
    		$res=Auth::guard("home")->attempt($request->only(["username","password"]));
    		if($res){
    			return redirect("/");
    		}else{
    			return back()->withErrors(["errors"=>"用户名或者密码错误"]);
    		}
    	}else{
    		return back()->withErrors($validator);
    	}
    }

    // public function logout(){

    // }
}
