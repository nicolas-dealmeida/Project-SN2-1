<?php
class GPS
{
    //Private
    private $_id;
    private $_nomBateau;
    private $_idBateau;
    private $_latitude;
    private $_longitude;
    private $_bdd;
    //Public
    public function __construct($BDD)
    {
        $this->_bdd = $BDD;
    }
    //Fonction qui permet d'ajouter des coordonnées en base de données elle attend en paramètre un nom, latitude et la longitude
    public function addcoordonnees($latitude, $longitude)
    {
        $this->_bdd->query("INSERT INTO `gps`(`id_bateau`, `latitude`, `longitude`) VALUES ('$this->_idBateau','$latitude','$longitude')");
    }

    //function qui permet d'update le nom du bateau elle prend en paramatre le nouveau nom
    public function updateBateau($nom){
        $this->_bdd->query("UPDATE `bateau` SET `nom`='$nom' WHERE `id` ='$this->_idBateau'");
    }


    //function qui permet de récuper l'id du bateau elle prend en parametre l'id du bateau et return rien
    public function getbateau($id)
    {
        $idbateau = $this->_bdd->query("SELECT * FROM `bateau` WHERE `id` = '$id'");
        $data = $idbateau->fetch();
        $this->_idBateau = $data["id"];
        $this->_nomBateau = $data["nom"];
    }
    
    //function qui donne les cordonner et le bateau elle prend en paramettre l'id de la cordoner
    public function getbateauCordonner($id)
    {
        $idbateau = $this->_bdd->query("SELECT gps.`id`, gps.id_bateau, gps.latitude, gps.longitude, bateau.nom FROM gps, bateau WHERE gps.id_bateau = bateau.id AND gps.id = '$id'");
        $data = $idbateau->fetch();
        $this->_idBateau = $data["id"];
        $this->_nomBateau = $data["nom"];
        $this->_latitude = $data["latitude"];
        $this->_longitude = $data["longitude"];
        $this->_id = $data['id'];
    }
    

    //Fonction qui permet de mettre à jour les coordonnées GPS elle attend en paramètre latitude et la longitude
    public function updatecoordonnees($latitude, $longitude)
    {
        $requpdatecoordonnees = $this->_bdd->prepare("UPDATE `gps` SET `latitude`='$latitude',`longitude`='$longitude' WHERE `id_bateau` ='$this->_idBateau'");
        $requpdatecoordonnees->execute();
    }
    

    //function qui permet de suprimer des bateau en base elle attend en parametre l'id du bateau
    public function removeBateau($id)
    {
        $this->_bdd->query("DELETE FROM `bateau` WHERE `id` ='$id'");
    }

    //function qui permet de suprimer des coordoner en base elle attend en parametre l'id de la cordonner
    public function removeGPS($id)
    {
        $this->_bdd->query("DELETE FROM `gps` WHERE `id` = '$id'");
    }
    //Fonction qui donne les coordonnées d'un point gps elle attend en paramètre le nom du point gps
    public function getcoordonnees()
    {
        $reqgetcoordonnees = $this->_bdd->prepare("SELECT * FROM `gps` WHERE `id_bateau` ='$this->_idBateau'");
        $reqgetcoordonnees->execute();
        $data = $reqgetcoordonnees->fetch();
        $this->_latitude = $data['latitude'];
        $this->_longitude = $data['longitude'];
    }

    //fonction qui donner les cordoner d'un bateau et le nom du bateau dans un tableau pour la page admin
    public function givecoordonerplsunom()
    {
        $request = $this->_bdd->query("SELECT gps.`id`, gps.id_bateau, gps.latitude, gps.longitude, bateau.nom FROM gps, bateau WHERE gps.id_bateau = bateau.id ORDER BY `gps`.`id` DESC");
        while ($data = $request->fetch()) {
            $modf = "modifcordoner.php?modfBateau=" . $data["id_bateau"];
            $supr = "admin.php?suprBateau=" . $data["id"];
?>
            <tr>
                <td><?=$data['id']?></td>
                <td><?= $data['id_bateau']?></td>
                <td>
                    <a href="#"><?= $data['nom']?></a>
                </td>
                
                <td><?= $data['latitude'] ?></td>
                <td><?=$data['longitude']?></td>
                <td>
                    <a href="<?=$modf?>" class="settings" title="modifier" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                    <a href="<?=$supr?>" class="delete" title="supprimer" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                </td>
            </tr>
<?php
        }
    }
    //function qui permet les les marquer sur une carte elle prendre rien en parametre
    public function afficheMarker(){
 //
}

    //Fonction qui retourne latitude
    public function getlatitude()
    {
        return $this->_latitude;
    }
    //Fonction qui retourne longitude
    public function getlongitude()
    {
        return $this->_longitude;
    }
    //function qui retourne le nom du bateau

    public function getNomBateau(){
        return $this->_nomBateau;
    }

    //fonction qui return l'id de la cordonner
    public function getid(){
        return $this->_id;
    }

    //function qui return l'id bateau
    public function getidBateau(){
        return $this->_idBateau;
    }
}
?>