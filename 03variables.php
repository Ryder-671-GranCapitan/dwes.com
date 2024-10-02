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

 
</body>

</html>