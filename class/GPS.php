<?php
class GPS
{
    //private

    private $_id;
    private $_nom;
    private $_latitude;
    private $_longitude;
    private $_bdd;

    //public

    function __construct($BDD){
        $this->_BDD = $BDD;
    }
    

    //fonction qui permet d'ajouter des coordonner en base de donner elle attende en paramettre un nom, latitude et la longitude
    function addcoordonner($nom, $latitude, $longitude)
    {

    }

    //fonction qui permet de mettre a jour les coodonner GPS aller attende en paramettre le nom du point gps
    function updatecoodonner($nom)
    {

    }

    //fonction qui permet de supprimer un point gps de la base de donner elle attende en paramettre le nom du point gps
    function removeGPS($nom){


    }

    //fonction qui donner les coordonner d'un point gps ell attende en paramettre le nom du point gps

    function getcoordonner($nom){

    }

    //fonction qui retourne latitude
    function getlatitude(){

    }

    //fonction qui retourne longitude
    function getlongitude(){
        
    }
}
?>