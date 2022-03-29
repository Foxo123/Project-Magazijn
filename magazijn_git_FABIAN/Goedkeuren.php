<?php


   
class Goedkeuren{
   
  public $conn;
 

    public function __construct(){ 
      
      require_once "../Database.php";
      $database = new Database();

      $this->conn = $database->conn;

    }

    function goedkeuren(){
      try {
      $id = $_GET["id"];
      
          $sql = $this->conn->prepare("UPDATE `artikel` SET `goedgekeurd` = TRUE WHERE `id` = $id");
        $sql->execute();
        echo  "Goedkeuren is gelukt";
        header("Refresh:2; ./artikelen_goedkeuren_afkeuren.php");
      
      }   catch(PDOException $e) {
        echo  "Goedkeuren is mislukt";
         header("Refresh:2; ./artikelen_goedkeuren_afkeuren.php");
      } 

     
    
        
      
       
      
    }

}


$goedkeuren = new Goedkeuren();

$goedkeuren->goedkeuren();




?>