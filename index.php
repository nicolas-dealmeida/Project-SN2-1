<?php
    session_start();

    if(isset($_SESSION['connexion'])){
       
    } else {
        include("connexion.php");
    }
?>