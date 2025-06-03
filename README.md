# Projet SIG PHP - Affichage de données géospatiales avec PostGIS et Leaflet

Ce projet est une démonstration d'une application PHP simple qui permet de stocker des points géographiques dans une base PostgreSQL/PostGIS.


## 🧰 Technologies utilisées

- PHP 8.x
- PostgreSQL 15+
- PostGIS
- Serveur PHP interne (`php -S`)
- Composer (si besoin)

---

# Configuration de la base de données
Créer une base PostgreSQL avec PostGIS activé :
```sql
CREATE DATABASE sig_tuto;
\c sig_tuto
CREATE EXTENSION postgis;
\q
```

# Injection des données via script sql
```sql
$ psql -U postgres -d sig_tuto -f data/lieux.sql
```

# Connection via terminal
```sql
psql -U postgres -d nom_de_ta_base
```
exemple
```sql
psql -U postgres -d sig_tuto
```

# ✅ Quelques commandes utiles à l’intérieur de psql
Une fois connecté, tu peux taper :

| Commande `psql`        | Action                                 |
|------------------------|----------------------------------------|
| `\dt`                  | Lister toutes les tables               |
| `\d lieux`             | Voir la structure de la table `lieux` |
| `SELECT * FROM lieux;` | Voir toutes les lignes de la table     |
| `\q`                   | Quitter `psql`                         |


---


## 🗺️ Affichage des lieux sur une carte (Leaflet + API PHP)

Une carte interactive est disponible grâce à [Leaflet](https://leafletjs.com/), alimentée par une API PHP qui retourne les lieux géographiques au format **GeoJSON**.

### API : `/api/lieux.php`

Cette route génère une `FeatureCollection` GeoJSON en interrogeant la table `lieux` via PDO/PostGIS.

**Exemple de réponse JSON :**
```json
{
  "type": "FeatureCollection",
  "features": [
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [2.2945, 48.8584]
      },
      "properties": {
        "id": 1,
        "nom": "Tour Eiffel"
      }
    }
  ]
}
```

---

### 🧭 Fonctionnalité : Recherche de ville + Cercle de distance

Ce projet propose une page de démonstration simple utilisant **Leaflet** et l’API **Nominatim d’OpenStreetMap**.

#### 📄 `ville.php` – Rechercher une ville et afficher un cercle de 50 km

| Élément               | Description                                                                 |
|-----------------------|-----------------------------------------------------------------------------|
| 🧭 Saisie utilisateur  | L'utilisateur entre une ville (ex: *Paris*)                                 |
| 🌍 Géocodage           | La ville est géolocalisée via [Nominatim](https://nominatim.openstreetmap.org/) |
| 🔵 Affichage carte     | La carte se centre sur la ville                                              |
| 🟢 Cercle 50 km        | Un cercle vert de 50 km de rayon est affiché autour du centre de la ville   |


