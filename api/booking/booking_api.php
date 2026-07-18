<?php
class BookingApi{
	public function __construct(){
	}
	
	function index(){
		echo json_encode(["divisions"=>"sff"]);
	}


	function booking_process(){
		
   
	echo json_encode(["success"=>$_POST]);



	}
	
}
?>
