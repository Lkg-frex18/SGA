<?php

// ==============================
// 1. INCLUSION DES FICHIERS
// ==============================

require_once 'functions/lecture.php';
require_once 'functions/sauvegarde.php';
require_once 'functions/affichage.php';


// ==============================
// 2. CHARGEMENT DES DONNÉES
// ==============================

$salles = charger_salles();
$promotions = charger_promotions();
$cours = charger_cours();
$options = charger_options();


// ==============================
// 3. TEST (VÉRIFICATION DONNÉES)
// ==============================

// Décommente pour tester
/*
echo "<pre>";
var_dump($salles, $promotions, $cours, $options);
echo "</pre>";
*/


// ==============================
// 4. SIMULATION D’UN PLANNING
// (Temporaire — Jfrex remplacera)
// ==============================

$planning = [
    [
        "jour" => "Lundi",
        "heure" => "08h-10h",
        "salle" => $salles[0]['id'] ?? 'AUD1',
        "cours" => $cours[0]['nom'] ?? 'Algorithmique'
    ],
    [
        "jour" => "Mardi",
        "heure" => "10h-12h",
        "salle" => $salles[1]['id'] ?? 'AUD2',
        "cours" => $cours[1]['nom'] ?? 'Base de données'
    ]
];


// ==============================
// 5. SAUVEGARDE DU PLANNING
// ==============================

sauvegarder_planning($planning);


// ==============================
// 6. AFFICHAGE HTML
// ==============================

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Planning SGA</title>

    <!-- Lien CSS -->
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<h1>📅 Planning des cours</h1>

<?php
    afficher_planning_html($planning);
?>

</body>
</html>