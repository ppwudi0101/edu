<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//定义后台路由
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::group(['middleware'=>'adminLogin'],function(){
         //后台首页路由
        Route::get('index','IndexController@index');
        Route::get('welcome','IndexController@welcome');
        //课时首页
        Route::match(['get','post'],'lesson/index','LessonController@index');
        //课时状态
        Route::post('lesson/status/{lesson}','LessonController@status');
        //添加课时
        Route::match(['get','post'],'lesson/add','LessonController@add');
        //上传图片
        Route::post('lesson/uploadimg','LessonController@uploadimg');
        //上传视频
        Route::post('lesson/uploadvideo','LessonController@uploadvideo');
        //播放视频
        Route::get('lesson/play/{lesson}','LessonController@play');
        //修改课时
        Route::match(['get','post'],'lesson/update/{lesson}','LessonController@update');
        //删除课时
        Route::post('lesson/del/{lesson}','LessonController@del');
        //批量删除
        Route::post('lesson/datadel','LessonController@datadel');
        //角色管理
        Route::get('role/index','RoleController@index');
        //修改角色权限
        Route::match(['get','post'],'role/update/{role}','RoleController@update');
        //权限列表
        Route::get('privilege/index','PrivilegeController@index');
        //添加权限
        Route::match(['get','post'],'privilege/add',"PrivilegeController@add");
        //试卷管理首页
        Route::get("paper/index","PaperController@index");
        //试卷列表首页
        Route::get("question/index/{paper}","QuestionController@index");
        //添加试题
        Route::match(["get","post"],"question/add/{paper}","QuestionController@add");

    });
   
    //管理员登录
    Route::get('login','ManagerController@login');
    Route::post('login_check','ManagerController@login_check');
    Route::get('logout','ManagerController@logout');
});

Route::group(["namespace"=>"Home"],function(){
    //前台登录
    Route::get("login","MemberController@login");
    //前台登录验证
    Route::post("login_check","MemberController@login_check");
    //前台退出
    Route::get("logout","MemberController@logout");
    //首页
    Route::get('index','IndexController@index');
    //首页
    Route::get('/',"IndexController@index");
    //开始考试
    Route::get("person/paper","PersonController@paper");
    //试卷
    Route::get("person/exam/{paper}","PersonController@exam");
    //学员答案结果
    Route::post("person/answer/{paper}","PersonController@answer");
    //试卷结果
    Route::get("person/result/{paper}","PersonController@result");

});



