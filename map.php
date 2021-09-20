<?php
    require_once("session.php");
    require_once("class/user.php");
    
    $User = new user($BDD);
    $User->getuser($_SESSION['id']);

    if (!isset($_SESSION['id'])){
        header("Location: connexion.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- Nous chargeons les fichiers CDN de Leaflet. Le CSS AVANT le JS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />


        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">
        <!-- Bootstrap core CSS -->
        <link href="css/assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/headers.css" rel="stylesheet">
        <style type="text/css">
            #map{
                /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
                height: 600px;
                width: 1000px;
            }

            .centrer{
                position: absolute;
                /* postulat de départ */
                top: 55%;
                left: 50%;
                /* à 50%/50% du parent référent */
                transform: translate(-50%, -50%);
                /* décalage de 50% de sa propre taille */
            }

            .bd-placeholder-img{
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px){
                .bd-placeholder-img-lg{
                    font-size: 3.5rem;
                }
            }
        </style>
        <title>Carte</title>
        <link rel="icon" href="image/logo_providence.png" />
    </head>
    <body>
        <main>
            <div class="container">
                <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none"></a>
                    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="accueil.php" class="nav-link px-2 link-secondary">Home</a></li>
                        <li><a href="map.php" class="nav-link px-2 link-dark">Map</a></li>
                        <?php
                            if ($User->getadmin() == 1){
                                ?>
                                    <li><a href="admin.php" class="nav-link px-2 link-secondary">Administrateur</a></li>
                                <?php
                            }
                        ?>
                    </ul>
                    <div class="col-md-3 text-end">
                        <form method="POST" action="">
                            <input type="submit" class="btn btn-primary" name="deconnexion" value="deconnexion">
                        </form>
                    </div>
                </header>
            </div>
        </main>
        <div class="centrer">
            <div id="map">
                <!-- Ici s'affichera la carte -->
            </div>

            <!-- Fichiers Javascript -->
            <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
            <script type='text/javascript' src='https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js'></script>
            <script type="text/javascript">
                // On initialise la latitude et la longitude de Paris (centre de la carte)
                var lat = 49.894067;
                var lon = 2.295753;
                var macarte = null;
                var markerClusters; // Servira à stocker les groupes de marqueurs
                // Nous initialisons une liste de marqueurs
                var villes ={
                    <?php
                        $request = $BDD->query("SELECT gps.id_bateau, gps.latitude, gps.longitude, bateau.id , bateau.nom FROM bateau, gps WHERE gps.id_bateau = bateau.id");
                        while ($tab = $request->fetch()){
                    ?>
                        "<?= $tab['nom'] ?>":{
                            "lat": <?= $tab['latitude'] ?>,
                            "lon": <?= $tab['longitude'] ?>,
                        },
                    <?php } ?>
                };
                // Fonction d'initialisation de la carte
                function initMap(){
                    // Nous définissons le dossier qui contiendra les marqueurs
                    var iconBase = 'image/';
                    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
                    macarte = L.map('map').setView([lat, lon], 7);
                    markerClusters = L.markerClusterGroup(); // Nous initialisons les groupes de marqueurs
                    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
                    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png',{
                        // Il est toujours bien de laisser le lien vers la source des données
                        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                        minZoom: 1,
                        maxZoom: 20
                    }).addTo(macarte);
                    // Nous parcourons la liste des villes
                    for (ville in villes){
                        // Nous définissons l'icône à utiliser pour le marqueur, sa taille affichée (iconSize), sa position (iconAnchor) et le décalage de son ancrage (popupAnchor)
                        var myIcon = L.icon({
                            iconUrl: iconBase + "marker.png",
                            iconSize: [50, 50],
                            iconAnchor: [25, 50],
                            popupAnchor: [-3, -76],
                        });
                        var marker = L.marker([villes[ville].lat, villes[ville].lon],{
                            icon: myIcon
                        }); // pas de addTo(macarte), l'affichage sera géré par la bibliothèque des clusters
                        marker.bindPopup(ville);
                        markerClusters.addLayer(marker); // Nous ajoutons le marqueur aux groupes
                    }
                    macarte.addLayer(markerClusters);
                }
                window.onload = function(){
                    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
                    initMap();
                };
            </script>
        </div>
    </body>
</html>