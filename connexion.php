<?php
    session_start();

    try{
        $BDD=new PDO('mysql:host=192.168.64.50; dbname=GPS; charset=utf8','root','');
    }catch(Exception $e){
        die('Erreur : '. $e->getMessage());
    } 
?>