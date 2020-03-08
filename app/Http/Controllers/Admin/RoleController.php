<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Privilege;
use Validator;
use DB;
class RoleController extends Controller
{
    //角色管理首页
    public function index(){

    	$roles=Role::all();
    	return view('admin.role.index',compact('roles'));
    }

    //管理员权限修改
    public function update(Request $request,Role $role){
    	if($request->isMethod('get')){
    		$priv_A=Privilege::where('level_name',0)->get();
    		$priv_B=Privilege::where('level_name',1)->get();
    		$priv_C=Privilege::where('level_name',2)->get();
    		//获取当前角色的权限信息
    		$ids=explode(',',$role->priv_ids);
    		return view('admin.role.update',compact('role','priv_A','priv_B','priv_C','ids'));
    	}else if($request->isMethod('post')){
    		$rules=[
    			'role_name'=>'required|unique:role,role_name,'.$role->id,
    			'priv_ids'=>'required|array',
    		];

    		$msg=[
    			'role_name.required'=>"角色名称不能为空",
    			'role_name.unique'=>"角色名称不得重复",
    			'priv_ids.required'=>"权限数据不能为空",
    			'priv_ids.array'=>"权限数据不合法",
    		];
    		$validator=Validator::make($request->all(),$rules,$msg);


    		if($validator->passes()){

    			//数据验证通过
    			//获取角色名称
    			$role_name=$request->input('role_name');
    			//获取权限数组
    			$priv_ids=$request->input('priv_ids');

    			$ca_all=DB::table('privilege')->select(DB::raw("concat(controller_name,'-',action_name) as result"))->whereIn('id',$priv_ids)->where('level_name',"!=",0)->pluck("result")->toArray();

    			$ca_all=implode(',',$ca_all);
    			$priv_ids=implode(',',$priv_ids);
    			$res=$role->update([
    				'role_name'=>$request->input('role_name'),
    				'priv_ids'=>$priv_ids,
    				'priv_ac'=>$ca_all
    			]);

    			if($res){
    				//修改成功
    				return ["info"=>1];
    			}else{
    				return ["info"=>0,"error"=>"修改失败"];
    			}


    		}else{
    			$error=collect($validator->messages())->implode('0',',');
    			return ['info'=>0,'error'=>$error];
    		}
    	}
    }
}
