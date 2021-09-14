<?php
    if(isset($_SESSION['id_user'])){
        include("accueil.php");
    }else{
        include("connexion.php");
    }
?>