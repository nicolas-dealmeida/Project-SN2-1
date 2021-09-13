<?php
class user
{
    // Variable privée

    private $_id;
    private $_nom;
    private $_prenom;
    private $_login;
    private $_mdp;
    private $_BDD;

    // Variable public

    function __construct($BDD)
    {
        $this->_BDD = $BDD;
    }

    // Fonction qui permet au user de se connecter, elle attend en paramétre un login et un mdp
    function connexion($login, $mdp)
    {
        if (isset($_POST['log']) && isset($_POST['pass'])) {
            $login = $_POST['log'];
            $mdp = $_POST['pass'];

            $req = "SELECT count(*) FROM user where 
            pseudo = '" . $login . "' and mdp = '" . $mdp . "' ";
            $RequetStatement = $this->_BDD->query($req);
            $count = $RequetStatement->fetchColumn();

            if ($count != 0) {
                $_SESSION['log'] = $login;
                include("accueil.php");
            } else {
                include("connexion.php");
            }
        } else {
            include("connexion.php");
        }
    }

    function deconnexion()
    {
        session_start();
        session_destroy();
        include("connexion.php");
        exit();
    }

    // Fonction qui permet au user de s'inscrire, elle attend en commentaire un login, un mdp, un nom et un prénom
    function inscription($login, $mdp, $nom, $prenom, $confmdp)
    {
        if ($mdp == $confmdp) {

            $req = "INSERT INTO `user`(`nom`, `prenom`, `pseudo`, `mdp`, `admin`) VALUES ('$nom', '$prenom', '$login', '$mdp','0')";
            $RequetStatement = $this->_BDD->query($req);
        } else {
            echo "erreur";
        }

        include("index.php");
    }
}
