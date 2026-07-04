<?php 

  class Package{
   
   public $id;
   public $title;
   public $description;
   public $destination;
   public $duration;
   public $price;
   public $max_persons;
   public $image;
   public $status;
   public $created_at;
  

   public function __construct()
   {
   }
  

   public function set($id,$title, $description, $duration, $price, $max_persons, $image, $status, $created_at)
   {
     $this->id=$id;
     $this->title=$title;
     $this->description=$description;
     $this->duration=$duration;
     $this->price=$price;
     $this->max_persons=$max_persons;
     $this->image=$image;
     $this->status=$status;
     $this->created_at=$created_at;
   }
   


     public function create(){
       global $db;
       $stmt= $db->query("insert into packages (title, description, duration, price, max_persons, image, status, created_at)
        values('$this->title', 
          '$this->description',
          '$this->duration',
          '$this->price',
          '$this->max_persons',
          '$this->image',
          '$this->status',
          '$this->created_at'
        )
       ");
       return $db->insert_id;
     }
     public function update(){
       global $db;
       $stmt= $db->query("update packages set 
          
          title= '$this->title', 
          description= '$this->description',
          duration= '$this->duration',
          price= '$this->price',
          max_persons= '$this->max_persons',
          image= '$this->image',
          status= '$this->status',
          created_at= '$this->created_at'
          where id= $this->id
       ");
       return $stmt;
     }

     public static function all(){
       global $db;
       $stmt= $db->query("select * from packages");
       return  array_map( fn($d)=> (object) $d, $stmt->fetch_all(MYSQLI_ASSOC));
     }
     public static function find($id){
       global $db;
       $stmt= $db->query("select * from packages where id=$id");
       return   $stmt->fetch_object();
     }
     public static function delete($id){
       global $db;
       $stmt= $db->query("delete  from packages where id= $id");
       return $stmt;
     }





  }


?>