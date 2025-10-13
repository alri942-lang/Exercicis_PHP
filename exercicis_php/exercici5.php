<?php

// Funcions

function esMajorEdat($edat) {
    return $edat >= 18;
}

function mitjana($notes) {
    $suma = 0;
    $count = count($notes);
    foreach ($notes as $n) {
        $suma += $n;
    }
    return $count > 0 ? $suma / $count : 0;
}

$errors = [];
$resultats = "";

// 1
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = trim($_POST["nom"]);
    $edat = (int)$_POST["edat"];
    $numero = (int)$_POST["numero"];

    // 3
    if (empty($nom)) {
        $errors[] = "El nombre no puede estar vacío.";
    }
    if ($edat <= 0) {
        $errors[] = "La edad debe ser un número positivo.";
    }
    if ($numero < 1 || $numero > 10) {
        $errors[] = "El número para la tabla debe estar entre 1 y 10.";
    }

    // 2
    if (empty($errors)) {
        // 2.1
        $resultats .= "<p>Hola <strong>$nom</strong>, tienes <strong>$edat</strong> años.</p>";

        // 2.2
        if (esMajorEdat($edat)) {
            $resultats .= "<p>Eres mayor de edad.</p>";
        } else {
            $resultats .= "<p>Eres menor de edad.</p>";
        }

        // 2.3
        $resultats .= "<h3>Tabla del $numero:</h3><ul>";
        for ($i = 1; $i <= 10; $i++) {
            $resultats .= "<li>$numero × $i = " . ($numero * $i) . "</li>";
        }
        $resultats .= "</ul>";

        // 2.4
        $resultats .= "<h3>Cuenta atrás:</h3><ul>";
        $c = $numero;
        while ($c >= 1) {
            $resultats .= "<li>$c</li>";
            $c--;
        }
        $resultats .= "</ul>";

        // 2.5
        $notes = [6, 7.5, 8];
        $resultats .= "<p>Las notas son: ";
        foreach ($notes as $n) {
            $resultats .= $n . " ";
        }
        $resultats .= "</p>";

        // 2.6
        $resultats .= "<p>La media de las notas es: " . number_format(mitjana($notes), 2) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Miniaplicación PHP</title>
    <style>
        .error { color: red; }
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 20px; }
        input[type="text"], input[type="number"] { padding: 5px; margin: 5px 0; }
        input[type="submit"] { padding: 5px 10px; }
    </style>
</head>
<body>
    <h1>Miniaplicación PHP sencilla</h1>

    <!-- 1- FormulariO -->
    <form method="post" action="">
        <label>Nombre: <input type="text" name="nom" value="<?php echo isset($nom) ? $nom : ''; ?>"></label><br>
        <label>Edad: <input type="number" name="edat" value="<?php echo isset($edat) ? $edat : ''; ?>"></label><br>
        <label>Número para tabla (1-10): <input type="number" name="numero" value="<?php echo isset($numero) ? $numero : ''; ?>"></label><br>
        <input type="submit" value="Enviar">
    </form>

    <!-- errores -->
    <?php
    if (!empty($errors)) {
        echo "<div class='error'><ul>";
        foreach ($errors as $e) {
            echo "<li>$e</li>";
        }
        echo "</ul></div>";
    }
    ?>

    <!-- resultados -->
    <?php
    if (!empty($resultats)) {
        echo $resultats;
    }
    ?>
</body>
</html>