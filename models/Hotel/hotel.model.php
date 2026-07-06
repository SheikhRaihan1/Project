<?php 

  class Hotel{
   
   public $id;
   public $name;
   public $city;
   public $rating;
   public $price_per_night;

   public function __construct()
   {
   }
  

   public function set($id,$name, $city,$rating, $price_per_night)
   {
     $this->id=$id;
     $this->name=$name;
     $this->name=$city;
     $this->name=$rating;
     $this->name=$price_per_night;
     
   }
   


     public function create(){
       global $db;
       $stmt= $db->query("insert into hotels (name, city, rating, price_per_night)
        values('$this->name', 
          '$this->city',
          '$this->rating',
          '$this->price_per_night'
        )
       ");
       return $db->insert_id;
     }
     public function update(){
       global $db;
       $stmt= $db->query("update hotels set 
          
          name= '$this->name', 
          city= '$this->city',
          rating= '$this->rating',
          price_per_night= '$this->price_per_night'
          where id= $this->id
       ");
       return $stmt;
     }

     public static function all(){
       global $db;
       $stmt= $db->query("select * from hotels");
       return  array_map( fn($d)=> (object) $d, $stmt->fetch_all(MYSQLI_ASSOC));
     }
     public static function find($id){
       global $db;
       $stmt= $db->query("select * from hotels where id=$id");
       return   $stmt->fetch_object();
     }
     public static function delete($id){
       global $db;
       $stmt= $db->query("delete  from hotels where id= $id");
       return $stmt;
     }

   public static function html_select($name){
       global $db;
       $stmt= $db->query("select * from hotels ");
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