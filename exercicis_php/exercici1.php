<?php

// 1
$nom = "Anna";       
$edat_str = "20";     
$nota_float = 8.5;      
$aprovat = true;           

// 2
$edat = (int)$edat_str;

// 3
$suma = $edat + $nota_float;

// 4
echo "<p><strong>Nom:</strong> $nom</p>";
echo "<p><strong>Edat (string):</strong> $edat_str</p>";
echo "<p><strong>Edat (int):</strong> $edat</p>";
echo "<p><strong>Nota:</strong> $nota_float</p>";
echo "<p><strong>Suma edat + nota:</strong> $suma</p>";

// 5
if ($aprovat) {
    echo "<p style='color:green;'>L'alumne ha aprovat.</p>";
} else {
    echo "<p style='color:red;'>L'alumne ha suspès.</p>";
}

// 6
$edat_str2 = strval($edat);  
$nota_int = intval($nota_float); 

echo "<p><strong>Edat convertida a string:</strong> $edat_str2</p>";
echo "<p><strong>Nota convertida a integer:</strong> $nota_int</p>";
?>