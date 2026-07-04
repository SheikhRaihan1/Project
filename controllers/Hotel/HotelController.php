<?php


class HotelController
{


    function index()
    {
        $data = Hotel::all();
        view("", compact("data"));
    }


    function create(){
        view("",);
    }
    function save(){
        print_r($_POST);

       if(isset($_POST["btn_submit"])){
       $hotel= new Hotel();
       $hotel-> name= $_POST["name"];
       $hotel->city= $_POST["city"];
       $hotel->rating= $_POST["rating"];
       $hotel->price_per_night= $_POST["price_per_night"];
       $hotel->create();
         redirect();
       }
      
    }

    function delete(){
        $id= $_GET["id"];
        Hotel::delete($id);
        redirect();
    }

   function edit(){
     $data= Hotel::find($_GET["id"]);
     view("", compact("data"));
   }

   function update(){
    if(isset($_POST["btn_submit"])){
       $hotel= new Hotel();
       $hotel->id= $_POST["id"];
       $hotel-> name= $_POST["name"];
       $hotel->city= $_POST["city"];
       $hotel->rating= $_POST["rating"];
       $hotel->price_per_night= $_POST["price_per_night"];
       $hotel->update();
         redirect();
       }
   }

}