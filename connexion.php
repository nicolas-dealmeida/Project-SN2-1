<?php
    session_start();

    try{
        $BDD=new PDO('mysql:host=; dbname=; charset=utf8','','');
    }catch(Exception $e){
        die('Erreur : '. $e->getMessage());
    }   

    if(isset($_POST['log'] && isset($_POST['pass'])){
        $username = $_POST['log'];
        $password = $_POST['pass'];

        $req = ""
        $RequetStatement=$BDD->query($req);
        $count=$RequetStatement->fetchColumn();

        if($count!=0){
            $_SESSION['log'] = $username;
            include("");    
        }
        else{
            include("login.php");
        }
    }else{
        include("login.php")
    }
?>