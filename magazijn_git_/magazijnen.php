<?php
//here is the class magazijnen
  class Magazijnen{
   
    public $conn;

    // this is for the conn with the database
    public function __construct(){ 

      require_once "../Database.php";
      $database = new Database();

      $this->conn = $database->conn;
    }
    public function read(){
        try{
        
           //here select the tabel from the database
            $sql = $this->conn->prepare("SELECT * FROM magazijnen");
            
            $sql->execute();
    
            $result = $sql->setFetchMode(PDO::FETCH_OBJ);
            //here you make the card
            $records = "";
            while($record = $sql->fetch()){
                $records .= "    <div class='card' style='width: 18rem;'>
                <div class='card-header1'>
                  Featured
                </div>
                <ul class='list-group list-group-flush'>
                <p  class='card-text'>" . $record->acadamie. "</p>
                <p  class='card-text'>" . $record->owner . "</p>
                <p  class='card-text'>" . $record->locatie . "</p>
               
            
                 

                </ul>
              </div>

              
              
              
            ";}
         
            return $records;
            
        }catch(PDOException $e){
          //this is for errors
            array_push($this->logs,"reading failed" . $e->getMessage());
          
        }
    }
      }
      $magazijn = new Magazijnen();
    ?>














<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>magazijn</title>
  </head>
  <body>

<div class="container">


 <!--here you load the cards  --!>  
    <?= $magazijn->read(); ?>



  
</div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>