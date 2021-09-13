<?php
    session_start();

    if(isset($_SESSION['connexion'])){
        try{
            $BDD = new PDO('mysql:host=192.168.64.50;dbname=GPS; charset=utf8', 'admin', 'root');
            echo 'coucou';
        }catch(Exception $e){
            die('Erreur : '. $e->getMessage());
        }
    } else {
        include("connexion.php");
    }
?>