<?php 

  class Package{
   
   public $id;
   public $title;
   public $description;
   public $destination;
   public $hotel_id;
   public $duration;
   public $price;
   public $max_persons;
   public $image;
   public $status;
   public $created_at;
  

   public function __construct()
   {
   }
  

   public function set($id,$title, $description,$destination,$hotel_id, $duration, $price, $max_persons, $image, $status, $created_at)
   {
     $this->id=$id;
     $this->title=$title;
     $this->description=$description;
     $this->destination=$destination;
     $this->hotel_id=$hotel_id;
     $this->duration=$duration;
     $this->price=$price;
     $this->max_persons=$max_persons;
     $this->image=$image;
     $this->status=$status;
     $this->created_at=$created_at;
   }
   


     public function create(){
       global $db;
       $stmt= $db->query("insert into packages (title, description,destination,hotel_id, duration, price, max_persons, image, status, created_at)
        values('$this->title', 
          '$this->description',
          '$this->destination',
          '$this->hotel_id',
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
          destination= '$this->destination',
          hotel_id= '$this->hotel_id',
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

  public static function html_select($name = "package_id", $selected = "")
{
    global $db;

    $stmt = $db->query("SELECT id, title, destination, price
                        FROM packages
                        WHERE status='active'
                        ORDER BY title");

    $html = "<select id='$name' name='$name' class='form-select'>";
    $html .= "<option value=''>Select Package</option>";

    while ($row = $stmt->fetch_object()) {

        $select = ($selected == $row->id) ? "selected" : "";

        $html .= "<option value='$row->id' $select>
                    $row->title - $row->destination (৳$row->price)
                  </option>";
    }

    $html .= "</select>";

    return $html;
}

  }
?>