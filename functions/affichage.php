<?php

function afficher_planning_html($planning) {

    echo "<table border='1'>";
    
    echo "<tr>
            <th>Jour</th>
            <th>Heure</th>
            <th>Salle</th>
            <th>Cours</th>
          </tr>";

    foreach ($planning as $ligne) {

        echo "<tr>";

        echo "<td>" . $ligne['jour'] . "</td>";
        echo "<td>" . $ligne['heure'] . "</td>";
        echo "<td>" . $ligne['salle'] . "</td>";
        echo "<td>" . $ligne['cours'] . "</td>";

        echo "</tr>";
    }

    echo "</table>";
}