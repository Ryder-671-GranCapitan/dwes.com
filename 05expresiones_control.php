<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expresiones de control</title>
    <noscript>no eres compatible</noscript>
</head>

<body>
    <h1>Expresiones de control</h1>
    <p>las expresiones simples acaban en ;, pudiendo haber mas de una en la misma linea</p>

    <?php
    $numero = 3;
    echo "el numero es $numero";
    print "ahora es $numer<br";
    ?>
    <p>un bloque de sentencia es un conjunto de sentencias encerrados entre llaves. no suelen ir solas si no que forman parte de una estrucctura de control, pero pueden ir solas. ademas se pueden anidar.</p>
    <?php {
        $numero = 5;
        echo "el numero es $numero<br>";
        $numero = 2;
        echo "ahora es $numero<br>"; {
            $numero = 8;
            echo "ahora es $numero<br>";
            $numero *= 2;
            echo "ahora es $numero<br>";
        }
        echo "el numero es $numero <br>";
    }
    ?>

    <h2>estruccturas de control simple</h2>

    <?php
    // if (expresion) sentencia; 
    $numero = 4;
    if ($numero == 4) {
        echo "El numero es 4, $numero <br>";
    }

    $edad = 21;
    if ($edad > 18) echo "no puedes entrar a la palicula";
    else echo "puedes ver la pelicula de mayores";

    $carnet = "C1";
    if ($edad >= 21 and $carnet == "C1") {

        echo "obtencion del carnet de camion<br>";
        echo "tienes $edad y al superar el examen puedes optener el carnet $carnet";
    } else {
        echo "no cumples con los requisitos para tener el carnet $carnet";
    }

    // uso de html dentro de la estructura de php

    if ($edad > 18 and $edad < 65) { ?>
        <h3>servicios de gimansio para la edad <?= $edad ?></h3>
        <ul>
            <li>spining</li>
            <li>boxeo</li>
            <li>zumba</li>
        </ul>
    <?php } else { ?>
        <h3>servicios para jubilados o menores</h3>
        <ul>
            <li>taichi</li>
            <li>pilates</li>
            <li>yoga</li>
        </ul>
    <?php
    }

    if ($carnet = "C1")
        echo <<<CARNET_C1
    <h2> documentacion para obtener $carnet </h2>
    <ul> 
        <li>fotocopia del carnet</li>
        <li>certificado penales</li>
        <li>carnet B"</li>
    </ul>
    CARNET_C1;
    ?>

    <h2>IF else anidado</h2>
    <?php
    $nota = 6;
    if ($nota >= 0 and $nota < 5) {
        echo "suspenso";
    } else {
        if ($nota  < 7) {
            echo "bien";
        } else {
            if ($nota < 10) {
                echo "buena nota";
            }
        }
    }

    echo "<br>";
    if ($nota >= 0 and $nota < 5) {
        echo "suspenso <br>";
    } elseif ($nota < 7) {
        echo "aprobado<br>";
    } elseif ($nota < 10) {
        echo "Altisima nota<br>";
    }

    echo "<br><br><br>";

    switch ($nota) {
        case 1:
        case 2:
        case 3:
        case 4:

            echo "suspenso";
            break;

        case 5:
            echo "aprobado raspado";
            break;

        case 6: {
                echo "aprobado bien";
                break; //con {} no es necesario poner break
            }
        default:
            echo "la nota no es valida";
            break;
    }
    echo "<br><br><br>";

    //match

    $calificacion = match ($nota) {
        0, 1, 2, 3, 4 => "suspenso",
        5, 6 => "aprobado",
        7, 8 => "notable",
        9, 10 => "sobresaliente",
        default => "nota erronea"
    };

    echo "con tu nota $nota tienes una calificacion de $calificacion"



    ?>


    <h2>operador ternario ?</h2>
    <?php
    /*
    sintaxis
        <condicion> ? <expreison True> : <expresion False>

    */

    $nota = 6;
    $resultado = $nota >= 5 ? "con un $nota estas aprovado" : "con un $nota etas suspenso";
    echo "$resultado";

    $beca = true;

    ?>
    <form action="" method="post">
        <input type="text" name="nombre" <?= isset($nombre) ? $nombre : "?" ?>>
        <input type="checkbox" name="beca" <?= $beca ? "checked" : "" ?>> con beca <br>
        <button>enviar</button>
    </form>

    <br><br><br><br>

    <h2>operador de fusion NULL</h2>

    <?php

    $metodo = "post";
    $metodo2 = "Get";
    $defecto = "main";

    $resultado = $metodo ?? $metodo2;

    echo "el resultado es $resultado <br>";


    unset($metodo);
    $metodo2 = "Get";
    $defecto = "main";

    $resultado = $metodo ?? $metodo2;

    echo "el resultado es $resultado <br>";


    unset($metodo);
    unset($metodo2);

    $defecto = "main";

    $resultado = $metodo ?? $metodo2 ?? $defecto;

    echo "el resultado es $resultado <br>";

    ?>

    <h2>bucles</h2>

    <ul>
        <li>for con contador (estilo java)</li>
        <li>for para colecciones de datos</li>
        <li>while</li>
        <li>do.. while</li>
        <li>sentencias break y continue</li>
    </ul>

    <?php

    //for con contador
    $numero = 5;
    for ($i = 1; $i <= 10; $i++) {
        echo "$numero * $i = ", $numero * $i, "<br>";
    }


    echo "los 10 primeros numeros<br>";
    for ($i = 2; $i <= 2 * 10; $i += 2) {
        echo "numero par $i <br>";
    }

    for ($i = 10; $i <= 0; $i--) {
        echo $i;
    }

    echo "ignicion <br>";

    //varias expresiones en el inicio del contador
    //y en la parte del incremento

    for ($i = 10, $j = 0; $i >= 5 and $j < 8; $i--, $j += 2) {
        echo "$i ---- $j <br>";
    }
?>


<h3>bucle while</h3>
<?php

    //sumar los numeros pares que se generan aleatoriamente hasta el 0
    $numero = rand(0,10);
    $total = 0 + $numero;

    while ($numero != 0) {
        echo "el numero generado es: $numero <br>";
        if ($numero % 2 == 0) {
            $total += $numero;
        }
        $numero = rand(0,10);

    }
    echo "el total es $total";

?>

    <h3>do while</h3>

<?php
    //contar cuantos numeros impares se generan aleatoriamente hasta que se genera uno geativo


    $total = 0;

    do {
        $numero = rand(-5,50);
        echo "el numero generado es: $numero <br>";
        if (abs($numero) % 2 == 1) 
            $total++;


    } while ($numero >= 0);
    echo "se han generado $total numeros"

?>
    <h3>sentencia break y continue</h3>
<?php
    // bucle repetir hasta romper con break

    do {
        $numero = rand(0,20);
        if ($numero % 3 == 0) $total++;

        echo "el numero es $numero <br>";
        if ($numero == 0 ) break;


    } while (true);
?>


</body>

</html>