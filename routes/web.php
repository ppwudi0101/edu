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

Route::get('/', function () {
    return view('welcome');
});
//定义后台路由
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    //后台首页路由
    Route::get('index','IndexController@index');
    Route::get('welcome','IndexController@welcome');
    Route::match(['get','post'],'lesson/index','LessonController@index');
});