<?php
if (!empty($_GET)) {
    switch ($_GET["alert"]) {
        case "connection-failed":
            echo '<div class="alert alert-danger" style="text-align: center;" role="alert">
                        connectie gefaald probeer later opnieuw
                        </div>';
                        header("Refresh: 3; ./Artikelen/create.php");
            break;
        case "creating-failed":
            echo '<div class="alert alert-danger" style="text-align: center;" role="alert">
                        artikel aanmaken niet gelukt.. probeer later opnieuw
                        </div>';
                        header("Refresh: 3; ./Artikelen/create.php");
            break;
        case "creating-success":
            echo '<div class="alert alert-success" style="text-align: center;" role="alert">
                        Artikel succesvol aangemaakt                       
                        </div>';
                        header("Refresh: 3; ./Artikelen/read.php");
            break;
        case "creating-success":
            echo '<div class="alert alert-success" style="text-align: center;" role="alert">
                        Artikel succesvol aangemaakt                       
                        </div>';
                        header("Refresh: 3; ./Artikelen/read.php");
            break;
        default:
            break;
    }
}

   
?>