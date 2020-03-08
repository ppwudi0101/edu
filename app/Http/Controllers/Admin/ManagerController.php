<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
class ManagerController extends Controller
{
    //管理员登录
    public function login(){
    	
    	return view('admin.manager.login');
    }

    //验证登录
    public function login_check(Request $request){
    	$rules=[
    		"username"=>"required | min:2",
    		"password"=>"required | between:6,11",
    	];
    	$msg=[

    		'username.required'=>"用户名不能为空",
    		'username.min'=>"用户名的长度不能小于2字符",
    		'password.required'=>"登录密码不能为空",
    		'password.between'=>"密码长度必须6-11位"
    	];
    	$validator = Validator::make($request->all(),$rules,$msg);
    	if($validator->passes()){
    		//验证成功
    		$res=Auth::guard('admin')->attempt($request->only(['username','password']));
    		if($res){
    			return redirect('admin/index');
    		}else{
    			return back()->withErrors(["error"=>"用户名或密码输入错误"]);
    		}
    	}else{
    		return redirect('admin/login')->withErrors($validator);
    	}
    }

    //退出登录
    public function logout(){
    	return redirect('admin/login');
    }
}
