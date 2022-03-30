<?php 

class Category{
    public $omschrijving;

    public $logs = [];
    private $db;

   public function __construct()
   {
       $this->db = new Database();
   }

   //reads all information from the table and returns a string for a html selector
   public function getCategory(){
            $this->db->query("SELECT * FROM category");
            $result = $this->db->resultSet();
            
            return $result;
   }
}

?>