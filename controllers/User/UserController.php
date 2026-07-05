<?php
class UserController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("User");
	}
	public function create(){
		view("User");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPassword"])){
		$errors["password"]="Invalid password";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!preg_match("/^[\s\S]+$/",$data["role_id"])){
		$errors["role_id"]="Invalid role_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}

*/
		if(count($errors)==0){
			$user=new User();
		$user->name=$data["name"];
		$user->email=$data["email"];
		$user->password=$data["password"];
		$user->phone=$data["phone"];
		$user->role_id=$data["role_id"];
		$user->status=$data["status"];
		$user->created_at=$now;

			$user->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("User",User::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPassword"])){
		$errors["password"]="Invalid password";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!preg_match("/^[\s\S]+$/",$data["role_id"])){
		$errors["role_id"]="Invalid role_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}

*/
		if(count($errors)==0){
			$user=new User();
			$user->id=$data["id"];
		$user->name=$data["name"];
		$user->email=$data["email"];
		$user->password=$data["password"];
		$user->phone=$data["phone"];
		$user->role_id=$data["role_id"];
		$user->status=$data["status"];
		$user->created_at=$now;

		$user->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("User");
	}
	public function delete($id){
		User::delete($id);
		redirect();
	}
	public function show($id){
		view("User",User::find($id));
	}
}
?>
