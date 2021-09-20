<?php
    class GPS{
        //Private
            private $_id;
            private $_nom;
            private $_latitude;
            private $_longitude;
            private $_bdd;
        //Public
            public function __construct($BDD){
                $this->_bdd = $BDD;
            }
        //Fonction qui permet d'ajouter des coordonnées en base de données elle attend en paramètre un nom, latitude et la longitude
            public function addcoordonnees($nom, $latitude, $longitude){
                $reqaddcoordonnees = $this->_BDD->prepare("INSERT INTO `gps`(`id_bateau`, `latitude`, `longitude`) VALUES ('$nom','$latitude','$longitude')");
                $reqaddcoordonnees->execute(array($nom, $latitude, $longitude));
            }
        //Fonction qui permet de mettre à jour les coordonnées GPS elle attend en paramètre le nom du point gps
            public function updatecoordonnees($nom){
                $requpdatecoordonnees = $this->_BDD->prepare("UPDATE `gps` SET `id_bateau`='$nom'");
                $requpdatecoordonnees->execute();
            }
        //Fonction qui permet de supprimer un point gps de la base de données elle attend en paramètre le nom du point gps
            public function removeGPS($nom){
                $reqremoveGPS = $this->_BDD->prepare("DELETE FROM `gps` WHERE `id_bateau`='$nom'");
                $reqremoveGPS->execute();
            }
        //Fonction qui donne les coordonnées d'un point gps elle attend en paramètre le nom du point gps
            public function getcoordonnees($nom){
                $reqgetcoordonnees = $this->_BDD->prepare("SELECT `id_bateau` FROM `gps`");
                $reqgetcoordonnees->execute();
            }
        //Fonction qui retourne latitude
            public function getlatitude(){
                return $this->_latitude;
            }
        //Fonction qui retourne longitude
            public function getlongitude(){
                return $this->_longitude;
            }
    }
?>