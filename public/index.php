<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
        }
    </style>
</head>

<body>

    <nav>
        <ul>
            <li><a href="ville.php">Rayon distance</a></li>
        </ul>
    </nav>

    <h1>Bienvenue</h1>

    <div id="map"></div>


    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([48.8584, 2.2945], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        fetch('api/lieux.php')
            .then(response => response.json())
            .then(data => {
                L.geoJSON(data, {
                    onEachFeature: (feature, layer) => {
                        layer.bindPopup(feature.properties.nom);
                    }
                }).addTo(map);
            });
    </script>
</body>

</html>