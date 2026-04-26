<?php

function sauvegarder_planning($planning, $chemin_fichier) {

    // Convertir en JSON lisible
    $json = json_encode($planning, JSON_PRETTY_PRINT);

    // Écriture fichier
    if (file_put_contents($chemin_fichier, $json)) {
        echo "✅ Planning sauvegardé avec succès<br>";
    } else {
        echo "❌ Erreur lors de la sauvegarde<br>";
    }
}


// Charger planning depuis fichier
function charger_planning($chemin_fichier) {

    if (!file_exists($chemin_fichier)) {
        die("❌ Fichier planning introuvable");
    }

    $contenu = file_get_contents($chemin_fichier);
    $planning = json_decode($contenu, true);

    return $planning;
}

?>