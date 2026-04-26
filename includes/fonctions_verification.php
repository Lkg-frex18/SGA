<?php

// Vérifie si une salle est libre sur un créneau
function salle_disponible($planning, $id_salle, $creneau) {
    foreach ($planning as $affectation) {

        if (
            $affectation['salle'] == $id_salle &&
            $affectation['jour'] == $creneau['jour'] &&
            $affectation['debut'] == $creneau['debut']
        ) {
            return false; // salle déjà occupée
        }
    }
    return true;
}


// Vérifie si la capacité de la salle est suffisante
function capacite_suffisante($salles, $id_salle, $effectif) {
    foreach ($salles as $salle) {

        if ($salle['id'] == $id_salle) {
            return $effectif <= $salle['capacite'];
        }
    }

    return false; // salle non trouvée
}


// Vérifie si un groupe est libre sur un créneau
function creneau_libre_groupe($planning, $id_groupe, $creneau) {
    foreach ($planning as $affectation) {

        if (
            $affectation['groupe'] == $id_groupe &&
            $affectation['jour'] == $creneau['jour'] &&
            $affectation['debut'] == $creneau['debut']
        ) {
            return false; // groupe déjà occupé
        }
    }
    return true;
}

?>