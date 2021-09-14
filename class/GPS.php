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
        //Fonction qui permet d'ajouter des coordonner en base de donner elle attend en paramettre un nom, latitude et la longitude
            public function addcoordonner($nom, $latitude, $longitude){
                
            }
        //Fonction qui permet de mettre a jour les coodonner GPS elle attend en paramettre le nom du point gps
            public function updatecoodonner($nom){
            }
        //Fonction qui permet de supprimer un point gps de la base de donner elle attend en paramettre le nom du point gps
            public function removeGPS($nom){
            }
        //Fonction qui donner les coordonner d'un point gps elle attend en paramettre le nom du point gps
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