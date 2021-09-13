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

            $req = "";
            $RequetStatement = $this->_BDD->query($req);
            $count = $RequetStatement->fetchColumn();

            if ($count != 0) {
                $_SESSION['log'] = $login;
                include("");
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
    function inscription($login, $mdp, $nom, $prenom)
    {
        if (!empty($_POST)) {
            extract($_POST);
            $valid = true;

            if (isset($_POST['inscription'])) { // On récupére les informations saisie dans le formulaire d'inscription
                $login = htmlentities(trim($login));
                $nom = htmlentities(trim($nom));
                $prenom = htmlentities(trim($prenom));
                $mdp = trim($mpd);
            }

            if ($valid) { // On mets les informations dans la BDD
                $mdp = crypt($mdp, "$6$rounds=5000$macleapersonnaliseretagardersecret$");

                $this->BDD->insert(
                    "INSERT INTO utilisateur (nom, prenom, mail, mdp) VALUES 
                    (?, ?, ?, ?)",
                    array($nom, $prenom, $mail, $mdp)
                );
            }

            include("index.php");
        }
    }
}
