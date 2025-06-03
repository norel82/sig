<?php
$pdo = require __DIR__ . '/../../config/db.php';

$query = $pdo->query("SELECT id, nom, ST_AsGeoJSON(geom) as geojson FROM lieux");
$features = [];

foreach ($query as $row) {
    $features[] = [
        'type' => 'Feature',
        'geometry' => json_decode($row['geojson']),
        'properties' => [
            'id' => $row['id'],
            'nom' => $row['nom']
        ]
    ];
}

header('Content-Type: application/json');
echo json_encode([
    'type' => 'FeatureCollection',
    'features' => $features
]);
