<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGA - Gestion des Auditoires</title>
    <style>
        :root {
            --marron-sombre: #5D4037;
            --marron-moyen: #795548;
            --marron-clair: #D7CCC8;
            --creme: #F5F5DC;
            --blanc-casse: #FAF9F6;
            --texte: #3E2723;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--creme);
            color: var(--texte);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        header {
            background-color: var(--marron-sombre);
            color: white;
            padding: 1.5rem 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        header h1 {
            margin: 0;
            font-size: 1.8rem;
            letter-spacing: 1px;
        }

        nav {
            background-color: var(--marron-moyen);
            display: flex;
            justify-content: center;
            padding: 0.5rem;
        }

        nav a {
            color: var(--blanc-casse);
            text-decoration: none;
            padding: 0.5rem 1.5rem;
            margin: 0 0.5rem;
            border-radius: 4px;
            transition: background 0.3s;
            font-weight: 500;
        }

        nav a:hover {
            background-color: var(--marron-sombre);
        }

        .container {
            max-width: 1100px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            min-height: 60vh;
        }

        /* Design pour le tableau de planning */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
            background-color: white;
        }

        th {
            background-color: var(--marron-moyen);
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: 600;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid var(--marron-clair);
        }

        tr:nth-child(even) {
            background-color: #fcfaf9;
        }

        tr:hover {
            background-color: var(--marron-clair);
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 4px;
            border-left: 5px solid;
        }

        .alert-success {
            background-color: #E8F5E9;
            color: #2E7D32;
            border-color: #4CAF50;
        }

        .alert-error {
            background-color: #FFEBEE;
            color: #C62828;
            border-color: #F44336;
        }
    </style>
</head>
<body>

<header>
    <h1>Système de Gestion des Auditoires (SGA)</h1>
    <p>Faculté des Sciences Informatiques - UPC</p>
</header>

<nav>
    <a href="index.php">Accueil</a>
    <a href="index.php?action=generer">Générer Planning</a>
    <a href="index.php?action=voir">Voir Planning</a>
</nav>

<div class="container">