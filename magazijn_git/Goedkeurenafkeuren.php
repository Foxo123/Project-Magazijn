<?php


   
class Goedkeurenafkeuren{

    public $conn;
 

    public function __construct(){ 

      require_once "../Database.php";
      $database = new Database();

      $this->conn = $database->conn;

    }

    function goedkeuren(){
    
        $sql = $this->conn->prepare("SELECT goedgekeurd FROM artikel");
       
            $sql->execute();
    
            $result = $sql->setFetchMode(PDO::FETCH_OBJ);


            $record = $sql->fetch();
           
  if($record == 0) {
    $sql = "UPDATE users
    SET goedgekeurd =  1";

   echo "het is goedgekeurd";
  } else {
    $sql = "UPDATE users
    SET goedgekeurd = 0";
  echo "het is goedkeuren is mislukt";
  }
         }
}

$goedkeuren = new Goedkeurenafkeuren();

$goedkeuren->goedkeuren();
?>