<?php 
class Database {
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_name = DB_NAME;

    private $statement;
    private $dbHandler;
    private $error;

    //making connection with the database
    public function __construct()
    {
        $conn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ) ;
        try {
            $this->dbHandler = new PDO($conn, $this->db_user,$this->db_pass,$options);

        }catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //Sets the query
    public function query($sql){
        $this->statement = $this->dbHandler->prepare($sql);
    }

    //Binds parameters
    public function bind($parameter, $value, $type = null){
        switch(is_null($type)){
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
                break;
        }
        $this->statement->bindValue($parameter,$value,$type);
    }

    //executes the prepared statment
    public function execute()
    {
        return $this->statement->execute();
    }
    //return array
    public function resultSet() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    //Return a specific row as an object
    public function result() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }
    //Get the row count
    public function rowCount(){
        return $this->rowCount();
    }
} 


?>