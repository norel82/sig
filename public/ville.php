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
            margin-top: 10px;
        }

        #search-container {
            margin: 10px;
        }
    </style>
</head>

<body>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
        </ul>
    </nav>

    <div id="search-container">
        <input type="text" id="ville" placeholder="Entrez une ville (ex: Paris)" />
        <button onclick="rechercherVille()">Rechercher</button>
    </div>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        const carte = L.map('map').setView([46.5, 2], 6); // Vue de la France

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(carte);

        let cercle;

        function rechercherVille() {
            const ville = document.getElementById('ville').value;

            if (!ville) {
                alert('Veuillez saisir une ville.');
                return;
            }

            const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(ville)}`;

            fetch(url)
                .then(res => res.json())
                .then(data => {
                    if (data.length === 0) {
                        alert("Ville non trouvée !");
                        return;
                    }

                    const {
                        lat,
                        lon
                    } = data[0];

                    const latitude = parseFloat(lat);
                    const longitude = parseFloat(lon);

                    carte.setView([latitude, longitude], 10);

                    if (cercle) {
                        carte.removeLayer(cercle);
                    }

                    cercle = L.circle([latitude, longitude], {
                        color: 'green',
                        fillColor: '#7FFF00',
                        fillOpacity: 0.3,
                        radius: 50000 // 50 km
                    }).addTo(carte);
                })
                .catch(err => {
                    console.error(err);
                    alert("Erreur lors de la recherche.");
                });
        }
    </script>
</body>

</html>