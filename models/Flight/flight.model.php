<?php 

  class Flight{
   
   public $id;
   public $airline;
   public $flight_no;
   public $source;
   public $destination;
   public $price;


   public function __construct()
   {
   }
  

   public function set($id,$airline,$flight_no, $source, $destination,$price)
   {
     $this->id=$id;
     $this->airline=$airline;
     $this->flight_no=$flight_no;
     $this->source=$source;
     $this->destination=$destination;
     $this->price=$price;
     
   }
   


     public function create(){
       global $db;
       $stmt= $db->query("insert into flights (name, phone, designation)
        values(
          '$this->airline',
          '$this->flight_no',
          '$this->source',
          '$this->destination',
          '$this->price'
        )
       ");
       return $db->insert_id;
     }
     public function update(){
       global $db;
       $stmt= $db->query("update flights set 
          
          airline= '$this->airline', 
          flight_no= '$this->flight_no', 
          source= '$this->source', 
          destination= '$this->destination', 
          price= '$this->price'
          where id= $this->id
       ");
       return $stmt;
     }

     public static function all(){
       global $db;
       $stmt= $db->query("select * from flights");
       return  array_map( fn($d)=> (object) $d, $stmt->fetch_all(MYSQLI_ASSOC));
     }
     public static function find($id){
       global $db;
       $stmt= $db->query("select * from flights where id=$id");
       return   $stmt->fetch_object();
     }
     public static function delete($id){
       global $db;
       $stmt= $db->query("delete  from flights where id= $id");
       return $stmt;
     }

 public static function html_select($name="flight_id",$selected="")
{
    global $db;

    $stmt = $db->query("SELECT id, flight_no FROM flights");

    $html="<select class='form-select' name='$name' id='$name'>";
    $html.="<option value=''>Select Flight</option>";

    while($row=$stmt->fetch_object()){

        $select=($selected==$row->id)?"selected":"";

        $html.="<option value='$row->id' $select>$row->flight_no</option>";
    }

    $html.="</select>";

    return $html;
}




  }


?>