<?php
class CustomerApi{
	public function __construct(){
	}

	function index(){
		echo json_encode(["customers"=>Customer::all()]);
	}
	
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["customers"=>Customer::pagination($page,$perpage),"total_records"=>Customer::count()]);
	}
	function find($data){
		echo json_encode(["customer"=>Customer::find($data["id"])]);
	}
	function delete($data){
		Customer::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}


	function package_find(){
		// print_r($_REQUEST['id']);
        $package=  Package::find($_REQUEST['id']);
		$flight= Flight::find( $package->flight_id);
		$hotel= Hotel::find($package->hotel_id);
		$transport= Transport::find($package->transport_id);


	   echo 	json_encode(compact("package", "flight", "hotel", "transport"));
	}
	
}
?>
