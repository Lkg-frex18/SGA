<?php
require_once 'functions/lecture.php';
require_once 'functions/sauvegarde.php';

// ======================
// DONNÉES (TEST)
// ======================
$salles = charger_salles();
$cours = charger_cours();

$planning = [
    [
        "jour" => "Lundi",
        "heure" => "08h-10h",
        "salle" => "AUD1",
        "cours" => "Algorithmique"
    ],
    [
        "jour" => "Mardi",
        "heure" => "10h-12h",
        "salle" => "AUD2",
        "cours" => "Base de données"
    ]
];

sauvegarder_planning($planning);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>SGA - Planning</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #3b2a1a;
        }

        /* HEADER */
        header {
            background-color: #6b3e26;
            color: white;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        header img {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            object-fit: cover;
        }

        header h1 {
            font-size: 20px;
            margin: 0;
        }

        /* CONTENU */
        .container {
            padding: 20px;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        th {
            background-color: #6b3e26;
            color: white;
            padding: 12px;
        }

        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f9f6f3;
        }

        tr:hover {
            background-color: #f1e7df;
        }

        /* FOOTER */
        footer {
            margin-top: 40px;
            background-color: #6b3e26;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<!-- HEADER -->
<header>
    <img src="logo.png" alt="Logo SGA">
    <h1>Système de Gestion des Auditoires et Horaires</h1>
</header>

<!-- CONTENU -->
<div class="container">

    <h2>📅 Planning des cours</h2>

    <table>
        <tr>
            <th>Jour</th>
            <th>Heure</th>
            <th>Salle</th>
            <th>Cours</th>
        </tr>

        <?php foreach ($planning as $p) : ?>
        <tr>
            <td><?= $p['jour'] ?></td>
            <td><?= $p['heure'] ?></td>
            <td><?= $p['salle'] ?></td>
            <td><?= $p['cours'] ?></td>
        </tr>
        <?php endforeach; ?>

    </table>

</div>

<!-- FOOTER -->
<footer>
    © <?= date('Y') ?> - SGA | Tous droits réservés
</footer>

</body>
</html>