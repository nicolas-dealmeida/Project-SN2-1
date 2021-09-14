<?php
class user
{
    // Variable privée
    private $_id;
    private $_nom;
    private $_prenom;
    private $_login;
    private $_admin;
    private $_mdp;
    private $_BDD;
    // Variable public
    public function __construct($BDD)
    {
        $this->_BDD = $BDD;
    }
    // Fonction qui permet au user de se connecter, elle attend en paramétre un login et un mdp
    public function connexion($login, $mdp)
    {
        $requser = $this->_BDD->prepare("SELECT * FROM `user` WHERE `pseudo` = ? AND `mdp` = ?");
        $requser->execute(array($login, $mdp));
        $userexist = $requser->rowCount();
        if ($userexist == 1) {
            $userexist = $requser->fetch();
            $_SESSION['id_user'] = $userexist['id'];
            $this->_id = $userexist['id'];
            $this->_nom = $userexist['nom'];
            $this->_prenom = $userexist['prenom'];
            $this->__login = $userexist['pseudo'];
            $this->_mdp = $userexist['mdp'];
            $this->_admin = $userexist['admin'];
        } else {
            echo "Mots de passe incorrect.";
        }
    }
    // Fonction qui permet au user de se déconnecter
    public function deconnexion()
    {
        session_destroy();
    }
    // Fonction qui permet au user de s'inscrire, elle attend en commentaire un login, un mdp, un nom et un prénom
    public function inscription($login, $mdp, $nom, $prenom, $confmdp)
    {
        if ($mdp == $confmdp) {
            $req = "INSERT INTO `user`(`nom`, `prenom`, `pseudo`, `mdp`) VALUES ('$nom', '$prenom', '$login', '$mdp')";
            $this->_BDD->query($req);
            echo "Inscription réussite.";
        } else {
            echo "Le Mots de passe n'est pas le même.";
        }
    }

    //foncion qui retourne le nom du user
    public function getnom()
    {
        return $this->_nom;
    }
    //fonction qui return le prenom du user
    public function getprenom()
    {
        return $this->_prenom;
    }
    //fonction qui retourn le login du user
    public function getlogin()
    {
        return $this->_login;
    }
    //fonction qui returne l'id du user
    public function getid()
    {
        return $this->_id;
    }
    //fonction qui retourne le statue admin 
    public function getadmin()
    {
        return $this->_admin;
    }
}
