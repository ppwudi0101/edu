<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
class IndexController extends Controller
{
    //
    public function index(){
    	$course=Course::with("lesson")->get();
    	return view("home.member.index",compact("course"));
    }
}
