<?php

// Fonction générique pour lire un fichier JSON
function lire_json($chemin_fichier) {
    // Vérifier si le fichier existe
    if (!file_exists($chemin_fichier)) {
        die("Erreur : fichier introuvable -> " . $chemin_fichier);
    }

    // Lire le contenu
    $contenu = file_get_contents($chemin_fichier);

    // Convertir JSON en tableau PHP
    $donnees = json_decode($contenu, true);

    // Vérifier si JSON valide
    if ($donnees === null) {
        die("Erreur : fichier JSON invalide -> " . $chemin_fichier);
    }

    return $donnees;
}


// Charger les salles
function charger_salles($chemin_fichier) {
    return lire_json($chemin_fichier);
}


// Charger les promotions
function charger_promotions($chemin_fichier) {
    return lire_json($chemin_fichier);
}


// Charger les cours
function charger_cours($chemin_fichier) {
    return lire_json($chemin_fichier);
}


// Charger les options
function charger_options($chemin_fichier) {
    return lire_json($chemin_fichier);
}

?>