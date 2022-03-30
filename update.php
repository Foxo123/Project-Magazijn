<?php
include("./connect_db.php");
include("./Database.php");

$db = new Database();

$id = $_GET["id"];

$sql = $db->conn->prepare("SELECT * FROM `magazijnen` WHERE `id` = '$id'");
$sql->execute();

$sql->setFetchMode(PDO::FETCH_ASSOC);

$records = $sql->fetch();

// echo "<pre>"; var_dump($record); echo "</pre>";



?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="categorie.css">
    <title>Magazijn bewerken</title>
</head>

<body>
    <form action="./update_script.php" method="post">
        <div class="col-3">
            <label for="exampleInputName" class="form-label">Locatie</label>
            <input type="name" class="form-control" id="exampleInputName" aria-describedby="emailName" name="locatie" value="<?php echo $records["locatie"]; ?>">
            <input type="hidden" name="old-locatie" value="<?= $records["locatie"] ?>">
        </div>
        <div class="col-3">
            <label for="exampleInputName" class="form-label">Academie</label>
            <input type="name" class="form-control" id="exampleInputName" aria-describedby="emailName" name="acadamie" value="<?php echo $records["acadamie"]; ?>">
            <input type="hidden" name="old-acadamie" value="<?= $records["acadamie"] ?>">
        </div>
        <div class="col-3">
            <label for="exampleInputName" class="form-label">Eigenaar</label>
            <input type="name" class="form-control" id="exampleInputName" aria-describedby="emailName" name="owner" value="<?php echo $records["owner"]; ?>">
            <input type="hidden" name="old-owner" value="<?= $records["owner"] ?>">
        </div>


        <br>
        <button type=" submit" class="btn btn-primary">Submit</button>
    </form>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>