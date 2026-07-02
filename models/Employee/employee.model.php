<?php 

  class Employee{
   
   public $id;
   public $name;
   public $phone;
   public $designation;


   public function __construct()
   {
   }
  

   public function set($id,$name,$phone, $designation)
   {
     $this->id=$id;
     $this->name=$name;
     $this->phone=$phone;
     $this->designation=$designation;
     
   }
   


     public function create(){
       global $db;
       $stmt= $db->query("insert into employees (name, phone, designation)
        values('$this->name', 
          '$this->phone',
          '$this->designation'
        )
       ");
       return $db->insert_id;
     }
     public function update(){
       global $db;
       $stmt= $db->query("update employees set 
          
          name= '$this->name', 
          phone= '$this->phone',
          designation='$this->designation'
          where id= $this->id
       ");
       return $stmt;
     }

     public static function all(){
       global $db;
       $stmt= $db->query("select * from employees");
       return  array_map( fn($d)=> (object) $d, $stmt->fetch_all(MYSQLI_ASSOC));
     }
     public static function find($id){
       global $db;
       $stmt= $db->query("select * from employees where id=$id");
       return   $stmt->fetch_object();
     }
     public static function delete($id){
       global $db;
       $stmt= $db->query("delete  from employees where id= $id");
       return $stmt;
     }





  }


?>