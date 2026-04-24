<?php if (!empty($planning)) : ?>

<table>
    <thead>
        <tr>
            <th>Jour</th>
            <th>Heure</th>
            <th>Salle</th>
            <th>Cours</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($planning as $ligne) : ?>
            <tr>
                <td><?= $ligne['jour'] ?></td>
                <td><?= $ligne['heure'] ?></td>
                <td><?= $ligne['salle'] ?></td>
                <td><?= $ligne['cours'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else : ?>

<p>Aucun planning disponible.</p>

<?php endif; ?>