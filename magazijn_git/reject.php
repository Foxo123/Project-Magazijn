<?php


   
class Reject{
    public $conn;
 

    public function __construct(){ 

      require_once "../Database.php";
      $database = new Database();

      $this->conn = $database->conn;

    }

    function reject(){
        try {
      $id = $_GET["id"];
      
          $sql = $this->conn->prepare("UPDATE `artikel` SET `goedgekeurd` = FALSE WHERE `id` = $id");
        $sql->execute();
    
        echo  "afkeuren is gelukt";
        header("Refresh:7; ./artikelen_goedkeuren_afkeuren.php");

    }   catch(PDOException $e) {
        echo "afkeuren is mislukt";
        header("Refresh:7; ./artikelen_goedkeuren_afkeuren.php");
      } 
     
    
        
  
    }
}


$reject = new Reject();

$reject->reject();

?>