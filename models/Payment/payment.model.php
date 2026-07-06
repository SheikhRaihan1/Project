<?php
class Payment extends Model implements JsonSerializable{
	public $id;
	public $booking_id;
	public $paid_amount;
	public $payment_method;
	public $payment_date;
	public $remarks;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$booking_id,$paid_amount,$payment_method,$payment_date,$remarks,$created_at){
		$this->id=$id;
		$this->booking_id=$booking_id;
		$this->paid_amount=$paid_amount;
		$this->payment_method=$payment_method;
		$this->payment_date=$payment_date;
		$this->remarks=$remarks;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}payments(booking_id,paid_amount,payment_method,payment_date,remarks,created_at)values('$this->booking_id','$this->paid_amount','$this->payment_method','$this->payment_date','$this->remarks','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}payments set booking_id='$this->booking_id',paid_amount='$this->paid_amount',payment_method='$this->payment_method',payment_date='$this->payment_date',remarks='$this->remarks',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}payments where id={$id}");
	}
	public function jsonSerialize(): mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,booking_id,paid_amount,payment_method,payment_date,remarks,created_at from {$tx}payments");
		$data=[];
		while($payment=$result->fetch_object()){
			$data[]=$payment;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,booking_id,paid_amount,payment_method,payment_date,remarks,created_at from {$tx}payments $criteria limit $top,$perpage");
		$data=[];
		while($payment=$result->fetch_object()){
			$data[]=$payment;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}payments $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,booking_id,paid_amount,payment_method,payment_date,remarks,created_at from {$tx}payments where id='$id'");
		$payment=$result->fetch_object();
			return $payment;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}payments");
		$payment =$result->fetch_object();
		return $payment->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Booking Id:$this->booking_id<br> 
		Paid Amount:$this->paid_amount<br> 
		Payment Method:$this->payment_method<br> 
		Payment Date:$this->payment_date<br> 
		Remarks:$this->remarks<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbPayment"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}payments");
		while($payment=$result->fetch_object()){
			$html.="<option value ='$payment->id'>$payment->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}payments $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,booking_id,paid_amount,payment_method,payment_date,remarks,created_at from {$tx}payments $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"payment/create","text"=>"New Payment"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Booking Id</th><th>Paid Amount</th><th>Payment Method</th><th>Payment Date</th><th>Remarks</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Booking Id</th><th>Paid Amount</th><th>Payment Method</th><th>Payment Date</th><th>Remarks</th><th>Created At</th></tr>";
		}
		while($payment=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"payment/show/$payment->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"payment/edit/$payment->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"payment/confirm/$payment->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$payment->id</td><td>$payment->booking_id</td><td>$payment->paid_amount</td><td>$payment->payment_method</td><td>$payment->payment_date</td><td>$payment->remarks</td><td>$payment->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,booking_id,paid_amount,payment_method,payment_date,remarks,created_at from {$tx}payments where id={$id}");
		$payment=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Payment Show</th></tr>";
		$html.="<tr><th>Id</th><td>$payment->id</td></tr>";
		$html.="<tr><th>Booking Id</th><td>$payment->booking_id</td></tr>";
		$html.="<tr><th>Paid Amount</th><td>$payment->paid_amount</td></tr>";
		$html.="<tr><th>Payment Method</th><td>$payment->payment_method</td></tr>";
		$html.="<tr><th>Payment Date</th><td>$payment->payment_date</td></tr>";
		$html.="<tr><th>Remarks</th><td>$payment->remarks</td></tr>";
		$html.="<tr><th>Created At</th><td>$payment->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
