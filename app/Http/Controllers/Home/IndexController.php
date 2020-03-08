<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paper;
class IndexController extends Controller
{
    //
    public function index(){
    	$course=Paper::with("course")->get();
    	return view("admin.member.index",compact("course"));
    }
}
