<?php
include("connect_db.php");
include("./Database.php");

$category = $_GET["category"];

$sql = "DELETE FROM `category` WHERE `category` = $category";

mysqli_query($conn, $sql);

header("Location: ./read.php");
