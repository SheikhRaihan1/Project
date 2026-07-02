<?php


class FlightController
{


    function index()
    {
        $data = Flight::all();
        view("", compact("data"));
    }


    function create(){
        view("",);
    }
    function save(){
        print_r($_POST);

       if(isset($_POST["btn_submit"])){
       $flight= new Flight();
       $flight->airline= $_POST["airline"];
       $flight->flight_no= $_POST["flight_no"];
       $flight->source= $_POST["source"];
       $flight->destination= $_POST["destination"];
       $flight->price= $_POST["price"];
       $flight->create();
         redirect();
       }
      
    }

    function delete(){
        $id= $_GET["id"];
        Flight::delete($id);
        redirect();
    }

   function edit(){
     $data= Flight::find($_GET["id"]);
     view("", compact("data"));
   }

   function update(){
    if(isset($_POST["btn_submit"])){
       $flight= new Flight();
       $flight->id= $_POST["id"];
       $flight->airline= $_POST["airline"];
       $flight->flight_no= $_POST["flight_no"];
       $flight->source= $_POST["source"];
       $flight->destination= $_POST["destination"];
       $flight->price= $_POST["price"];
       $flight->update();
         redirect();
       }
   }

}