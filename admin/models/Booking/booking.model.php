<?php 

  class Booking{
   
   public $id;
   public $user_id;
   public $package_id;
   public $travel_date;
   public $persons;
   public $total_price;
   public $status;
   public $created_at;

   public function __construct()
   {
   }
  

   public function set($id,$user_id, $package_id,$travel_date, $persons,$total_price,$status)
   {
     $this->id=$id;
     $this->user_id=$user_id;
     $this->package_id=$package_id;
     $this->travel_date=$travel_date;
     $this->persons=$persons;
     $this->total_price=$total_price;
     $this->status=$status;
   }
   


     public function create(){
       global $db;
       $stmt= $db->query("insert into bookings (user_id, package_id, travel_date, persons, total_price, status)
        values('$this->user_id', 
          '$this->package_id',
          '$this->travel_date',
          '$this->persons',
          '$this->total_price',
          '$this->status'
        )
       ");
       return $db->insert_id;
     }
     public function update(){
       global $db;
       $stmt= $db->query("update bookings set 
          
          user_id= '$this->user_id', 
          package_id= '$this->package_id',
          travel_date= '$this->travel_date',
          persons= '$this->persons',
          total_price='$this->total_price',
          status= '$this->status'
          where id= $this->id
       ");
       return $stmt;
     }

     public static function all(){
       global $db;
       $stmt= $db->query("select * from bookings");
       return  array_map( fn($d)=> (object) $d, $stmt->fetch_all(MYSQLI_ASSOC));
     }
     public static function find($id){
       global $db;
       $stmt= $db->query("select * from bookings where id=$id");
       return   $stmt->fetch_object();
     }
     public static function delete($id){
       global $db;
       $stmt= $db->query("delete  from bookings where id= $id");
       return $stmt;
     }





  }


?>