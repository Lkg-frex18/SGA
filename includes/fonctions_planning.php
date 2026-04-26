<?php

require_once "fonctions_verification.php";

// Générer les créneaux
function generer_creneaux() {
    $jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];
    $heures = [
        ["08:00", "12:00"],
        ["13:00", "17:00"]
    ];

    $creneaux = [];

    foreach ($jours as $jour) {
        foreach ($heures as $h) {
            $creneaux[] = [
                "jour" => $jour,
                "debut" => $h[0],
                "fin" => $h[1]
            ];
        }
    }

    return $creneaux;
}


// Trouver effectif d’un groupe
function trouver_effectif($cours, $promotions, $options) {

    if ($cours['type'] == "tronc") {
        foreach ($promotions as $promo) {
            if ($promo['id'] == $cours['promotion']) {
                return $promo['effectif'];
            }
        }
    }

    if ($cours['type'] == "option") {
        foreach ($options as $opt) {
            if ($opt['id'] == $cours['option']) {
                return $opt['effectif'];
            }
        }
    }

    return 0;
}


// Trouver groupe (L2 ou OPT1)
function trouver_groupe($cours) {
    if ($cours['type'] == "tronc") {
        return $cours['promotion'];
    } else {
        return $cours['option'];
    }
}


// FONCTION PRINCIPALE
function generer_planning($salles, $promotions, $cours, $options) {

    $planning = [];
    $creneaux = generer_creneaux();

    foreach ($cours as $c) {

        $effectif = trouver_effectif($c, $promotions, $options);
        $groupe = trouver_groupe($c);

        $affecte = false;

        foreach ($creneaux as $creneau) {

            foreach ($salles as $salle) {

                if (
                    capacite_suffisante($salles, $salle['id'], $effectif) &&
                    salle_disponible($planning, $salle['id'], $creneau) &&
                    creneau_libre_groupe($planning, $groupe, $creneau)
                ) {

                    // Affectation
                    $planning[] = [
                        "jour" => $creneau['jour'],
                        "debut" => $creneau['debut'],
                        "fin" => $creneau['fin'],
                        "salle" => $salle['id'],
                        "cours" => $c['id'],
                        "groupe" => $groupe
                    ];

                    $affecte = true;
                    break;
                }
            }

            if ($affecte) break;
        }

        // Si pas affecté
        if (!$affecte) {
            echo "⚠️ Impossible d'affecter le cours : " . $c['id'] . "<br>";
        }
    }

    return $planning;
}

?>