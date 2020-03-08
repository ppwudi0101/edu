<?php
function demo(){
	echo "I am demo";
}

function getTree($data,$parent_id=0){
	static $list=[];
	foreach($data as $d){
		if($d["parent_id"]==$parent_id){
			$list[]=$d;
			getTree($data,$d["id"]);
		}
	}
	return $list;
}
function getController(){
	$data=getName();
	return $data["controller"];
}
function getAction(){
	$data=getName();
	return $data['action'];
}


function getName(){
	$action=\Route::current()->getActionName();
	list($contoller_name,$action_name)=explode('@',$action);
	$data['controller']=str_replace("Controller","",substr(strrchr($contoller_name,"\\"),1));
	$data['action']=$action_name;
	return $data;

}