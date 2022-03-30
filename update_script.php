<?php
// Maak contact met de database
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "magazijnen";

// include("./connect_db.php");
include("./Database.php");

$db = new Database();

try {
    $conn = $db->conn;

    // $id = $_POST["id"];
    // $oldId = $_POST["old-id"];
    // var_dump($_POST['']);

    $sql = "UPDATE magazijnen
            SET    locatie = :locatie,
                   acadamie = :acadamie,
                   owner = :acadamie
            WHERE  id = :id";

    $stmt = $conn->prepare($sql);

    $id = $_POST["id"];
    $locatie = $_POST["locatie"];
    $acadamie = $_POST["acadamie"];
    $owner = $_POST["owner"];

    $stmt->bindParam(':locatie', $locatie);
    $stmt->bindParam(':acadamie', $acadamie);
    $stmt->bindParam(':owner', $owner);
    $stmt->bindParam(':id', $id);





    $stmt->execute();

    echo "record met id={$id} is gewzijgid";
    header("Refresh:2; ./read.php");
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
