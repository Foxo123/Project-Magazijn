<?php 
class Artikelen {

    public $id;
    public $omschrijving;
    public $aantal;
    public $category;
    public $locatie;
    public $kosten;
    public $uitgeleend;

    private $db;
    //sets up the database connection
    public function __construct(){
        $this->db = new Database();
    }
    //returns all the records form the table artikel
    public function getArtikelen(){
        $this->db->query('SELECT * FROM artikel');

        $result = $this->db->resultSet();

        return $result;
    }
    //executes the query for creating new item records
    public function insertArtikel(){
            $this->db->query("INSERT INTO artikel (omschrijving, category, aantal, kosten, locatie, geleend)
            VALUES (:omschrijving, :category, :aantal, :kosten, :locatie, :geleend)");

            $this->db->bind(":omschrijving", $this->omschrijving);
            $this->db->bind(":category", $this->category);
            $this->db->bind(":aantal", $this->aantal);
            $this->db->bind(":kosten", $this->kosten);
            $this->db->bind(":locatie", $this->locatie);
            $this->db->bind(":geleend", false);


            $this->db->execute();
    }
    //returns every selected from a record with the specified id
    public function getInfoById(){
            $this->db->query("SELECT * FROM artikel WHERE artikelid = $this->id");
            $this->db->execute();

            return $this->db->result();
    }
    //executes a query for updating the items witht the given information
    public function updateArtikel(){
       $this->db->query("UPDATE artikel SET
                                        omschrijving = :omschrijving,
                                        category = :category,
                                        aantal = :aantal,
                                        kosten = :kosten,
                                        locatie = :locatie
                                        WHERE artikelid = :id");

        $this->db->bind(":omschrijving", $this->omschrijving);
        $this->db->bind(":category", $this->category);
        $this->db->bind(":aantal", $this->aantal);
        $this->db->bind(":kosten", $this->kosten);
        $this->db->bind(":locatie", $this->locatie);
        $this->db->bind(":id", $this->id);

        $this->db->execute();
    }
    //deletes the item with the specified id
    public function delete() {
        $this->db->query("DELETE FROM artikel WHERE artikelid=:id");

        $this->db->bind(":id", $this->id);

        $this->db->execute();
    }
    //gets the columns `artikelid`,`omschrijving`, `category` where geleend = 1
    public function getGeleend($status = 1){
        $this->db->query("SELECT artikelid,omschrijving,category FROM artikel WHERE geleend = :geleend ORDER BY category,omschrijving DESC");
        $this->db->bind(":geleend", $status);
        $this->db->execute();

        return $this->db->resultSet();
    }

    public function toggleGeleend($status){
        $status = intval($status);
        $this->db->query("UPDATE artikel SET geleend = :geleend WHERE artikelid = :id");

        $this->db->bind(":geleend", $status);
        $this->db->bind(":id", $this->id);

        $this->db->execute();
    }

}
?>