<?php
define("NL", "<br>");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Las variables en PHP</title>
</head>

<body>
    <h1>Variables: 03_variables.php</h1>
    <?php
    // Las variables se definen con $identificador
    $nombre_variable = "Valor de la variable";

    // Variables que no se han definido
    $resultado = $numero + 25;
    echo "El valor de numero es $numero y el resultado es $resultado<br>";

    $resultado = $sin_definir + 5.5;
    echo "El valor de numero es $sin_definir y el resultado es $resultado<br>";

    // Si la variable esta en un contexto logico su valor logico asume por defecto False
    // Logico asume por defecto False
    ?>
    <h2>Analisis de variables</h2>
    <h3>Analisis de simple</h3>
    <?php
    //Consiste en introducir una variable en una cadena con " o heredoc para incrustrar su valor dentro de la cadena
    echo "El resultado es $resultado<br>";
    ?>

    <h3>Analisis complejo</h3>
    <?php
    // En algunas situaciones nos encontramos ambiguedad en una variable interpolada. Para ello usamos las llaves y se elimina la ambiguedad
    $calle = "Trafalgar sq";
    $numero = "5";
    $poblacion = "London";
    $distrito = "50000";

    echo "Mi direccion en Londres es {$numero}th, $calle <br> $poblacion<br>$distrito<br>";
    ?>

    <h2>Funciones para variables</h2>
    <?php
    // Funcion gettype():
    $numero = 10;
    echo "El tipo de datos de $resultado es: " . gettype($resultado) . NL;
    echo "El tipo de datos de una expresion es: " . gettype($numero) . NL;

    // Funcion empty():
    /* Comprueba si una variable tiene un valor 
        - Si es entero devuelve true si es 0, False en caso contrario.
        - Si es float devuelve true si 0.0, false en caso contrario.
        - Si es cadena devuelve True si es "", False en caso contrario.
        - Devuelve True si es NULL o False.
    */

    if (empty($numero)) echo "\$numero tiene el valor $numero";
    else echo "\$numero tiene un valor no vacio <br>";

    $numero = NULL;
    if (empty($numero)) $numero = 18;
    else echo "\$numero ya tiene un valor asignado y es $numero";

    // Funcion isset()
    // Devuelve True si la variable esta definida y no es NULL
    if (isset($nueva_variable)) echo "la variable esta definida y su valor es $nueva_variable <br>";
    else echo "La variable no esta definida<br>";

    $variable_null = NULL;
    if (isset($nueva_null)) echo "la variable esta definida<br>";
    else echo "La variable $variable_null no esta definida o tiene NULL<br>";

    /* Funciones que comprueban los tipos de datos

        - is_bool() -> True si la expresion es booleana.
        - is_int() -> True si la expresion es integer.
        - is_float() -> True si la expresion es una cadena.
        - is_array() -> True si la expresion es un array.

        En cualquier otro caso devuelve False.
    */

    $edad = 25;
    $mayor_edad = $edad > 18;
    $numero_e = 2.71;
    $mensaje = "El numero e es: " . $numero_e . "<br>";

    if (is_int($edad)) echo "\$edad es un entero<br>";

    if (is_bool($mayor_edad)) echo "\$mayor_edad es un booleano <br>";

    if (is_float($numero_e)) echo "\$numero_e es un float <br>";

    if (is_string($mensaje)) echo "\$mensaje es un string <br>";
    ?>

    <h2>Constantes</h2>
    <p>
        Una constante es un valor con nombre que no puede cambiar de valor en el programa, se le asigna un valor en la asignacion y oermanece invariable, de definen de dos formas: <br>
        - Mediante la funcion define() <br>
        - Mediante la clave const
    </p>

    <?php
    define("PI", 3.14159);
    define("PRECIO_BASE", 1500);
    define("DIRECTORIO_SUBIDAS", "/uploads/archivos");

    echo "El numero PI es: " . PI . "<br>";
    $area_circulo = PI * 5 ** 2;
    echo "El area del circulo de radio 5 es $area_circulo<br>";

    $path_archivo = DIRECTORIO_SUBIDAS . "/archivo.pdf";
    echo "El archivo subido es $path_archivo <br>";

    $precio_rebajado = PRECIO_BASE - PRECIO_BASE * 0.25;
    echo "El precio rebajado es $precio_rebajado <br>";

    const SESSION_USUARIO = 600;
    echo "La sesion de usuario finaliza en " . SESSION_USUARIO . " segundos <br>";

    // Constantes predefinidas por PHP
    echo "El script es " . __FILE__ . " y la linea es " . __LINE__ . "<br>";
    ?>
    <h2>Expresion, operadores y operandos</h2>
    <p>
        UNa expresion es una combinacion de operandos y operandores que arroja un resultado. Tiene tipo de datos, que depende del tipo de datos de sus operandos y de la operacion realizada. <br>
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
    $numero5 = PI;
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
    $resultado = $n1 == 9 || $n2 < $n1 and $n3 > 10;
    echo "el restulado es: " . (int)$resultado . "<br>";

    $resultado = $n1 + 5 / $n3 < $n1 ** 3 and $n3 / 5 >= $n1 * $n2 / $n3 or $n1 - 3 % $n3 - 7;

    ?>
</body>

</html>