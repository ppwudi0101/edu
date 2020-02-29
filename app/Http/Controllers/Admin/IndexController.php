<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //展示后台首页
    public function index(){
        return view('admin.index.index');
    }
    //展示右边具体内容页面
    public function welcome(){
        return view('admin.index.welcome');
    }
}
