<?php
// On inclut les contraintes pour pouvoir les utiliser
require_once 'contraintes.php';

/**
 * Q7. Fonction principale de génération du planning
 * Stratégie : Pour chaque cours, on cherche la première combinaison 
 * (Salle + Créneau) qui respecte toutes les règles métier.
 */
function generer_planning($salles, $promotions, $cours, $options, $creneaux_disponibles) {
    $planning = [];

    foreach ($cours as $un_cours) {
        $affecte = false;
        
        // 1. Déterminer l'effectif du groupe pour ce cours
        $id_groupe = $un_cours['rattachement'];
        $effectif_cours = 0;

        // On cherche d'abord dans les promotions (L1, L2...)
        foreach ($promotions as $promo) {
            if ($promo['id'] === $id_groupe) {
                $effectif_cours = $promo['effectif'];
                break;
            }
        }

        // Si non trouvé, on cherche dans les options (L3, L4...) 
        if ($effectif_cours === 0) {
            foreach ($options as $opt) {
                if ($opt['id'] === $id_groupe) {
                    $effectif_cours = $opt['effectif'];
                    break;
                }
            }
        }

        // 2. Parcourir les créneaux et les salles pour placer le cours
        foreach ($creneaux_disponibles as $creneau) {
            if ($affecte) break;

            foreach ($salles as $salle) {
                // Vérification des 3 contraintes majeures [cite: 30, 49, 67]
                if (capacite_suffisante($salles, $salle['id'], $effectif_cours) &&
                    salle_disponible($planning, $salle['id'], $creneau) &&
                    creneau_libre_groupe($planning, $id_groupe, $creneau)) {
                    
                    // Si tout est OK, on ajoute à l'emploi du temps [cite: 105]
                    $planning[] = [
                        "jour" => $creneau['jour'],
                        "debut" => $creneau['debut'],
                        "fin" => $creneau['fin'],
                        "id_salle" => $salle['id'],
                        "id_cours" => $un_cours['id'],
                        "id_groupe" => $id_groupe
                    ];
                    
                    $affecte = true;
                    break; 
                }
            }
        }
        
        // Optionnel : Gérer ici le cas où $affecte est toujours false (pas de salle/créneau trouvé)
    }

    return $planning;
}