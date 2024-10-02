<?php
define("NL", "<br>");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Las operadores en PHP</title>
</head>

<body>
    <h1>Variables: 04operadores.php</h1>
    <h2>Expresion, operadores y operandos</h2>
    <p>
        Una expresion es una combinacion de operandos y operandores que arroja un resultado. Tiene tipo de datos, que depende del tipo de datos de sus operandos y de la operacion realizada. <br>
        Un operador es un simbolo formado por uno, dos o tres caracteres que denota una operacion. <br>
        Los operadores pueden ser: <br>
        - Unarios. Solo necesitan un operando.
        - Binario. Utilizan dos operandos.
        - Ternarios. Utilizan tres operandos.

        Un operando es una expresion en si misma, siendo la mas simple un literal o una variable, pero tambien puede ser unvalor devuelto por
        una funcion o el resultado de otra expresion. <br>

        Las operaciones de una expresion no se ejecutan a la vez, sino en orden segun la precedencia y asociatividad de los operadores. Esta puede alterar a conveniencia.
    </p>
    <h2>Operadores</h2>
    <h3>Asignacion</h3>
    <?php
    // El operador de asignacion es:
    $numero = 45;
    $resultado = $numero + 5 - 29;
    $sin_valor = NULL;
    ?>
    <h3>Operadores aritmeticos</h3>
    <?php
    /*
        + Suma
        - Resta
        / Division
        * MUltiplicacion
        % Modulo
        ** Exponenciacion

        Unarios:
        + Conversion a entero
        - El opuesto
    */
    $numero1 = 15;
    $numero2 = 18;

    // Binarios
    $suma = $numero1 + 10;
    $resta = 25 - $numero2;
    $multiplicacion = $numero1 * 3;
    $division = $numero2 / 3;
    $modulo = $numero1 % 4;
    $potencia = $numero1 ** 2;

    // Unarios:
    $opuesto = -$numero1;

    echo "$numero1 y $numero2" . NL;
    echo "$suma, $resta, $multiplicacion, $division, $modulo, $potencia, $opuesto." . NL;

    $numero3 = '35';
    $numero4 = +$numero3;

    echo "\$numero4 es $numero4 y su tipo es: " . gettype($numero4) . NL;

    // No lo hace con float, solo lo hace con cadenas (Strings)
    $numero5 = .31;
    $numero6 = +$numero5;
    echo "\$numero6 es $numero6 y su tipo es: " . gettype($numero6) . NL;
    ?>
    <h2>asignacion aumentada</h2>
    <?php

    /* operadores de asignacion numerada
    ++
     */

    $numero = 4;
    $numero++;
    echo "antes numero era 4 arhora es $numero<br>";
    ++$numero;
    echo "antes el numero era 5 ahora es $numero<br>";

    $numero = 10;
    $resultado = $numero++ * 2;
    echo "el resultado es $resultado y el numero es $numero<br>";

    $numero = 10;
    $resultado = ++$numero * 2;
    echo "el resultado es $resultado y el numero es $numero<br>";

    // Operadores matematicos con variables y si mismas
    $numero += 5;
    echo "$numero<br>";
    $numero -= 3;
    echo "$numero<br>";

    $numero *= 3;
    echo "$numero<br>";
    $numero /= 3;
    echo "$numero<br>";

    $numero %= 7;
    echo "$numero<br>";
    ?>
    <h2>operadores relacionales</h2>
    <?php
    /*
    == igual a
    === identico a
    != distinto
    !== dinstinto valor o distinto tipo
    < mayor que
    > menor que
    <= igual o mayor
    >= igual o menor
    <=> nave espacial (?)
    */

    $n1 = 5;
    $cadena = "5";
    $n2 = 8;

    $resultado = $n1 == $n2;
    echo "es n1 igual a n2? " . (int)$resultado . "<br>";

    $resultado = $n1 == $cadena;
    echo "es n1 igual a cadena? " . (int)$resultado . "<br>";

    $resultado = $n1 === $n2; //es true si son el mismo valor y del mismo tipo
    echo "es n1 igual a n2? " . (int)$resultado . "<br>";


    $resultado = $n1 != $n2;
    echo "es n1 distinto a n2? " . (int)$resultado . "<br>";

    $resultado = $n1 !== $n2; // valor distinto o de distinto tipo
    echo "es n1 muy distinto a n2? " . (int)$resultado . "<br>";


    $resultado = $n1 < $n2;
    echo "es n1 mayor a n2? " . (int)$resultado . "<br>";

    $resultado = $n1 <= $n2;
    echo "es n1 mayor o igual a n2? " . (int)$resultado . "<br>";

    //nave espacial
    // si n1 es mayor de n2 devuelve 1 
    // si n1 es igual que n2 devuelve 0
    // si n1 es menor que n2 devuelve -1
    // se usa para evitar esto
    /* if resultado (n1 > n2)
        
        elif resuktao (n1 == n2)
        
        else*/
    $resultado = $n1 <=> $n2;
    echo "es n1 igual a n2? " . (int)$resultado . "<br>";



    $nombre1 = "Pepe";
    $nombre2 = "antonio";
    $resultado = $nombre1 > $nombre2;
    echo "" . $nombre1 . " es mayor que " . $nombre2 . " " . (int)$resultado . "<br>";

    $nombre1 = "MariO";
    $nombre2 = "Maria";
    $resultado = $nombre1 < $nombre2;
    echo "" . $nombre1 . " es mayor que " . $nombre2 . " " . (int)$resultado . "<br>";



    $nombre1 = "Maria";
    $nombre2 = "Maria";
    $resultado = $nombre1 == $nombre2;
    echo "" . $nombre1 . " es igual que " . $nombre2 . " " . (int)$resultado . "<br>";


    $nombre1 = "Maria";
    $nombre2 = "maria";
    $resultado = strtolower($nombre1) < $nombre2;
    echo "" . $nombre1 . " es igual que " . $nombre2 . " " . (int)$resultado . "<br>";

    ?>

    <h2>Operadores logicos</h2>

    <?php
    /*
    AND     And logico o conjuncion logica
    OR      Or logico o disyuncion lofica
    XOR     Or exclusivo
    !       not
    &&      and logico  
    ||      or logico
    */

    $n1 = 9;
    $n2 = 5;
    $n3 = 10;
    $resultado = $n1 == $n2 or $n2 > $n3;
    $resultado = $n1 == $n2 and $n2 > $n3;
    echo "el restulado es: " . (int)$resultado . "<br>";

    $n1 = 9;
    $n2 = 5;
    $n3 = 10;
    $resultado = $n1 == 9 or $n2 < $n1 and $n3 > 10;
    echo "el restulado es: " . (int)$resultado . "<br>";

    $resultado = ($n1 == 9 or $n2 < $n1) and $n3 > 10; //se ejecuta el OR primero
    echo "el restulado es: " . (int)$resultado . "<br>";


    $n1 = 9;
    $n2 = 5;
    $n3 = 10;
    $resultado ($n1 == 9 OR $n2 < $n1 ) and $n3 > 10;
    echo "el restulado es: " . (int)$resultado . "<br>";

    $resultado = $n1 + 5 / $n3 < $n1 ** 3 and $n3 / 5 >= $n1 * $n2 / $n3 or $n1 - 3 % $n3 - 7;

    ?>
</body>

</html>