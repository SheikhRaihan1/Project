<?php


class PackageController
{


    function index()
    {
        $data = Package::all();
        view("", compact("data"));
    }


    function create(){
        view("",);
    }
    function save(){
        print_r($_POST);

       if(isset($_POST["btn_submit"])){
       $package= new Package();
       $package-> title= $_POST["title"];
       $package-> description= $_POST["description"];
       $package-> destination= $_POST["destination"];
       $package-> duration= $_POST["duration"];
       $package-> price= $_POST["price"];
       $package-> max_persons= $_POST["max_persons"];
       $package-> image= $_POST["image"];
       $package-> status= $_POST["status"];
       $package-> created_at= $_POST["created_at"];
       $package->create();
         redirect();
       }
      
    }

    function delete(){
        $id= $_GET["id"];
        Package::delete($id);
        redirect();
    }

   function edit(){
     $data= Package::find($_GET["id"]);
     view("", compact("data"));
   }

   function update(){
    if(isset($_POST["btn_submit"])){
       $package= new Package();
       $package->id= $_POST["id"];
       $package-> title= $_POST["title"];
       $package-> description= $_POST["description"];
       $package-> destination= $_POST["destination"];
       $package-> duration= $_POST["duration"];
       $package-> price= $_POST["price"];
       $package-> max_persons= $_POST["max_persons"];
       $package-> image= $_POST["image"];
       $package-> status= $_POST["status"];
       $package-> created_at= $_POST["created_at"];
       $package->update();
         redirect();
       }
   }

}