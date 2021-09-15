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
            public function addcoordonner($nom, $latitude, $longitude){

            }
        //Fonction qui permet de mettre à jour les coordonnées GPS elle attend en paramètre le nom du point gps
            public function updatecoodonner($nom){

            }
        //Fonction qui permet de supprimer un point gps de la base de données elle attend en paramètre le nom du point gps
            public function removeGPS($nom){

            }
        //Fonction qui donne les coordonnées d'un point gps elle attend en paramètre le nom du point gps
            public function getcoordonner($nom){

            }
        //Fonction qui retourne latitude
            public function getlatitude(){

            }
        //Fonction qui retourne longitude
            public function getlongitude(){
                
            }
    }
?>