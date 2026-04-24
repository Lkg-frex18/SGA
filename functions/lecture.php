<?php

// Fonction générique pour lire un fichier JSON
function lire_json($fichier) {
    // Vérifie si le fichier existe
    if (!file_exists($fichier)) {
        return [];
    }

    // Lire le contenu du fichier
    $contenu = file_get_contents($fichier);

    // Transformer JSON → tableau PHP
    return json_decode($contenu, true);
}


// Fonctions spécifiques

function charger_salles() {
    return lire_json(__DIR__ . '/../data/salles.json');
}

function charger_promotions() {
    return lire_json(__DIR__ . '/../data/promotions.json');
}

function charger_cours() {
    return lire_json(__DIR__ . '/../data/cours.json');
}

function charger_options() {
    return lire_json(__DIR__ . '/../data/options.json');
}