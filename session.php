<?php
    try{
        $BDD = new PDO('mysql:host=192.168.64.50;dbname=GPS; charset=utf8', 'admin', 'root');
    }catch(Exception $e){
        die('Erreur : '. $e->getMessage());
    }
?>
