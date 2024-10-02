<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>01 Principiante</title>
</head>
<body>
    <h1>Ejercicios principiante</h1>
    <h2>Javier Rider Jimenez</h2>
    <h3>1.</h3>
    <p>
    Crea un script PHP que visualiza las siguientes magnitudes (utiliza un número en
    notación científica y elige una precisión diferente para cada dato):



<?php
    $sol = 150000000;
    $pluton = 4900000000;
    $sol = 1391;

    echo "<br> • La distancia de la tierra al sol: %.2e", $sol;
    echo "<br> • La distancia de Plutón al Sol (5,9064x109 km). %.5e", $sol;
    printf("<br> • El diámetro del Sol %.3f", $sol);

?>
    </p>
</body>
</html>