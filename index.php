<?php
    session_start();

    if(isset($_SESSION['connexion'])){
        include ("");
    }
    else{
        include("login.php");
    }
?>