<?php

// 1
$nom = "Anna";
$edat = 20;
$correu = "anna@example.com";
$telefon = "";      
$nota = 7;
$registre = null;

$resultats = [];

// 2
if (isset($nom)) {
    $resultats[] = "La variable \$nom està definida.";
} else {
    $resultats[] = "La variable \$nom no està definida.";
}

if (empty($telefon)) {
    $resultats[] = "La variable \$telefon està buida.";
} else {
    $resultats[] = "La variable \$telefon no està buida.";
}

if (is_null($registre)) {
    $resultats[] = "La variable \$registre és null.";
} else {
    $resultats[] = "La variable \$registre no és null.";
}

// 3.1
if ($edat >= 18) {
    $resultats[] = "L'usuari és major d'edat.";
} else {
    $resultats[] = "L'usuari és menor d'edat.";
}

// 3.2
if ($nota < 5) {
    $resultats[] = "Suspès";
} elseif ($nota >= 5 && $nota < 7) {
    $resultats[] = "Aprovat";
} elseif ($nota >= 7 && $nota < 9) {
    $resultats[] = "Notable";
} else {
    $resultats[] = "Excel·lent";
}

// 4
if (empty($telefon) && filter_var($correu, FILTER_VALIDATE_EMAIL)) {
    $resultats[] = "Avís: el telèfon està buit però el correu és vàlid.";
}

if (is_null($registre) || !$registre) {
    $resultats[] = "Atenció: el registre és null o fals.";
}

// BONUS
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Comprovacions PHP</title>
</head>
<body>
    <h1>Resultats de les comprovacions</h1>
    <ul>
        <?php foreach($resultats as $r): ?>
            <li><?php echo $r; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>