<?php
// Maak contact met de database
ob_start();
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "magazijn";

// include("./connect_db.php");
include("./Database.php");

$db = new Database();

try {
    $conn = $db->conn;

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO category(category) VALUES (:category)");

    $stmt->bindParam(':category', $category);

    // insert a row
    $category = $_POST["category"];

    var_dump($stmt->queryString);

    $stmt->execute();

    echo "New records created succesfully";
    header("Refresh:2; ./read.php");
} catch (PDOException $e) {
    echo $e->getMessage();
    header("Location: ./index.php");
}
$conn = null;
