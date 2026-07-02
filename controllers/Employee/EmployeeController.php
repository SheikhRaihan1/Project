<?php


class EmployeeController
{


    function index()
    {
        $data = Employee::all();
        view("", compact("data"));
    }


    function create(){
        view("",);
    }
    function save(){
        print_r($_POST);

       if(isset($_POST["btn_submit"])){
       $employee= new Employee();
       $employee->name= $_POST["name"];
       $employee->phone= $_POST["phone"];
       $employee->designation= $_POST["designation"];
       $employee->create();
         redirect();
       }
      
    }

    function delete(){
        $id= $_GET["id"];
        Employee::delete($id);
        redirect();
    }

   function edit(){
     $data= Employee::find($_GET["id"]);
     view("", compact("data"));
   }

   function update(){
    if(isset($_POST["btn_submit"])){
       $employee= new Employee();
       $employee->id= $_POST["id"];
       $employee->name= $_POST["name"];
       $employee->phone= $_POST["phone"];
       $employee->designation= $_POST["designation"];
       $employee->update();
         redirect();
       }
   }

}