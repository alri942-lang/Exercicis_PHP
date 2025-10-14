<?php
require __DIR__ . '/funcions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    eliminarUsuari($id); 
    header("Location: index.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $usuari = obtenirUsuariPerId($id);
    if (!$usuari) {
        exit("Usuari no trobat!");
    }
} else {
    exit("ID d'usuari no proporcionat!");
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuari</title>
</head>
<body>
<h1>Eliminar Usuari</h1>
<p>Segur que vols eliminar l'usuari <strong><?= htmlspecialchars($usuari['nom']) ?></strong>?</p>
<form method="post" action="eliminar.php">
    <input type="hidden" name="id" value="<?= $usuari['id'] ?>">
    <button type="submit">Sí, eliminar</button>
</form>
<br>
<a href="index.php">← Cancel·lar i tornar</a>
</body>
</html>