<?php
require __DIR__ . '/funcions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id']; 
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $edat = (int)($_POST['edat'] ?? 0);

    $nous_dades = [
        'nom' => $nom,
        'email' => $email,
        'edat' => $edat
    ];
    
    editarUsuari($id, $nous_dades);

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
    <title>Editar Usuari</title>
</head>
<body>
<h1>Editar Usuari</h1>
<form method="post" action="editar.php">
    <input type="hidden" name="id" value="<?= $usuari['id'] ?>">
    Nom: <input type="text" name="nom" value="<?= htmlspecialchars($usuari['nom']) ?>" required><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($usuari['email']) ?>" required><br>
    Edat: <input type="number" name="edat" value="<?= $usuari['edat'] ?>" required><br>
    <button type="submit">Guardar canvis</button>
</form>
<br>
<a href="index.php">← Tornar a la llista</a>
</body>
</html>