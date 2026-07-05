<?php
class User extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $email;
	public $password;
	public $phone;
	public $role_id;
	public $status;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$name,$email,$password,$phone,$role_id,$status,$created_at){
		$this->id=$id;
		$this->name=$name;
		$this->email=$email;
		$this->password=$password;
		$this->phone=$phone;
		$this->role_id=$role_id;
		$this->status=$status;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}users(name,email,password,phone,role_id,status,created_at)values('$this->name','$this->email','$this->password','$this->phone','$this->role_id','$this->status','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}users set name='$this->name',email='$this->email',password='$this->password',phone='$this->phone',role_id='$this->role_id',status='$this->status',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}users where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,email,password,phone,role_id,status,created_at from {$tx}users");
		$data=[];
		while($user=$result->fetch_object()){
			$data[]=$user;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,email,password,phone,role_id,status,created_at from {$tx}users $criteria limit $top,$perpage");
		$data=[];
		while($user=$result->fetch_object()){
			$data[]=$user;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}users $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,email,password,phone,role_id,status,created_at from {$tx}users where id='$id'");
		$user=$result->fetch_object();
			return $user;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}users");
		$user =$result->fetch_object();
		return $user->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Email:$this->email<br> 
		Password:$this->password<br> 
		Phone:$this->phone<br> 
		Role Id:$this->role_id<br> 
		Status:$this->status<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbUser"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}users");
		while($user=$result->fetch_object()){
			$html.="<option value ='$user->id'>$user->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}users $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,email,password,phone,role_id,status,created_at from {$tx}users $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"user/create","text"=>"New User"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Email</th><th>Password</th><th>Phone</th><th>Role Id</th><th>Status</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Email</th><th>Password</th><th>Phone</th><th>Role Id</th><th>Status</th><th>Created At</th></tr>";
		}
		while($user=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"user/show/$user->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"user/edit/$user->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"user/confirm/$user->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$user->id</td><td>$user->name</td><td>$user->email</td><td>$user->password</td><td>$user->phone</td><td>$user->role_id</td><td>$user->status</td><td>$user->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,email,password,phone,role_id,status,created_at from {$tx}users where id={$id}");
		$user=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">User Show</th></tr>";
		$html.="<tr><th>Id</th><td>$user->id</td></tr>";
		$html.="<tr><th>Name</th><td>$user->name</td></tr>";
		$html.="<tr><th>Email</th><td>$user->email</td></tr>";
		$html.="<tr><th>Password</th><td>$user->password</td></tr>";
		$html.="<tr><th>Phone</th><td>$user->phone</td></tr>";
		$html.="<tr><th>Role Id</th><td>$user->role_id</td></tr>";
		$html.="<tr><th>Status</th><td>$user->status</td></tr>";
		$html.="<tr><th>Created At</th><td>$user->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
