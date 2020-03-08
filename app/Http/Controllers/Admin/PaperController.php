<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paper;
class PaperController extends Controller
{
    //试卷管理首页
    public function index(){
    	$paper=Paper::with("course")->get();
    	return view("admin.paper.index",compact("paper"));
    }
}
