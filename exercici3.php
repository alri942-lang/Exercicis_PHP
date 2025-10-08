<?php
// 1
$noms = ["Anna", "Pau", "Júlia"];

// 2
$notes = [
    "Anna"  => ["nota1" => 8, "nota2" => 9],
    "Joan"  => ["nota1" => 6, "nota2" => 7],
    "Pau"   => ["nota1" => 4, "nota2" => 5],
    "Clara" => ["nota1" => 9, "nota2" => 10],
    "Júlia" => ["nota1" => 7, "nota2" => 8]
];

// 3

?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Notes dels alumnes</title>
    <style>
        table { border-collapse: collapse; width: 60%; }
        th, td { border: 1px solid #333; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Resultats dels alumnes que han demanat revisió</h1>
    <table>
        <tr>
            <th>Nom</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Mitjana</th>
            <th>Resultat</th>
        </tr>
        <?php
        foreach ($noms as $alumne) {

            if (isset($notes[$alumne])) {
                $nota1 = $notes[$alumne]["nota1"];
                $nota2 = $notes[$alumne]["nota2"];
                $mitjana = ($nota1 + $nota2) / 2;

                if ($mitjana < 5) {
                    $resultat = "Suspès";
                } elseif ($mitjana >= 5 && $mitjana < 7) {
                    $resultat = "Aprovat";
                } elseif ($mitjana >= 7 && $mitjana < 9) {
                    $resultat = "Notable";
                } else {
                    $resultat = "Excel·lent";
                }

                echo "<tr>
                        <td>$alumne</td>
                        <td>$nota1</td>
                        <td>$nota2</td>
                        <td>$mitjana</td>
                        <td>$resultat</td>
                      </tr>";
            } else {
                echo "<tr>
                        <td colspan='5'>No hi ha notes per a $alumne</td>
                      </tr>";
            }
        }
        ?>
    </table>
</body>
</html>