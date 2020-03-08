<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class IndexController extends Controller
{
    //展示后台首页
    public function index(){
    
    	//获取登录管理员的ID
    	$id=Auth::guard('admin')->user()->id;
    
    	$info=DB::table('manager as m')->join('role as r','m.role_id','=','r.id')->select("r.priv_ids")->where('m.id',$id)->first();
    	try{
    		//正常取出数据
    		$priv_ids=$info->priv_ids;
    		$ids=explode(',',$priv_ids);
    		$level_A=DB::table('privilege')->whereIn('id',$ids)->where('level_name',0)->get();
    		$level_B=DB::table('privilege')->whereIn('id',$ids)->where('level_name',1)->get();

    	}catch(\Exception $e){
    		if($id==152){
    			$level_A=DB::table('privilege')->where('level_name',0)->get();
    			$level_B=DB::table('privilege')->where('level_name',1)->get();
    		}else{
    			$level_A=[];
    			$level_B=[];
    			
    		}
    	}
        return view('admin.index.index',compact('level_A','level_B'));
    }
    //展示右边具体内容页面
    public function welcome(){
        return view('admin.index.welcome');
    }
}
