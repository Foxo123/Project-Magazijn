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

    // sql delete a record
    $sql = "DELETE FROM magazijnen WHERE id=:id";


    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    if (!isset($_GET['id'])) {
        header("Location: ./read.php");
        exit();
    }

    $id = $_GET['id'];

    $stmt->execute();
    echo "record met id={$id} is verwijderd";
    header("Refresh:2; ./read.php");
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
