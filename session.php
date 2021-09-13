<?php
    session_start();
    try{
        $BDD = new PDO('mysql:host=192.168.64.50;dbname=GPS; charset=utf8', 'admin', 'root');
        //$BDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
        die('Erreur : '. $e->getMessage());
    }
?>
