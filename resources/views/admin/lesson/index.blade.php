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
<!--[if IE 6]>
<script type="text/javascript" src="{{asset('admins')}}/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入课时名称" id="title" name="">
		<button type="submit" class="btn btn-success radius" id="search" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="lesson_add()" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加课时</a></span> <span class="r">共有数据：<strong>88</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="50">ID</th>
				<th width="100">课时名称</th>
				<th width="60">课程名称</th>
				<th width="80">视频播放</th>
				<th width="120">缩略图</th>
				<th width="100">讲师名称</th>
				<th width="130">加入时间</th>
				<th width="70">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td><input type="checkbox" value="1" id="ids[]" name=""></td>
				<td>1</td>
				<td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','10001','360','400')">张三</u></td>
				<td>男</td>
				<td>13000000000</td>
				<td>admin@mail.com</td>
				<td class="text-l">北京市 海淀区</td>
				<td>2014-6-11 11:11:42</td>
				<td class="td-status"><span class="label label-success radius">已启用</span></td>
				<td class="td-manage"><a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','change-password.html','10001','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a> <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		</tbody>
	</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('admins')}}/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('admins')}}/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$(function(){
	$('#search').click(function(){
		table.api().ajax.reload();
	});

	table = $('.table-sort').dataTable({
		'lengthMenu':[[1,5,10,20,50,-1],[1,5,10,20,50,'所有']], //显示数据行数
		'paging':true,	//显示分页
		'info':true,	//左下角信息
		'searching':false,	//搜索
		'ordering':true,	//排序
		'order':[[1,'desc']],	//第二列降序
		'stateSave':false,	//缓存
		'columnDefs':[{	//指定排序
			'targets':[0,9],
			'orderable':false,
		}],
		"processing":true,
		//开启服务端响应
		"serverSide": true,
		//ajax的详细使用
		"ajax": {
			"url": "{{url('admin/lesson/index')}}",
			"type": "POST",
			'headers': { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
			data:function(data){
				data.title = $('#title').val();
				data.datemax=$('#datemax').val();
				data.datemin=$('#datemin').val();
			}

		},
		'columns':[
			{'data':'a','defaultContent':'复选框'},
			{'data':'id'},
			{'data':'lesson_name'},
			{'data':'course.course_name'},
			{'data':'a','defaultContent':'视频'},
			{'data':'a','defaultContent':'缩略图'},
			{'data':'teacher_name'},
			{'data':'created_at'},
			{'data':'a','defaultContent':'状态'},
			{'data':'a','defaultContent':'操作'},
		],
		"createdRow":function(row,data,dataIndex){
			//$(row) 当前行
			$(row).addClass('text-c')
			$(row).find('td').eq(0).html('<input type="checkbox" name="ids[]" value="'+data.id+'">');
			if(data.status==1){
				var str='<a style="text-decoration:none" onClick="lesson_stop(this,'+data.id+')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>';
				$(row).find('td:eq(8)').html('<span class="label label-success radius">已启用</span>');
			}else{
				var str='<a style="text-decoration:none" onClick="lesson_start(this,'+data.id+')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe615;</i></a>'
				$(row).find('td:eq(8)').html('<span class="label  radius">已停用</span>');
			}
			$(row).find('td:eq(9)').html(str+'<a title="编辑" href="javascript:;" onclick="lesson_update('+data.id+')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="lesson_del(this,'+data.id+')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>');
			$(row).find('td:eq(4)').html('<input onclick ="play('+data.id+')" class="btn btn-success-outline radius" type="button" value="播放">');
			$(row).find('td:eq(5)').html('<img src="'+data.cover_img+'" width=100px/>');
		}


	});

});
//播放视频
function play(id){
	layer_show("播放视频","{{url('admin/lesson/play')}}/"+id,800,600);
}
/*用户-添加*/
function lesson_add(){
	layer_show("添加课时",'{{url('admin/lesson/add')}}');
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function lesson_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '{{url("admin/lesson/status")}}/'+id,
			data:{'status':0,'_token':'{{csrf_token()}}'},
			dataType: 'json',
			success: function(data){
				if(data.info==1){
					//停用成功
					$(obj).parents("tr").find('td:eq(8)').html('<span class="label label-defaunt radius">已停用</span>');			
					$(obj).after('<a style="text-decoration:none" onClick="admin_start(this,'+id+')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe615;</i>');
					$(obj).remove();
					layer.msg('已停用!',{icon: 6,time:1000});
				}else{
					//停用失败
					layer.msg('停用失败!',{icon: 5,time:1000});
				}
				
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}

/*用户-启用*/
function lesson_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '{{url("admin/lesson/status")}}/'+id,
			data:{'status':1,'_token':'{{csrf_token()}}'},
			dataType: 'json',
			success: function(data){
				if(data.info==1){
					//启动成功
					$(obj).parents("tr").find('td:eq(8)').html('<span class="label label-success radius">已启用</span>');			
					$(obj).after('<a style="text-decoration:none" onClick="lesson_stop(this,'+id+')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i>');
					$(obj).remove();
					layer.msg('启动成功!',{icon: 6,time:1000});
				}else{
					//停用失败
					layer.msg('停用失败!',{icon: 5,time:1000});
				}
				
				
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
/*课时-编辑*/
function lesson_update(id){
	layer_show("修改课时","{{url('admin/lesson/update')}}/"+id);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*课时-删除*/
function lesson_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '{{url("admin/lesson/del")}}/'+id,
			data:{'_token':'{{csrf_token()}}'},
			dataType: 'json',
			success: function(data){
				if(data.info==1){
					$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
				}
				
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

function datadel(){
	var ids=[];
	$("input:checked").each(function(){
		ids.push($(this).val());
	});
	if(ids.length==0){
		alert("至少选择一个");
	}
	$.ajax({
		type:"post",
		url:"{{url('admin/lesson/datadel')}}",
		data:{ids:ids,'_token':"{{csrf_token()}}"},
		dataType:"json",
		success:function(msg){
			if(msg.info==1){
				layer.msg('已删除!',{icon:1,time:1000});
				table.api().ajax.reload();
			}
		}


	});
}
</script> 
</body>
</html>