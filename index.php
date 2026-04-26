<?php

require_once "includes/fonctions_chargement.php";
require_once "includes/fonctions_verification.php";
require_once "includes/fonctions_planning.php";
require_once "includes/fonctions_sauvegarde.php";
require_once "includes/fonctions_affichage.php";

// Chargement des données
$salles = charger_salles("data/salles.json");
$promotions = charger_promotions("data/promotions.json");
$cours = charger_cours("data/cours.json");
$options = charger_options("data/options.json");

echo "📂 Données chargées<br>";

// Génération planning
$planning = generer_planning($salles, $promotions, $cours, $options);

echo "📅 Planning généré<br>";

// Sauvegarde
sauvegarder_planning($planning, "data/planning.json");

// Rechargement
$planning_charge = charger_planning("data/planning.json");

// Affichage
echo "<h2>Planning Hebdomadaire</h2>";
afficher_planning_html($planning_charge);

?>