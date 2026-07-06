<?php
class PaymentController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Payment");
	}
	public function create(){
		view("Payment");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["booking_id"])){
		$errors["booking_id"]="Invalid booking_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["paid_amount"])){
		$errors["paid_amount"]="Invalid paid_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_method"])){
		$errors["payment_method"]="Invalid payment_method";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_date"])){
		$errors["payment_date"]="Invalid payment_date";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemarks"])){
		$errors["remarks"]="Invalid remarks";
	}

*/
		if(count($errors)==0){
			$payment=new Payment();
		$payment->booking_id=$data["booking_id"];
		$payment->paid_amount=$data["paid_amount"];
		$payment->payment_method=$data["payment_method"];
		$payment->payment_date=$data["payment_date"];
		$payment->remarks=$data["remarks"];
		$payment->created_at=$now;

			$payment->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Payment",Payment::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["booking_id"])){
		$errors["booking_id"]="Invalid booking_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["paid_amount"])){
		$errors["paid_amount"]="Invalid paid_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_method"])){
		$errors["payment_method"]="Invalid payment_method";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_date"])){
		$errors["payment_date"]="Invalid payment_date";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemarks"])){
		$errors["remarks"]="Invalid remarks";
	}

*/
		if(count($errors)==0){
			$payment=new Payment();
			$payment->id=$data["id"];
		$payment->booking_id=$data["booking_id"];
		$payment->paid_amount=$data["paid_amount"];
		$payment->payment_method=$data["payment_method"];
		$payment->payment_date=$data["payment_date"];
		$payment->remarks=$data["remarks"];
		$payment->created_at=$now;

		$payment->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Payment");
	}
	public function delete($id){
		Payment::delete($id);
		redirect();
	}
	public function show($id){
		view("Payment",Payment::find($id));
	}
}
?>
