<?php if (!empty($errors)): ?>
    <div class="errors">
        <ul>
            <?php foreach($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="index.php?action=update" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($videojoc['id']) ?>">

    Nom: <input name="nom" value="<?= htmlspecialchars($videojoc['nom'] ?? '') ?>" required><br>
    Plataforma: <input name="plataforma" value="<?= htmlspecialchars($videojoc['plataforma'] ?? '') ?>"><br>
    Any: <input name="any" type="number" value="<?= htmlspecialchars($videojoc['any'] ?? '') ?>"><br>
    Preu: <input name="preu" type="number" step="0.01" value="<?= htmlspecialchars($videojoc['preu'] ?? '') ?>"><br>
    <button type="submit">Actualizar</button>
</form>