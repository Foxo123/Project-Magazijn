<?php

class Database{
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    public $conn;

    public $logs = [];


    //sets up all database connection so we can use it inside other classes
    public function __construct()
    {
        try{
            require_once "../connect_db.php";


            $this->db_host = DB_HOST;
            $this->db_user = DB_USER;
            $this->db_pass = DB_PASS;
            $this->db_name = DB_NAME;

            $this->conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user,$this->db_pass);
        
            // set the PDO error mode to exception
        
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            array_push($this->logs, "connected succesfully");
        }
        catch(PDOException $e){
            array_push($this->logs,"connection failed: " . $e->getMessage());
            header("Location: ../message.php?alert=connection-failed");
        }
    }


}


?>