<?php if (!empty($errors)): ?>
    <div class="errors">
        <ul>
            <?php foreach($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="index.php?action=store" method="POST">
    Nom: <input name="nom" required value="<?= htmlspecialchars($old['nom'] ?? '') ?>"><br>
    Plataforma: <input name="plataforma" value="<?= htmlspecialchars($old['plataforma'] ?? '') ?>"><br>
    Any: <input name="any" type="number" value="<?= htmlspecialchars($old['any'] ?? '') ?>"><br>
    Preu: <input name="preu" type="number" step="0.01" value="<?= htmlspecialchars($old['preu'] ?? '') ?>"><br>
    <button type="submit">Guardar</button>
</form>