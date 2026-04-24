// config.php
$jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];
$heures = [
    ["debut" => "08:00", "fin" => "12:00"],
    ["debut" => "13:00", "fin" => "17:00"] // Pause d'une heure entre 12h et 13h
];

$creneaux_disponibles = [];

foreach ($jours as $j) {
    foreach ($heures as $h) {
        $creneaux_disponibles[] = [
            "jour" => $j,
            "debut" => $h['debut'],
            "fin" => $h['fin']
        ];
    }
}