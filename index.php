<?php
    if(isset($_SESSION['id'])){
        include("index.php");
    } else {
        include("connexion.php");
    }
?>