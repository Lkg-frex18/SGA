<style>
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
</style>

<h2>📌 Planning des cours</h2>

<?php if (!empty($planning)) : ?>

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

<?php else : ?>
    <p>Aucun planning disponible.</p>
<?php endif; ?>