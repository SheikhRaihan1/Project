<?php
class RoleController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Role");
	}
	public function create(){
		view("Role");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRoleName"])){
		$errors["role_name"]="Invalid role_name";
	}

*/
		if(count($errors)==0){
			$role=new Role();
		$role->role_name=$data["role_name"];
		$role->created_at=$now;
		$role->updated_at=$now;

			$role->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Role",Role::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRoleName"])){
		$errors["role_name"]="Invalid role_name";
	}

*/
		if(count($errors)==0){
			$role=new Role();
			$role->id=$data["id"];
		$role->role_name=$data["role_name"];
		$role->created_at=$now;
		$role->updated_at=$now;

		$role->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Role");
	}
	public function delete($id){
		Role::delete($id);
		redirect();
	}
	public function show($id){
		view("Role",Role::find($id));
	}
}
?>
