<?php


class BookingController
{


    function index()
    {
        $data = Booking::all();
        view("", compact("data"));
    }


    function create(){
        view("",);
    }
    function save(){
        print_r($_POST);

       if(isset($_POST["btn_submit"])){
       $booking= new Booking();
       $booking->booking_no= $_POST["booking_no"];
       $booking->customer_id= $_POST["customer_id"];
       $booking->user_id= $_POST["user_id"];
       $booking->package_id= $_POST["package_id"];
       $booking->travel_date= $_POST["travel_date"];
       $booking->persons= $_POST["persons"];
       $booking->total_price= $_POST["total_price"];
       $booking->status= $_POST["status"];
       $booking->created_at= $_POST["created_at"];
       $booking->create();
         redirect();
       }
      
    }

    function delete(){
        $id= $_GET["id"];
        Booking::delete($id);
        redirect();
    }

   function edit(){
     $data= Booking::find($_GET["id"]);
     view("", compact("data"));
   }

   function update(){
    if(isset($_POST["btn_submit"])){
       $booking= new Booking();
       $booking->id= $_POST["id"];
       $booking->booking_no= $_POST["booking_no"];
       $booking->customer_id= $_POST["customer_id"];
       $booking->user_id= $_POST["user_id"];
       $booking->package_id= $_POST["package_id"];
       $booking->travel_date= $_POST["travel_date"];
       $booking->persons= $_POST["persons"];
       $booking->total_price= $_POST["total_price"];
       $booking->status= $_POST["status"];
       $booking->created_at= $_POST["created_at"];
       $booking->update();
         redirect();
       }
   }

}