<?php
class TourPackage extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $country;
	public $duration;
	public $hotel_id;
	public $flight_id;
	public $transport_id;
	public $price;

	public function __construct(){
	}
	public function set($id,$name,$country,$duration,$hotel_id,$flight_id,$transport_id,$price){
		$this->id=$id;
		$this->name=$name;
		$this->country=$country;
		$this->duration=$duration;
		$this->hotel_id=$hotel_id;
		$this->flight_id=$flight_id;
		$this->transport_id=$transport_id;
		$this->price=$price;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}tour_packages(name,country,duration,hotel_id,flight_id,transport_id,price)values('$this->name','$this->country','$this->duration','$this->hotel_id','$this->flight_id','$this->transport_id','$this->price')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}tour_packages set name='$this->name',country='$this->country',duration='$this->duration',hotel_id='$this->hotel_id',flight_id='$this->flight_id',transport_id='$this->transport_id',price='$this->price' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}tour_packages where id={$id}");
	}
	public function jsonSerialize(): mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,country,duration,hotel_id,flight_id,transport_id,price from {$tx}tour_packages");
		$data=[];
		while($tourpackage=$result->fetch_object()){
			$data[]=$tourpackage;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,country,duration,hotel_id,flight_id,transport_id,price from {$tx}tour_packages $criteria limit $top,$perpage");
		$data=[];
		while($tourpackage=$result->fetch_object()){
			$data[]=$tourpackage;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}tour_packages $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,country,duration,hotel_id,flight_id,transport_id,price from {$tx}tour_packages where id='$id'");
		$tourpackage=$result->fetch_object();
			return $tourpackage;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}tour_packages");
		$tourpackage =$result->fetch_object();
		return $tourpackage->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Country:$this->country<br> 
		Duration:$this->duration<br> 
		Hotel Id:$this->hotel_id<br> 
		Flight Id:$this->flight_id<br> 
		Transport Id:$this->transport_id<br> 
		Price:$this->price<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbTourPackage"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}tour_packages");
		while($tourpackage=$result->fetch_object()){
			$html.="<option value ='$tourpackage->id'>$tourpackage->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}tour_packages $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,country,duration,hotel_id,flight_id,transport_id,price from {$tx}tour_packages $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"tourpackage/create","text"=>"New TourPackage"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Country</th><th>Duration</th><th>Hotel Id</th><th>Flight Id</th><th>Transport Id</th><th>Price</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Country</th><th>Duration</th><th>Hotel Id</th><th>Flight Id</th><th>Transport Id</th><th>Price</th></tr>";
		}
		while($tourpackage=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"tourpackage/show/$tourpackage->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"tourpackage/edit/$tourpackage->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"tourpackage/confirm/$tourpackage->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$tourpackage->id</td><td>$tourpackage->name</td><td>$tourpackage->country</td><td>$tourpackage->duration</td><td>$tourpackage->hotel_id</td><td>$tourpackage->flight_id</td><td>$tourpackage->transport_id</td><td>$tourpackage->price</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,country,duration,hotel_id,flight_id,transport_id,price from {$tx}tour_packages where id={$id}");
		$tourpackage=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">TourPackage Show</th></tr>";
		$html.="<tr><th>Id</th><td>$tourpackage->id</td></tr>";
		$html.="<tr><th>Name</th><td>$tourpackage->name</td></tr>";
		$html.="<tr><th>Country</th><td>$tourpackage->country</td></tr>";
		$html.="<tr><th>Duration</th><td>$tourpackage->duration</td></tr>";
		$html.="<tr><th>Hotel Id</th><td>$tourpackage->hotel_id</td></tr>";
		$html.="<tr><th>Flight Id</th><td>$tourpackage->flight_id</td></tr>";
		$html.="<tr><th>Transport Id</th><td>$tourpackage->transport_id</td></tr>";
		$html.="<tr><th>Price</th><td>$tourpackage->price</td></tr>";

		$html.="</table>";
		return $html;
	}


}
?>
