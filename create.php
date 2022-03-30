<?php
// Maak contact met de database
ob_start();
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "magazijnen";

// include("./connect_db.php");
include("./Database.php");

$db = new Database();

try {
    $conn = $db->conn;

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO magazijnen(id, locatie, acadamie, owner) VALUES (:id, :locatie, :acadamie:, :owner)");

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':locatie', $locatie);
    $stmt->bindParam(':acadamie', $acadamie);
    $stmt->bindParam(':owner', $owner);


    // insert a row
    $id = NULL;
    $locatie = $_POST["locatie"];
    $acadamie = $_POST["acadamie"];
    $owner = $_POST["owner"];

    var_dump($stmt->queryString);

    $stmt->execute();

    echo "New records created succesfully";
    header("Refresh:2; ./read.php");
} catch (PDOException $e) {
    echo $e->getMessage();
    header("Location: ./read.php");
}
$conn = null;
