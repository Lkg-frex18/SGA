<?php
// On organise les données par jour pour un affichage plus simple
$planning_par_jour = [];
foreach ($planning_final as $item) {
    $planning_par_jour[$item['jour']][] = $item;
}
?>

<h2 style="color: var(--marron-sombre); border-bottom: 2px solid var(--marron-clair); padding-bottom: 10px;">
    Emploi du Temps Hebdomadaire
</h2>

<table>
    <thead>
        <tr>
            <th>Jour</th>
            <th>Créneau Horaire</th>
            <th>Cours & Groupe</th>
            <th>Salle Affectée</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($planning_final)): ?>
            <tr>
                <td colspan="4" style="text-align:center;">Le planning est vide.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($jours as $j): ?>
                <?php if (isset($planning_par_jour[$j])): ?>
                    <?php foreach ($planning_par_jour[$j] as $index => $cours_prevu): ?>
                    <tr>
                        <?php if ($index === 0): ?>
                            <td rowspan="<?php echo count($planning_par_jour[$j]); ?>" style="font-weight: bold; background-color: var(--blanc-casse);">
                                <?php echo $j; ?>
                            </td>
                        <?php endif; ?>
                        
                        <td><?php echo $cours_prevu['heure']; ?></td>
                        <td>
                            <span style="display:block; font-weight:600; color:var(--marron-sombre);">
                                <?php echo $cours_prevu['cours']; ?>
                            </span>
                        </td>
                        <td>
                            <span style="background-color: var(--marron-clair); padding: 2px 8px; border-radius: 12px; font-size: 0.85rem;">
                                <?php echo $cours_prevu['salle']; ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td style="font-weight: bold; background-color: var(--blanc-casse);"><?php echo $j; ?></td>
                        <td colspan="3" style="color: #999; font-style: italic;">Aucun cours prévu</td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<div style="margin-top: 20px; font-size: 0.8rem; color: #666;">
    * Ce planning respecte les contraintes de capacité des auditoires et évite les collisions de groupes. [cite: 30, 49]
</div>