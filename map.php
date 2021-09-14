
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- Nous chargeons les fichiers CDN de Leaflet. Le CSS AVANT le JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />
    <style type="text/css">
        #map {
            /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
            height: 800px;
            width: 1000px;
        }

        .centrer {
            position: absolute;
            /* postulat de départ */
            top: 50%;
            left: 50%;
            /* à 50%/50% du parent référent */
            transform: translate(-50%, -50%);
            /* décalage de 50% de sa propre taille */
        }
    </style>
    <title>Carte</title>
</head>

<body>
    <div class="centrer">
        <h1>OpenStreetMap</h1>
        <div id="map">
            <!-- Ici s'affichera la carte -->
        </div>
    </div>

    <!-- Fichiers Javascript -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <script type='text/javascript'
        src='https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js'></script>
    <script type="text/javascript">
        // On initialise la latitude et la longitude de Paris (centre de la carte)
        var lat = 48.852969;
        var lon = 2.349903;
        var macarte = null;
        var markerClusters; // Servira à stocker les groupes de marqueurs
        // Nous initialisons une liste de marqueurs
        var villes = {
            "Paris": { "lat": 48.852969, "lon": 2.349903 },
            "Brest": { "lat": 48.383, "lon": -4.500 },
            "Quimper": { "lat": 48.000, "lon": -4.100 },
            "Bayonne": { "lat": 43.500, "lon": -1.467 },
            "test": { "lat": 49.8948334597173, "lon": 2.297128222269018 },   
        };
        // Fonction d'initialisation de la carte
        function initMap() {
            // Nous définissons le dossier qui contiendra les marqueurs
            var iconBase = 'Z:/dev/Project-SN2-1/image/';
            // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
            macarte = L.map('map').setView([lat, lon], 11);
            markerClusters = L.markerClusterGroup(); // Nous initialisons les groupes de marqueurs
            // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
            L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                // Il est toujours bien de laisser le lien vers la source des données
                attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                minZoom: 1,
                maxZoom: 20
            }).addTo(macarte);
            // Nous parcourons la liste des villes
            for (ville in villes) {
                // Nous définissons l'icône à utiliser pour le marqueur, sa taille affichée (iconSize), sa position (iconAnchor) et le décalage de son ancrage (popupAnchor)
                var myIcon = L.icon({
                    iconUrl: iconBase + "marker.png",
                    iconSize: [50, 50],
                    iconAnchor: [25, 50],
                    popupAnchor: [-3, -76],
                });
                var marker = L.marker([villes[ville].lat, villes[ville].lon], { icon: myIcon }); // pas de addTo(macarte), l'affichage sera géré par la bibliothèque des clusters
                marker.bindPopup(ville);
                markerClusters.addLayer(marker); // Nous ajoutons le marqueur aux groupes
            }
            macarte.addLayer(markerClusters);
        }
        window.onload = function () {
            // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
            initMap();
        };
    </script>
</body>

</html>