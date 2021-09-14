<?php
class user{
    // Variable privée
        private $_id;
        private $_nom;
        private $_prenom;
        private $_login;
        private $_mdp;
        private $_BDD;
    // Variable public
    function __construct($BDD){
        $this->_BDD = $BDD;
    }
    // Fonction qui permet au user de se connecter, elle attend en paramétre un login et un mdp
    function connexion($login, $mdp){
        $requser = $this->_BDD->prepare("SELECT * FROM `user` WHERE `pseudo` = ? AND `mdp` = ?");
        $requser->execute(array($login, $mdp));
        $userexist = $requser->rowCount();
        if ($userexist == 1) {
            $userexist = $requser->fetch();
             $_SESSION['id_user'] = $userexist['id'];
        }else{
            echo "Mots de passe incorrect.";
        }
    }
    // Fonction qui permet au user de se déconnecter
    function deconnexion(){
        session_destroy();
        require_once("connexion.php");
        exit();
    }
    // Fonction qui permet au user de s'inscrire, elle attend en commentaire un login, un mdp, un nom et un prénom
    function inscription($login, $mdp, $nom, $prenom, $confmdp){
        if($mdp == $confmdp){
            $req = "INSERT INTO `user`(`nom`, `prenom`, `pseudo`, `mdp`) VALUES ('$nom', '$prenom', '$login', '$mdp')";
            $this->_BDD->query($req);
            echo "Inscription réussite.";
        }
        else{
            echo "Le Mots de passe n'est pas le même.";
        }
    }
}