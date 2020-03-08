<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Privilege;
use Validator;
class PrivilegeController extends Controller
{
    //权限列表展示
    public function index(Request $request){
    	if($request->isMethod('get')){
    		$privilege=Privilege::all()->toArray();
    		$privilege=getTree($privilege);
    		return view('admin.privilege.index',compact('privilege'));
    	}
    }

    //添加权限
    public function add(Request $request){
    	if($request->isMethod('get')){
    		$privilege=Privilege::where("level_name","!=",2)->get();
	    	$privilege=getTree($privilege);
	    	return view('admin.privilege.add',compact('privilege'));
    	}else if($request->isMethod('post')){
    		//验证数据
    		$rules=[
    			"priv_name"=>"required",
    			"parent_id"=>"required |integer"
    		];
    		$msg=[
    			"priv_name.required"=>"权限名称不能为空",
    			"parent_id.required"=>"请选择上级",
    			"parent_id.integer"=>"数据不合法"
    		];

    		$validator=Validator::make($request->all(),$rules,$msg);

    		if($validator->passes()){
    			//验证通过
    			$res=Privilege::create($request->all());
    			if($res){
    				//添加成功
    				return ["info"=>1];
    			}else{
    				return ["info"=>0];
    			}


    		}else{
    			// //验证不通过
    			// $error=collect($validator->message())->
    			$error=collect($validator->messages())->implode('0',",");
    
    			return ["info"=>0,"error"=>$error];
    		}
    	}
    	
    }
}
