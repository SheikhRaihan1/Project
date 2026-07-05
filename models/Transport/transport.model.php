<?php
class Transport extends Model implements JsonSerializable{
	public $id;
	public $vehicle_type;
	public $company;
	public $price;

	public function __construct(){
	}
	public function set($id,$vehicle_type,$company,$price){
		$this->id=$id;
		$this->vehicle_type=$vehicle_type;
		$this->company=$company;
		$this->price=$price;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}transport(vehicle_type,company,price)values('$this->vehicle_type','$this->company','$this->price')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}transport set vehicle_type='$this->vehicle_type',company='$this->company',price='$this->price' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}transport where id={$id}");
	}
	public function jsonSerialize(): mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,vehicle_type,company,price from {$tx}transport");
		$data=[];
		while($transport=$result->fetch_object()){
			$data[]=$transport;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,vehicle_type,company,price from {$tx}transport $criteria limit $top,$perpage");
		$data=[];
		while($transport=$result->fetch_object()){
			$data[]=$transport;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}transport $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,vehicle_type,company,price from {$tx}transport where id='$id'");
		$transport=$result->fetch_object();
			return $transport;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}transport");
		$transport =$result->fetch_object();
		return $transport->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Vehicle Type:$this->vehicle_type<br> 
		Company:$this->company<br> 
		Price:$this->price<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbTransport"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}transport");
		while($transport=$result->fetch_object()){
			$html.="<option value ='$transport->id'>$transport->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}transport $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,vehicle_type,company,price from {$tx}transport $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"transport/create","text"=>"New Transport"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Vehicle Type</th><th>Company</th><th>Price</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Vehicle Type</th><th>Company</th><th>Price</th></tr>";
		}
		while($transport=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"transport/show/$transport->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"transport/edit/$transport->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"transport/confirm/$transport->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$transport->id</td><td>$transport->vehicle_type</td><td>$transport->company</td><td>$transport->price</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,vehicle_type,company,price from {$tx}transport where id={$id}");
		$transport=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Transport Show</th></tr>";
		$html.="<tr><th>Id</th><td>$transport->id</td></tr>";
		$html.="<tr><th>Vehicle Type</th><td>$transport->vehicle_type</td></tr>";
		$html.="<tr><th>Company</th><td>$transport->company</td></tr>";
		$html.="<tr><th>Price</th><td>$transport->price</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
