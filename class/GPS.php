<?php
    class GPS{
        //Private
            private $_id;
            private $_nomBateau;
            private $_idBateau;
            private $_latitude;
            private $_longitude;
            private $_bdd;
        //Public
            public function __construct($BDD){
                $this->_bdd = $BDD;
            }
        //Fonction qui permet d'ajouter des coordonnées en base de données elle attend en paramètre un nom, latitude et la longitude
            public function addcoordonnees($latitude, $longitude){
                $this->_BDD->query("INSERT INTO `gps`(`id_bateau`, `latitude`, `longitude`) VALUES ('$this->_idBateau','$latitude','$longitude')");
            }
            
            //function qui permet de récuper l'id du bateau elle prend en parametre le nom du bateau et return rien
            public function getbateau($nom){
                $idbateau = $this->_bdd->query("SELECT `id`, `nom` FROM `bateau` WHERE `nom` = '$nom'");
                $data = $idbateau->fetch();
                $this->_idBateau = $data["id"];
                $this->_nomBateau = $data["nom"];
            }

        //Fonction qui permet de mettre à jour les coordonnées GPS elle attend en paramètre latitude et la longitude
            public function updatecoordonnees($latitude, $longitude){
                $requpdatecoordonnees = $this->_BDD->prepare("UPDATE `gps` SET `latitude`='$latitude',`longitude`='$longitude' WHERE `id_bateau` ='$this->_idBateau'");
                $requpdatecoordonnees->execute();
            }
        //Fonction qui permet de supprimer un point gps de la base de données elle attend en paramètre le nom du point gps
            public function removeGPS($nom){
                $reqremoveGPS = $this->_BDD->prepare("DELETE FROM `gps` WHERE `id_bateau`='$nom'");
                $reqremoveGPS->execute();
            }

            //function qui permet de suprimer des bateau en base elle attend en parametre l'id du bateau
            public function removeBateau($id){
                $this->_bdd->query("DELETE FROM `bateau` WHERE `id` ='$id'");
            }
        //Fonction qui donne les coordonnées d'un point gps elle attend en paramètre le nom du point gps
            public function getcoordonnees(){
                $reqgetcoordonnees = $this->_BDD->prepare("SELECT * FROM `gps` WHERE `id_bateau` ='$this->_idBateau'");
                $reqgetcoordonnees->execute();
                $data = $reqgetcoordonnees->fetch();
                $this->_latitude = $data['latitude'];
                $this->_longitude = $data['longitude'];
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