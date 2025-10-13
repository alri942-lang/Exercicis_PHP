<?php

// 1

$productes = [
    "Llibre" => 12.5,
    "Motxilla" => 35,
    "Bolígraf" => 1.2,
    "Carpeta" => 4.8
];

// 2

$quantitats = [
    "Llibre" => 2,
    "Motxilla" => 1,
    "Bolígraf" => 5,
    "Carpeta" => 3
];

// 3
function calcularDetallCompra($productes, $quantitats) {
    $detall = [];
    foreach ($productes as $producte => $preu) {
        $quantitat = isset($quantitats[$producte]) ? $quantitats[$producte] : 0;
        $subtotal = $preu * $quantitat;
        $detall[$producte] = [
            "preu" => $preu,
            "quantitat" => $quantitat,
            "subtotal" => $subtotal
        ];
    }
    return $detall;
}

// 4
function calcularTotal($detallCompra) {
    $total = 0;
    foreach ($detallCompra as $info) {
        $total += $info["subtotal"];
    }
    return $total;
}

// 4
$detallCompra = calcularDetallCompra($productes, $quantitats);
$totalCompra = calcularTotal($detallCompra);
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Compra Botiga Online</title>
    <style>
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid #333; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Detall de la compra</h1>
    <table>
        <tr>
            <th>Producte</th>
            <th>Preu unitari</th>
            <th>Quantitat</th>
            <th>Subtotal</th>
        </tr>
        <?php foreach ($detallCompra as $producte => $info): ?>
            <tr>
                <td><?php echo $producte; ?></td>
                <td><?php echo number_format($info["preu"], 2); ?> €</td>
                <td><?php echo $info["quantitat"]; ?></td>
                <td><?php echo number_format($info["subtotal"], 2); ?> €</td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Total compra: <?php echo number_format($totalCompra, 2); ?> €</h2>
</body>
</html>