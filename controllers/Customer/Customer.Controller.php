<?php


class CustomerController
{


    function index()
    {
        $data = Customer::all();
        view("", compact("data"));
    }


    function create(){
        view("",);
    }
    function save(){
        print_r($_POST);

       if(isset($_POST["btn_submit"])){
       $customer= new Customer();
       $customer-> name= $_POST[" name"];
       $customer->phone= $_POST["phone"];
       $customer->email= $_POST["email"];
       $customer->passport_no= $_POST["passport_no"];
       $customer->address= $_POST["address"];
       $customer->create();
         redirect();
       }
      
    }

    function delete(){
        $id= $_GET["id"];
        Customer::delete($id);
        redirect();
    }

   function edit(){
     $data= Customer::find($_GET["id"]);
     view("", compact("data"));
   }

   function update(){
    if(isset($_POST["btn_submit"])){
       $customer= new Customer();
       $customer->id= $_POST["id"];
       $customer-> name= $_POST[" name"];
       $customer->phone= $_POST["phone"];
       $customer->email= $_POST["email"];
       $customer->passport_no= $_POST["passport_no"];
       $customer->address= $_POST["address"];
       $customer->update();
         redirect();
       }
   }

}