<?php
require_once './class.php';
//class artikel goedkeuren voor de opmaak?
  class ArtikelGoedkeuren{
   
    public $conn;

// here you connect with the database
    public function __construct(){ 

      require_once "../Database.php";
      $database = new Database();

      $this->conn = $database->conn;
    }
    public function read(){
        try{
        
           //here select the tabel from the database
            $sql = $this->conn->prepare("SELECT * FROM artikel");
            
            $sql->execute();
    
            $result = $sql->setFetchMode(PDO::FETCH_OBJ);
    
            $records = "";
            //here you make te card with the informatien
            while($record = $sql->fetch()){
                $records .= "    <div class='card' style='width: 18rem;'>
                <div class='card-header1'>
                  Featured
                </div>
                <ul class='list-group list-group-flush'>
                <p  class='card-text'>" . $record->omschrijving. "</p>
                <p  class='card-text'>" . $record->category . "</p>
                <p  class='card-text'>" . $record->aantal . "</p>
               
                <p class='card-text'>" . $record->inkoopprijs . "</p>
                 

                </ul>
              </div>
              <td>
              <a href='./Goedkeuren.php? id=". $record->id . "'>
              <button type='button' class='btn btn-success' href='./Goedkeuren.php? id='>goedkeuren" . $record->id . "</button>
            </td>
             </a>
             <td>
             <a href='./reject.php? id=". $record->id . "'>
             <button type='button' class='btn btn-danger' href='./reject.php? id='>afkeuren" . $record->id . "</button>
           </td>
            </a>
             
              
              
            ";}
           
            return $records;
            //<button type='button' class='btn btn-success' href='./Goedkeurenafkeuren.php? id='>goedkeuren" . $record->id . "</button>
        }catch(PDOException $e){
          //this is for the errors
            array_push($this->logs,"reading failed" . $e->getMessage());
          
        }
    }
      }
      
    ?>




               