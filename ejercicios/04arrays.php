<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4. Arrays</title>
</head>

<body>
    <h1>Arrays Escalares</h1>
    <h3>1</h3>
    <p>
        Escribir un script PHP que genera un vector de 10 elementos numéricos entre 1 y 100, y posteriormente los visualice por consola
    </p>

    <?php
    $vector = array();
    for ($i = 0; $i < 10; $i++) {
        $vector[$i] = rand(1, 100);
    }
    echo (print_r($vector));
    ?>

    <h2>2</h2>
    <p>
        Escribir un script PHP que genera un vector con las notas de 10 alumnos y al final tiene que mostrar por pantalla cuantos han suspendido, cuantos han aprobado y la nota media.
    </p>

    <?php
    $notas = array();
    $aprobados = 0;
    $suspensos = 0;

    for ($i = 0; $i < 10; $i++) {
        $notas[] = rand(0, 10);
    }

    foreach ($notas as $nota) {
        if ($nota >= 5) {
            $aprobados++;
        } else {
            $suspensos++;
        }
    }

    $media = array_sum($notas) / count($notas);

    echo "Aprobados: $aprobados <br>";
    echo "Suspensos: $suspensos <br>";
    echo "Media: $media <br>";
    echo "<br>";

    echo "mas alta: " . max($notas) . "<br>";
    echo "mas baja: " . min($notas) . "<br>";

    ?>

    <h2>3</h2>
    <p>
        Escribir un script PHP que genera una matriz de 15 filas y 10 columnas de números enteros aleatorios y visualizar al final la suma de los elementos de cada fila
    </p>

    <?php

    //array vacio
    $matriz = array();

    // i son las filas
    // j son las columnas
    for ($i = 0; $i < 15; $i++) {
        for ($j = 0; $j < 10; $j++) {
            // generar un numero aleatorio en la posicion i,j
            // las posiciones del array se indican con corchetes []
            $matriz[$i][$j] = rand(1, 100);
        }
        echo "Fila $i: " . array_sum($matriz[$i]) . "<br>";
    }

    ?>


    <h2>4</h2>
    <p>
        Escribir un script PHP que genera una matriz simétrica de 10 filas por 10 columnas y las visualice por pantalla. Una matriz es simétrica si el valor del elemento [i][j] es igual al elemento [j][i].
    </p>

    <?php
    // la primera fila es identica a la primera colunma
    $matriz = array();
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {

            if ($i <= $j) {
                // Llenar la mitad superior de la matriz y la diagonal principal
                $matriz[$i][$j] = rand(1, 9);

                // Reflejar el valor en la mitad inferior
                $matriz[$j][$i] = $matriz[$i][$j];
            }
        }
    }

    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            echo $matriz[$i][$j] . " ";
        }
        echo "<br>";
    }

    ?>

    <h2>5</h2>
    <p>
        Escribir un script PHP que rellene un vector de 100 números enteros aleatorios entre - 100 y 100. Posteriormente visualice cuantos son negativos, cuantos positivos, cuantos son pares y cuantos son impares.
    </p>


    <?php
    $vector = array();
    $positivos = array();
    $negativos = array();

    for ($i = 0; $i < 100; $i++) {
        $vector[] = rand(-100, 100);

        if ($vector[$i] > 0) {
            $positivos[] = $vector[$i];
        } else {
            $negativos[] = $vector[$i];
        }
    }

    echo "<fieldset> 
        <legend>Numeros</legend>";
    foreach ($vector as $num) {
        echo $num . " ";
    }
    echo "</fieldset>";

    echo "<fieldset> 
        <legend>Positivos</legend>";
    foreach ($positivos as $num) {
        echo $num . " ";
    }
    echo "</fieldset>";

    echo "<fieldset> 
    <legend>negativos</legend>";
    foreach ($negativos as $num) {
        echo $num . " ";
    }
    echo "</fieldset>";


    ?>

    <h2>6</h2>
    <p>
        Escribir un script PHP que genera un vector de 1000 números aleatorios entre 0 y 1000. Al final tiene que mostrar el elemento mayor, el menor y cuantas veces se repiten cada uno
    </p>

    <?php

    // un array aleatorio de 1000 elementos
    function generarArray($tamanio, $min, $max)
    {
        $array = array();
        for ($i = 0; $i < $tamanio; $i++) {
            $array[] = rand($min, $max);
        }
        return $array;
    }

    $vector = generarArray(1000, 0, 1000);

    $max = max($vector);
    $min = min($vector);

    $repeticionesMax = 0;
    $repeticionesMin = 0;

    foreach ($vector as $num) {
        if ($num == $max) {
            $repeticionesMax++;
        } elseif ($num == $min) {
            $repeticionesMin++;
        }
    }

    echo "Maximo: $max repeticiones $repeticionesMax<br>";
    echo "Minimo: $min repeticiones $repeticionesMin<br>";


    ?>


    <h2>7</h2>

    <p>
        Escribir un script PHP que rellena con números aleatorios una matriz de 20 filas por 50 columnas y rellene un vector de 50 elementos con la suma de las 50 columnas. Al final debe visualizar este vector.
    </p>

    <?php

    function generarArrayColFil($col, $fil, $min, $max)
    {
        $array = array();
        for ($i = 0; $i < $fil; $i++) {
            for ($j = 0; $j < $col; $j++) {
                $array[$i][$j] = rand($min, $max);
            }
        }
        return $array;
    }

    $matriz = generarArrayColFil(50, 20, 0, 100);

    $resultado = array();

    foreach ($matriz as $columna) {
        $resultado[] = array_sum($columna);
    }

    // mostrarlo
    echo "<fieldset>
        <legend>Resultado</legend>";
    foreach ($resultado as $num) {
        echo $num . " ";
    }
    echo "</fieldset>";

    ?>

    <h2>8</h2>
    <p>
        Escribir un script PHP en genera las notas de 2 exámenes en tres trimestres. Visualizar por pantalla la nota media, máxima y mínima de cada trimestre.
    </p>


    <?php
    $notas = generarArrayColFil(2, 3, 0, 10);

    $medias = array();
    $maximos = array();
    $minimos = array();

    foreach ($notas as $nota => [$examen1, $examen2]) {
        $medias[] = ($examen1 + $examen2) / 2;
        $maximos[] = max($examen1, $examen2);
        $minimos[] = min($examen1, $examen2);
    }
    print_r($notas);

    echo "<fieldset> 
    <legend>media</legend>";
    foreach ($medias as $num) {
        echo $num . " | ";
    }
    echo "</fieldset>";

    echo "<fieldset> 
    <legend>maxima</legend>";
    foreach ($maximos as $num) {
        echo $num . " | ";
    }
    echo "</fieldset>";

    echo "<fieldset> 
    <legend>minima</legend>";
    foreach ($minimos as $num) {
        echo $num . " | ";
    }
    echo "</fieldset>";
    ?>

    <h2>9</h2>
    <p>
        Escribir un script PHP que genera 10 números positivos menores que 100, los almacene en un vector y busque el valor mayor y el menor, los visualice junto con su posición en el vector.
    </p>

    <?php
    $vector = generarArray(10, 0, 100);

    $max = max($vector);
    $maxPos = array_search($max, $vector);

    $min = min($vector);
    $minPos = array_search($min, $vector);

    echo "Maximo: $max en la posicion $maxPos <br>";
    echo "Minimo: $min en la posicion $minPos <br>";

    ?>

    <h2>10</h2>
    <p>
        Escribir un script PHP que visualice por pantalla todos los números primos que hay menores que 1000.
    </p>


    <?php
    function esPrimo($numero)
    {
        if ($numero <= 1) return false;
        for ($i = 2; $i <= sqrt($numero); $i++) {
            if ($numero % $i == 0) return false;
        }
        return true;
    }

    echo "<fieldset>
                <legend>Primos</legend>";
    for ($i = 2; $i < 1000; $i++) {
        if (esPrimo($i)) {
            echo $i . " ";
        }
    }
    echo "</fieldset>";

    ?>

    <h2>11</h2>
    <p>
        Escribir un script PHP que genera un vector de 10 elementos numéricos con un método. Posteriormente generar otro vector con los cuadrados del primer vector.
    </p>

    <?php


    // la funcion para generar vectores de numeros aleatorios ya la tenemos en la linea 70
    $numeros = generarArrayColFil(1, 10, 0, 100);

    $cuadrados = array();
    foreach ($numeros as $numero) {
        $cuadrados[] = $numero[0] ** 2;
    }

    echo "<fieldset>
        <legend>numeros</legend>";
    foreach ($numeros as $numero) {
        echo $numero[0] . " ";
    }
    echo "</fieldset>";

    echo "<fieldset>
        <legend>cuadrados</legend>";
    foreach ($cuadrados as $cuadrado) {
        echo $cuadrado . " ";
    }
    echo "</fieldset>";

    ?>

    <h2>12</h2>
    <p>
        Escribir un script PHP que genera un vector de 10 elementos con números diferentes y al final los visualice.
    </p>

    <?php

    function arrayUnico($tamanio, $min, $max)
    {
        $array = array();
        while (count($array) < $tamanio) {
            $numero = rand($min, $max);
            if (!in_array($numero, $array)) {
                $array[] = $numero;
            }
        }
        return $array;
    }
    $numeros = arrayUnico(10, 0, 100);

    echo "<fieldset>
        <legend>numeros</legend>";
    foreach ($numeros as $numero) {
        echo $numero . " ";
    }
    echo "</fieldset>";
    ?>


    <h2>13</h2>
    <p>
        Escribir un script PHP que rellena aleatoriamente dos vectores de 500 elementos numéricos enteros. Debe recorrerlos en sentido contrario cada uno de ellos y contabilizar y mostrar en la consola cuantas coincidencias hay entre elementos de los dos vectores, visualizando al final el total de coincidencias.
    </p>

    <?php

    $vector1 = generarArray(500, 0, 100);
    $vector2 = array_reverse(generarArray(500, 0, 100));
    $coincidencias = array();

    foreach ($vector1 as $key => $value) {
        if ($value == $vector2[$key]) {
            $coincidencias[] = $value;
        }
    }

    echo "<fieldset>
        <legend>Coincidencias</legend>";
    echo "Coincidencias: " . count($coincidencias) . "<br>";
    foreach ($coincidencias as $num) {
        echo $num . " ";
    }
    echo "</fieldset>";


    ?>

    <h2>14</h2>
    <p>
        Escribir un script PHP que genera las notas de 4 asignaturas y 3 exámenes por cada asignatura. Visualizar por pantalla la media de las notas de examenes suspensos por asignatura
    </p>

    <?php
    ?>

    <h2>14</h2>
    <p>
        Escribir un script PHP que genera las notas de 4 asignaturas y 3 exámenes por cada asignatura. Visualizar por pantalla la media de las notas de exámenes suspensos por asignatura.
    </p>

    <?php


    $notas = generarArrayColFil(4, 3, 0, 10);
    $suspensos = array();

    foreach ($notas as $asignatura => $examenes) {
        $suspensosAsignatura = array_filter($examenes, function ($nota) {
            return $nota < 5;
        });

        if (count($suspensosAsignatura) > 0) {
            $mediaSuspensos = round(array_sum($suspensosAsignatura) / count($suspensosAsignatura), 2);
            $suspensos[$asignatura] = $mediaSuspensos;
        }
    }

    echo "<fieldset>
    <legend>Suspensos</legend>";
    foreach ($suspensos as $asignatura => $media) {
        echo "Asignatura $asignatura: $media <br>";
    }
    echo "</fieldset>";

    
    ?>

    <h2>15</h2>
    <p>
    Escribir un script PHP que rellena una matriz de 10 filas por 20 columnas con valores aleatorios entre 1 y 100. Posteriormente generar un número aleatorio en ese rango y buscarlo en la matriz generada. Tiene que visualizar la posición de la matriz en la que se encuentre dicho número y si no lo encuentra emite un mensaje
    </p>

    <?php

    $matriz = generarArrayColFil(20, 10, 1, 100);

    $numero = rand(1, 100);



    foreach ($matriz as $fil => $col) {
        
        $colIndex = array_search($numero, $col);
        if ($colIndex !== false) {
            $resultado = "numero encontrado en la fila $fil y columna $colIndex";
            break;
        }
    }

    echo $resultado;

    ?>


    <h2>16</h2>
    <p>
    Escribir un script PHP que rellena un vector con los nombres y las notas de 10 alumnos. Al final visualizará los nombres de los alumnos que tienen la nota más alta y la más baja.
    </p>

    <?php
    $notas = array();
    $notas = array(
        "Juan" => 5,
        "Pedro" => 6,
        "Maria" => 7,
        "Ana" => 8,
        "Luis" => 9,
        "Carlos" => 10,
        "Sara" => 4,
        "Laura" => 3,
        "Sofia" => 2,
        "Lucia" => 1
    );

    foreach ($notas as $nombre => $nota) {
        if ($nota == max($notas)) {
            echo "Maximo: $nombre $nota<br>";
        } elseif ($nota == min($notas)) {
            echo "Minimo: $nombre $nota<br>";
        }
    }


    ?>

    <h2>17</h2>
    <p>
    Escribir un script PHP que rellena una matriz de 10 filas por 10 columnas con números enteros y posteriormente hay que buscar el elemento mayor en la bisectriz superior y el elemento mayor en la bisectriz inferior. Considerar que la diagonal principal se encuentra en la bisectriz superior.
    </p>

    <?php
    $matriz = generarArrayColFil(10, 10, 1, 100);
  

    $maxSuperior = "";
    $maxInferior = "";

    foreach ($matriz as $i => $fila) {
        $maxSuperior = max($maxSuperior, $fila[$i]);
        $maxInferior = max($maxInferior, $fila[9 - $i]);
    }
    
    echo "Maximo superior: $maxSuperior <br>";
    echo "Maximo inferior: $maxInferior <br>";
    echo "<fieldset>
        <legend>Matriz</legend>";
    foreach ($matriz as $fila) {
        foreach ($fila as $num) {
            echo $num . " ";
        }
        echo "<br>";
    }
    echo "</fieldset>";
    
    
    ?>

    <h2>18</h2>
    <p>
    Escribir un script PHP que rellene un array de 10 elementos con números enteros aleatorios. Posteriormente visualizar los números en orden ascendente y luego descendente.
    </p>

    <?php
    
    $vector = generarArray(10, 1, 100);
    $ordenado = sort($vector);
    
    
    echo "<fieldset>
    <legend>Visualizar</legend>";
    foreach ($vector as $num) {
        echo $num . " ";
    }

    echo "<br>";
    $reverse = rsort($vector);

    foreach ($vector as $num) {
        echo $num . " ";
    }


    echo "</fieldset>";
    ?>




























    <br><br><br><br><br><br><br><br><br><br>
</body>

</html>