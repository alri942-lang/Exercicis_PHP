<?php
require "funcions.php";
$missatge = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $edat = (int)($_POST['edat'] ?? 0);

    afegirUsuari($nom, $email, $edat);
    $missatge = $edat > 17 ? "Usuari major d'edat" : "Usuari menor d'edat";
}
?>
<!DOCTYPE html>
<html lang="ca">
<head><meta charset="UTF-8"><title>Afegir usuari</title></head>
<body>
<h1>Afegir usuari</h1>
<?php if ($missatge) echo "<p>$missatge</p>"; ?>
<form method="post">
Nom: <input name="nom" required><br>
Email: <input type="email" name="email" required><br>
Edat: <input type="number" name="edat" required><br>
<button>Afegir</button>
</form>
<a href="index.php">← Tornar a la llista</a>
</body>
</html>