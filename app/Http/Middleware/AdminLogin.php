<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;
class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //验证是否登录的代码
        if(!Auth::guard('admin')->check()){
            return redirect('admin/login');
        }
        $id=Auth::guard('admin')->User()->id;
        if($id!=152){
           $all_ac=DB::table("manager as m")->join("role as r","m.role_id","=","r.id")->where('m.id',$id)->select("r.priv_ac")->first()->priv_ac;
           $user_ac=getController()."-".getAction();
           
           if(getController()!='Index'){
                if(strpos($all_ac,$user_ac)===false){
                    die("您无权操作");
                }
           }
           
        }
        return $next($request);
    }
}
