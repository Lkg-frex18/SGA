<?php

function sauvegarder_planning($planning) {
    $fichier = __DIR__ . '/../data/planning.json';

    // Transformer tableau → JSON lisible
    $json = json_encode($planning, JSON_PRETTY_PRINT);

    // Écrire dans le fichier
    file_put_contents($fichier, $json);
}