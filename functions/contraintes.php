<?php

/**
 * Q6. Vérifie si une salle est libre pour un créneau donné
 * On parcourt le planning actuel pour voir si l'ID de la salle s'y trouve déjà au même moment.
 */
function salle_disponible($planning, $id_salle, $creneau) {
    foreach ($planning as $affectation) {
        if ($affectation['id_salle'] === $id_salle && 
            $affectation['jour'] === $creneau['jour'] && 
            $affectation['debut'] === $creneau['debut']) {
            return false; // La salle est déjà occupée [cite: 49]
        }
    }
    return true; // La salle est libre
}

/**
 * Q6. Vérifie si la salle peut contenir tout le groupe
 * Règle : Effectif groupe <= Capacité salle [cite: 30]
 */
function capacite_suffisante($salles, $id_salle, $effectif) {
    foreach ($salles as $salle) {
        if ($salle['id'] === $id_salle) {
            // Contrainte fondamentale : effectif doit être <= capacité [cite: 30, 91]
            return ($effectif <= $salle['capacite']);
        }
    }
    return false; // Salle non trouvée
}

/**
 * Q6. Vérifie si un groupe (promotion ou option) n'a pas déjà un cours à ce moment
 * Empêche qu'une promotion soit à deux endroits en même temps[cite: 123].
 */
function creneau_libre_groupe($planning, $id_groupe, $creneau) {
    foreach ($planning as $affectation) {
        if ($affectation['id_groupe'] === $id_groupe && 
            $affectation['jour'] === $creneau['jour'] && 
            $affectation['debut'] === $creneau['debut']) {
            return false; // Le groupe a déjà un cours prévu
        }
    }
    return true; // Le groupe est libre
}