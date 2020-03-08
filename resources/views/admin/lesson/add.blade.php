<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="{{asset('admins')}}/lib/html5shiv.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/lib/webuploader/0.1.5/webuploader.css" />
<!--[if IE 6]>
<script type="text/javascript" src="{{asset('admins')}}/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加管理员 - 管理员管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
		{{csrf_field()}}
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课时名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="lesson_name" name="lesson_name">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">所属课程：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="course_id" size="1">
				<option value="">选择课程</option>		
				@foreach($course as $v)
					<option value="{{$v->id}}">{{$v->course_name}}</option>		
				@endforeach
			</select>	
			</span>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>缩略图：</label>
		<div class="formControls col-xs-8 col-sm-9">
					<!-- 显示图片 -->
					<div id="fileList" class="uploader-list"></div>
					<!-- 显示图片路径 -->
					<input type="text" class="input-text" name="cover_img" id="cover_img">
					<!-- 进度条显示 -->
					<div id="processing" styel="margin:10px 0">
						<div class="progress" style="width :560px">
							<span class="sr-only" style="width:0 %"></span>
						</div>

					</div>
					<!-- 选择图片 -->
					<div id="filePicker">选择图片</div>
		</div>
	</div>
	
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>视频：</label>
		<div class="formControls col-xs-8 col-sm-9">
					<!-- 显示图片路径 -->
					<input type="text" class="input-text" name="video_address" id="video_address">
					<!-- 进度条显示 -->
					<div id="processing2" styel="margin:10px 0">
						<div class="progress" style="width :560px">
							<span class="sr-only" style="width:0 %"></span>
						</div>

					</div>
					<!-- 选择图片 -->
					<div id="filePicker2">选择视频</div>
		</div>
	</div>
	
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课时长度：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="lesson_length" name="lesson_length">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>讲师名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="teacher_name" name="teacher_name">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="radio-box">
				<input name="status" type="radio" id="sex-1" value='1' checked>
				<label for="sex-1">开启</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="sex-2" name="status" value='0'>
				<label for="sex-2">停用</label>
			</div>
		</div>
	</div>
	
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">课时描述：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="lesson_desc" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)"></textarea>
			<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="{{asset('admins')}}/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="{{asset('admins')}}/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="{{asset('admins')}}/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--/_footer 
作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('admins')}}/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="{{asset('admins')}}/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="{{asset('admins')}}/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/lib/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript">

	var uploader = WebUploader.create({
		auto: true,
		swf: '{{asset("admins")}}/lib/webuploader/0.1.5/Uploader.swf',
	
		// 文件接收服务端。
		server: "{{url('admin/lesson/uploadimg')}}",
	
		// 选择文件的按钮。可选。
		// 内部根据当前运行是创建，可能是input元素，也可能是flash.
		pick: '#filePicker',
	
		// 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
		resize: false,
		// 只允许选择图片文件。
		accept: {
			title: '上传图片',
			extensions: 'gif,jpg,jpeg,bmp,png',
			mimeTypes: 'image/*'
		},
		formData:{
			_token:'{{csrf_token()}}'
		}


	});


	// 文件上传成功，给item添加成功class, 用样式标记上传成功。
	uploader.on( 'uploadSuccess', function( file,res) {
		//res是上传成功后，控制器里面返回的数据
		$("#cover_img").val(res.info);
		$("#fileList").html("<img src='"+res.info+"' width='100' />");
		
	});

	/// 文件上传过程中创建进度条实时显示。
	uploader.on( 'uploadProgress', function( file, percentage ) {
		$("#processing .sr-only").css( 'width', percentage * 100 + '%' );
		layer.msg("上传成功");
	});


	var uploader2 = WebUploader.create({
		auto: true,
		swf: '{{asset("admins")}}/lib/webuploader/0.1.5/Uploader.swf',
	
		// 文件接收服务端。
		server: "{{url('admin/lesson/uploadvideo')}}",
	
	
		// 选择文件的按钮。可选。
		// 内部根据当前运行是创建，可能是input元素，也可能是flash.
		pick: '#filePicker2',
	
		// 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
		resize: false,
		// 只允许选择图片文件。
		accept: {
			title: '上传视频',
			extensions: 'mp4',
			mimeTypes: '*/*'
		},
		formData:{
			_token:'{{csrf_token()}}'
		}


	});


	// 文件上传成功，给item添加成功class, 用样式标记上传成功。
	uploader2.on( 'uploadSuccess', function( file,res) {
		//res是上传成功后，控制器里面返回的数据

		$("#video_address").val(res.info);

	});

	/// 文件上传过程中创建进度条实时显示。
	uploader2.on( 'uploadProgress', function( file, percentage ) {
		$("#processing2 .sr-only").css( 'width', percentage * 100 + '%' );
		layer.msg("上传成功");
	});
	

	

	$('#form-admin-add').submit(function(e){
		//阻止表单默认提交行为
		e.preventDefault();
		$.ajax({
			type:"post",
			url:"{{url('admin/lesson/add')}}",
			data:$(this).serialize(),
			dataType:'JSON',
			success:function(msg){
				if(msg.info==1){
					//添加成功
					layer.alert("添加成功!",function(){
						parent.table.api().ajax.reload();
						layer_close();
					});
					
				}else{
					//添加失败
					// alert("1111");
					layer.msg("添加失败:"+msg.error,{icon:5,time:3000});
				}


			}

		});
	});
	
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>