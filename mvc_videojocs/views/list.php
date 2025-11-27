<div class="list-header">
    <h2>Llista de Videojocs</h2>
    <a class="btn primary" href="index.php?action=create">+ Afegir videojoc</a>
</div>

<?php if (empty($videojocs)): ?>
    <p>No hi ha videojocs registrats.</p>
<?php else: ?>
    <div class="table-wrap">
    <table class="styled-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Plataforma</th>
            <th>Any</th>
            <th>Preu</th>
            <th>Accions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($videojocs as $v): ?>
        <tr>
            <td><?= htmlspecialchars($v['id']) ?></td>
            <td><?= htmlspecialchars($v['nom']) ?></td>
            <td><?= htmlspecialchars($v['plataforma']) ?></td>
            <td><?= htmlspecialchars($v['any']) ?></td>
            <td><?= htmlspecialchars($v['preu']) ?></td>
            <td class="actions">
                <a class="btn" href="index.php?action=edit&id=<?= $v['id'] ?>">Editar</a>
                <a class="btn danger" href="index.php?action=delete&id=<?= $v['id'] ?>" 
                onclick="return confirm('Segur?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>
<?php endif; ?>

<style>
    .list-header{ display:flex; justify-content:space-between; align-items:center; margin-bottom:12px; }
    .list-header h2{ margin:0; }
    .btn{ display:inline-block; padding:8px 12px; border-radius:6px; text-decoration:none; color:#fff; background:#6c757d; margin-left:6px; }
    .btn.primary{ background:#007bff; }
    .btn.danger{ background:#dc3545; }
    .table-wrap{ overflow:auto; background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.06); }
    table.styled-table{ width:100%; border-collapse:collapse; min-width:600px; }
    table.styled-table thead tr{ background:#f1f1f1; }
    table.styled-table th, table.styled-table td{ padding:10px 12px; text-align:left; border-bottom:1px solid #eee; }
    table.styled-table tbody tr:hover{ background:#fafafa; }
    td.actions{ white-space:nowrap; }
    @media (max-width:600px){
        .list-header{ flex-direction:column; align-items:flex-start; gap:8px; }
        .btn{ padding:6px 10px; }
        table.styled-table{ min-width:0; font-size:14px; }
    }
</style>