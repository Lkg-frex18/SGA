<?php

function afficher_planning_html($planning) {

    $jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];
    $heures = ["08:00", "13:00"];

    echo "<table border='1' cellpadding='10'>";
    
    // En-tête
    echo "<tr><th>Heure/Jour</th>";
    foreach ($jours as $jour) {
        echo "<th>$jour</th>";
    }
    echo "</tr>";

    foreach ($heures as $heure) {

        echo "<tr>";
        echo "<td>$heure</td>";

        foreach ($jours as $jour) {

            echo "<td>";

            foreach ($planning as $p) {
                if ($p['jour'] == $jour && $p['debut'] == $heure) {

                    echo "<b>Salle:</b> " . $p['salle'] . "<br>";
                    echo "<b>Cours:</b> " . $p['cours'] . "<br>";
                    echo "<b>Groupe:</b> " . $p['groupe'] . "<br>";
                }
            }

            echo "</td>";
        }

        echo "</tr>";
    }

    echo "</table>";
}

?>