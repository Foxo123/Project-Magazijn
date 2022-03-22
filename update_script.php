<?php
// Maak contact met de database
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "magazijn";

// include("./connect_db.php");
include("./Database.php");

$db = new Database();

try {
    $conn = $db->conn;

    $category = $_POST["category"];
    $oldCategory = $_POST["old-category"];
    var_dump($_POST['category']);

    $sql = "UPDATE category
            SET    category = :category

            WHERE  category = :oldCategory";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':oldCategory', $oldCategory);


    $stmt->execute();

    echo "record met category={$category} is gewzijgid";
    header("Refresh:2; ./read.php");
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
