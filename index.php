<?php
    if(isset($_SESSION['id_user'])){
        include("index.php");
    }else{
        include("connexion.php");
    }
?>