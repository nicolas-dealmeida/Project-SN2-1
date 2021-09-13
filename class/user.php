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


        // Fonction qui permet au user de se connecter, elle attend en paramétre un login et un mdp
        function connexion($login, $mdp, $BDD)
        {
            if(isset($_POST['log']) && isset($_POST['pass'])){
                $login = $_POST['log'];
                $mdp = $_POST['pass'];
         
                $req = "";
                $RequetStatement=$BDD->query($req);
                $count=$RequetStatement->fetchColumn();
        
                if($count!=0){
                    $_SESSION['log'] = $login;
                    include("");    
                }
                else{
                    include("login.php");
                }
            }else{
                include("login.php");
            }
        }

        // Fonction qui permet au user de s'inscrire, elle attend en commentaire un login, un mdp, un nom et un prénom
        function inscription($login, $mdp, $nom, $prenom, $BDD)
        {
            if(!empty($_POST)){
                extract($_POST);
                $valid = true;
                
                if(isset($_POST['inscription'])){ // On récupére les informations saisie dans le formulaire d'inscription
                    $login = htmlentities(trim($login));
                    $nom = htmlentities(trim($nom));
                    $prenom = htmlentities(trim($prenom));
                    $mdp = trim($mpd);
                }

                if(empty($nom)){ // On vérifie si les champs sont remplis
                    $valid = false;
                    $veref_nom = ("Le nom est obligatoire");
                }

                if(empty($prenom)){
                    $valid = false;
                    $veref_prenom = ("Le prénom est obligatoire");
                }

                if(empty($mdp)){
                    $valid = false;
                    $veref_mdp = "Mot de passe obligatoire";
                }

                if($valid){ // On mets les informations dans la BDD
                    $mdp = crypt($mdp, "$6$rounds=5000$macleapersonnaliseretagardersecret$");

                    $BDD->insert("INSERT INTO utilisateur (nom, prenom, mail, mdp) VALUES 
                    (?, ?, ?, ?)", 
                    array($nom, $prenom, $mail, $mdp));
                }

                include("index.php");
  
            }
        }
    }
?>