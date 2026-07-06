<?php 

  class Customer{
   
   public $id;
   public $name;
   public $email;
   public $phone;
   public $passport_no;
   public $address;

   public function __construct()
   {
   }
  

   public function set($id,$name, $email,$phone, $passport_no,$address)
   {
     $this->id=$id;
     $this->name=$name;
     $this->email=$email;
     $this->phone=$phone;
     $this->passport_no=$passport_no;
     $this->address=$address;
   }
   


     public function create(){
       global $db;
       $stmt= $db->query("insert into customers (name, email, phone, passport_no, address)
        values('$this->name', 
          '$this->email',
          '$this->phone',
          '$this->passport_no',
          '$this->address'
        )
       ");
       return $db->insert_id;
     }
     public function update(){
       global $db;
       $stmt= $db->query("update customers set 
          
          name= '$this->name', 
          email= '$this->email',
          phone= '$this->phone',
          passport_no= '$this->passport_no',
          address='$this->address'
          where id= $this->id
       ");
       return $stmt;
     }

     public static function all(){
       global $db;
       $stmt= $db->query("select * from customers");
       return  array_map( fn($d)=> (object) $d, $stmt->fetch_all(MYSQLI_ASSOC));
     }
     public static function find($id){
       global $db;
       $stmt= $db->query("select * from customers where id=$id");
       return   $stmt->fetch_object();
     }
     public static function delete($id){
       global $db;
       $stmt= $db->query("delete  from customers where id= $id");
       return $stmt;
     }


     public static function html_select($name){
       global $db;
       $stmt= $db->query("select * from customers ");
       $html = "";
       $html.="<select id='$name' class='form-select' name='$name'>";
        while ($row = $stmt->fetch_object()){
					$html.= "<option value='$row->id'>$row->name</option>";			
        }
        $html.="</select>";
       return  $html;
     }


  }


  


?>