# Projet SIG PHP - Affichage de données géospatiales avec PostGIS et Leaflet

Ce projet est une démonstration d'une application PHP simple qui permet de stocker des points géographiques dans une base PostgreSQL/PostGIS.


## 🧰 Technologies utilisées

- PHP 8.x
- PostgreSQL 15+
- PostGIS
- Serveur PHP interne (`php -S`)
- Composer (si besoin)


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