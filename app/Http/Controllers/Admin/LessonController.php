<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\Course;
use Validator;
use Storage;
class LessonController extends Controller
{
    //展示课时页面
    public function index(Request $request){
        if($request->isMethod('get')){
            //显示课时列表
            return view('admin.lesson.index');
        }else if($request->isMethod('post')){
            //post请求数据
            //order[0][column]: 6
            //order[0][dir]: asc
            //columns[6][data]: teacher_name
            $column=$request->input('order.0.column');
            $ad=$request->input('order.0.dir');
            $dbcolumn=$request->input('columns.'.$column.'.data');
            $lesson_name=$request->input('title');
            $datemax = $request->input('datemax');
            $datemin = $request->input('datemin');
            $offset=$request->input('start');   //接收的是偏移量
            $limit=$request->input('length');   //接收的是多少条数据

            
            $data=Lesson::with(['course'=>function($p){
                $p->with('profession');
            }])
                ->where('lesson_name','like',"%$lesson_name%")

                ->where(function($query) use($datemin,$datemax){
                    if($datemax!=''){
                        $query->where('created_at','<=',$datemax.'23:59:59');
                    }
                    if($datemin!=''){
                        $query->where('created_at','>=',$datemin);
                    }

                })
                ->orderBy($dbcolumn,$ad)
                ->offset($offset)
                ->limit($limit)->get();

            $count=Lesson::count();
            $recordsFiltered =Lesson::with(['course'=>function($p){
                $p->with('profession');
            }])
                ->where('lesson_name','like',"%$lesson_name%")
                ->where(function($query) use ($datemin,$datemax){
                    if($datemax!=''){
                        $query->where('created_at','<=',$datemax.'23:59:59');
                    }
                    if($datemin!=''){
                        $query->where('created_at','>=',$datemin);
                    }
                })->count();
            $info=[
                'draw'=>$request->get('draw'),
                'recordsTotal'=>$count,
                'recordsFiltered'=>$recordsFiltered,
                'data'=>$data,
            ];
            return $info;
        }

    }
    //停止or启动状态
    public function status(Request $request,Lesson $lesson){
        $res=$lesson->update(['status'=>$request->input('status')]);
        if($res){
            return ['info'=>1];
        }else{
            return ['info'=>0];
        }
    }

    //添加课时
    public function add(Request $request){
        if($request->isMethod('get')){
            $course=Course::all();
            return view('admin.lesson.add',compact('course'));
        }else if($request->isMethod('post')){
            //用Validator验证
            $rules=[
                'lesson_name'=>'required',
                'course_id'=>'required | integer',
                'lesson_length'=>'required | integer',
                'teacher_name'=>'required',
                'lesson_desc'=>'required | min:10',
                'status'=>'required | boolean',

            ];
            $msg=[
                'lesson_name.required'=>"课时名称不能为空",
                'course_id.required'=>"要选择所属课程",
                'course_id.integer'=>"课程数据不合法",
                'lesson_length.required'=>"课时长度不能为空",
                'lesson_length.integer'=>"课时数据不合法",
                'teacher_name.required'=>"教师名称不能为空",
                'lesson_desc.required'=>"课时描述不能为空",
                'lesson_desc.min'=>"课时描述不能少于10个字符",
                'status.required'=>"状态不能为空",
                'status.boolean'=>"状态数据不合法"
            ];
            // dd($request->all());exit();
            $validator = Validator::make($request->all(),$rules,$msg);
            if($validator->passes()){
                //通过数据验证
                Lesson::create($request->all());
                return ['info'=>1];
                
            }else{
                //未通过数据验证
                return ['info'=>0,'error'=>collect($validator->messages())->implode(0,',')];
            }
        }
    }
    //上传图片
    public function uploadimg(Request $request){
        $file=$request->file('file');
        if($file->isValid()){
            //上传成功
            $file_name=$file->store('image/'.date("Y/m/d"),'uploads');

            return ['info'=>'/uploads/'.$file_name];
        }

    }

    //上传视频
     public function uploadvideo(Request $request){
        $file=$request->file('file');
        if($file->isValid()){
            //上传成功
            $file_name=$file->store('video/'.date("Y/m/d"),'uploads');

            return ['info'=>'/uploads/'.$file_name];
        }

    }
    //播放视频
    public function play(Request $request,Lesson $lesson){
        return view('admin.lesson.play',compact('lesson'));

    }

    //课时修改
    public function update(Request $request,Lesson $lesson){
        if($request->isMethod('get')){
            $course=Course::all();
            return view('admin.lesson.edit',compact('lesson','course'));
        }else if($request->isMethod('post')){
            //数据验证
            $rules=[
                'lesson_name'=>'required|unique:lesson,lesson_name,'.$lesson->id,
                'course_id'=>'required | integer',
                'lesson_length'=>'required | integer',
                'teacher_name'=>'required',
                'lesson_desc'=>'required | min:10',
                'status'=>'required | boolean',

            ];
            $msg=[
                'lesson_name.required'=>"课时名称不能为空",
                'course_id.required'=>"要选择所属课程",
                'course_id.integer'=>"课程数据不合法",
                'lesson_length.required'=>"课时长度不能为空",
                'lesson_length.integer'=>"课时数据不合法",
                'teacher_name.required'=>"教师名称不能为空",
                'lesson_desc.required'=>"课时描述不能为空",
                'lesson_desc.min'=>"课时描述不能少于10个字符",
                'status.required'=>"状态不能为空",
                'status.boolean'=>"状态数据不合法"
            ];
            //修改数据
            $validator=Validator::make($request->all(),$rules,$msg);
            if($validator->passes()){
                 if($lesson->cover_img!=$request->input('cover_img')){
                    $file_name=$lesson->cover_img;
                    $file_name=str_replace("/uploads/","",$file_name);
                    Storage::disk('uploads')->delete($file_name);;


                }
                if($lesson->cover_img!=$request->input('video_address')){
                    $file_name=$lesson->video_address;
                    $file_name=str_replace("/uploads/","",$file_name);
                    Storage::disk('uploads')->delete($file_name);;


                }
                $lesson->update($request->all());
                return ['info'=>1];
            }else{
                $error=collect($validator->messages())->implode('0',',');
                return ['error'=>$error,'info'=>0];
            }
           
        }       
    }

    //删除课时
    public function del(Request $request,Lesson $lesson){
        
        //删除图片
        if($lesson->cover_img!=""){
            $file_name=$lesson->cover_img;
            $file_name=str_replace("/uploads/","",$file_name);
            Storage::disk('uploads')->delete($file_name);;
        }
        if($lesson->video_address!=""){
            //删除视频
            $file_name=$lesson->video_address;
            $file_name=str_replace("/uploads/","",$file_name);
            Storage::disk('uploads')->delete($file_name);;
        }
        $res=$lesson->delete();
        if($res){
            return ['info'=>1];
        }else{
            return ['info'=>0];
        }
    }

    //批量删除
    public function datadel(Request $request){
        $ids=$request->input('ids');
        Lesson::whereIn('id',$ids)->get()->each(function($item){
            if($item->cover_img!=""){
            $file_name=$item->cover_img;
            $file_name=str_replace("/uploads/","",$file_name);
            Storage::disk('uploads')->delete($file_name);;
            }
            if($item->video_address!=""){
                //删除视频
                $file_name=$item->video_address;
                $file_name=str_replace("/uploads/","",$file_name);
                Storage::disk('uploads')->delete($file_name);;
            }
            $item->delete();

        });
        return ["info"=>1];

    }
}
