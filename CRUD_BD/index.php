<?php
require "funcions.php";
$usuaris = llegirUsuaris();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Llista Usuaris</title></head>
<body>
<h1>Llista d'usuaris</h1>
<a href="afegir.php">Afegir usuari</a>
<table border="1">
<tr><th>ID</th><th>Nom</th><th>Email</th><th>Edat</th><th>Accions</th></tr>
<?php foreach($usuaris as $u): ?>
<tr>
<td><?= $u['id'] ?></td>
<td><?= htmlspecialchars($u['nom']) ?></td>
<td><?= htmlspecialchars($u['email']) ?></td>
<td><?= $u['edat'] ?></td>
<td>
    <a href="editar.php?id=<?= $u['id'] ?>">Editar</a> |
    <a href="eliminar.php?id=<?= $u['id'] ?>">Eliminar</a>
</td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
