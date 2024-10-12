<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arraysº</title>
</head>

<body>
    <h1>array</h1>
    <p>
        conjunto de elementos que se referencian con el mismo nombre
        a cada variable del array se se conoce como componente o elemento del array
        cada componente tiene asociada una clave que se emplea para acceder a ese elemento o componente
    </p>
    <p>
        en php los arrays son muy flexibles. hay de dos tipos: escalares y asociativos.
        para acceder a un elemento se usa su clave con el operador [] si la clave es un numero entero
        mayor igual que cero es un array escalar. si la clave es una cadena de caracteres es un array asociativo
    </p>
    <h2>array escalar</h2>
    <?php
    // un array se define de dos formas
    // 1 con la funcion array ()

    $notas = array(4, 5, 8, 9, 3, 7);
    //2º forma con un liteal
    $numero = [1, 8, 7, 5, 6, 9];

    // si solo se indica los elementos del array la clave comienza por 0 desde la izquierda
    echo "la primera nota es $notas[0] <br>";
    echo "la primera nota es $notas[2] <br>";
    echo "la primera nota es $notas[3] <br>";

    //al definir el array podemos indicar los indices
    $notas = array(2 => 8.5, 4 => 7.6, 8 => 9);
    echo "la primera nota es $notas[2] <br>";

    // podemos definir para unos y no para otros
    $notas = array(2 => 8.5, 4 => 7.6, 8 => 9, 8, 8, 3);
    echo "la primera nota es $notas[9] <br>";

    //borrar un elemento del array
    unset($notas[4]);
    //echo "la primera nota es $notas[4] <br>";

    $notas[5] = rand(0, 10);
    echo "la primera nota es $notas[5] <br>";

    //añadir datos a la lista
    $notas[] = 7.5;
    echo "la primera nota es $notas[12] <br>";
    ?>


    <h2>array asociativos</h2>

    <p>
        array que tiene una cadena de caracteres como clave
    </p>
    <?php

    $coche['123456bcd'] = "seat leon";
    $coche['789456bcd'] = "for focus";

    echo "mi coche es: {$coche['123456bcd']} <br>"
    ?>

    <h2>array mixto</h2>
    <p>
        cuando las claves son indices numericos o cadenas indiscriminadamente
    </p>

    <?php
    $alumno['nombre'] = "juan gomez";
    $alumno[0] = 4;
    $alumno[1] = 6;
    $alumno[2] = 5;
    $alumno['media'] = 5;

    echo "El alumno {$alumno['nombre']} y tiene las notas $alumno[0], $alumno[1] y $alumno[2]";
    echo "<br>su media es {$alumno['media']}";

    $alumno = ['nombre' => "pepe pepon", 0 => 5, 1 => 3, 2 => 9, 8, 7, 'media' => 8];
    ?>

    <h2>array bidimensional</h2>
    <p>
        los array con dos dimensiones y por tanto para acceder aun elemento hacen falta 2 claves
    </p>

    <h2> array bidimensionales</h2>

    <?php
    $notas = array(
        array(3.5, 8, 9, 8),
        array(3.5, 2, 1, 8),
        array(3.5, 8, 1, 8),
        array(3.5, 8, 9, 6)
    );

    echo "el elemento 2 de la comunla 3 {$notas[1][2]}<br>";

    $notas[][] = 4;
    echo "el ultimo elemento en la ultima fila es {$notas[4][0]}<br>";

    $notas[3][] = 7.5;
    echo "el ultimo elemento en la ultima fila es {$notas[3][4]}<br>";

    $coches = [
        '1234bbc' => ['marca' => 'seat', 'modelo' => 'ibiza', 'motor' => 'diesel', 'pvp' => 10000],
        '7741bbc' => ['marca' => 'mercedes', 'modelo' => 'benz', 'motor' => 'gasolina', 'pvp' => 100000],
        '9632bbc' => ['marca' => 'toyota', 'modelo' => 'AE84', 'motor' => 'Gaolina', 'pvp' => 100000]
    ];

    echo "el primer coche es {$coches['1234bbc']['marca']} <br>";



    ?>




    <?php

    $notas = [
        [
            [1, 8, 5, 6],
            [9, 3, 8, 10]
        ],
        [
            [5, 8, 9, 3],
            [7, 2, 4, 7]
        ],
        [
            [1, 8, 5, 6],
            [9, 3, 8, 10]
        ]
    ];

    echo "nota elemto 1 1 2: {$notas[1][1][2]}<br>";


    $notas = [
        'juan' => [
            'T1' => ['dews' => 4, 'dwec' => 7, 'div' => 8],
            'T2' => ['dews' => 4, 'dwec' => 7, 'div' => 8],
            'T3' => ['dews' => 4, 'dwec' => 7, 'div' => 8]

        ],
        'antonio' => [
            'T1' => ['dews' => 7, 'dwec' => 4, 'div' => 3],
            'T2' => ['dews' => 3, 'dwec' => 2, 'div' => 4],
            'T3' => ['dews' => 9, 'dwec' => 9, 'div' => 5]

        ]
    ];
    echo "nota elemto 1 1 2: {$notas['antonio']['T1']['dews']}<br>";

    ?>

    <h2>recorrer el array</h2>
    <?php
    $numeros = [1, 8, 6, 3, 1, 7, 8];
    for ($i = 0; $i < count($numeros); $i++) {
        echo "$numeros[$i] <br>";
    };
    // para cualquier tipo de array tenemos el bucle foreach
    foreach ($numeros as $numero) {
        echo "el numero es: $numero <br>";
    }

    $alumno['nombre'] = "juan gomez";
    $alumno[0] = 4;
    $alumno[1] = 6;
    $alumno[2] = 5;
    $alumno['media'] = 5;
    foreach ($alumno as $clave => $valor) {
        echo "el alumno es: $clave y $valor <br> ";
    };

    /*

    echo "<h2> recorrer un array multidimensional </h2>";
    for ($i=0; $i < count($notas); $i++) { 
        echo "recorrido del elemento $i";
        for ($j=0; $j < count($notas[$i]); $j++) { 
            echo "fila $i comuna $j. {$notas [$i][$j]}<br>";
        }
    }
*/

    foreach ($notas as $alumno => $trimestres) {
        echo "Notas del alumno: $alumno <br>";

        foreach ($trimestres as $trimestre => $modulos) {
            echo "Notas del trimestre: $trimestre <br>";

            foreach ($modulos as $modulo => $nota) {
                echo "Módulo: $modulo, Nota: $nota <br>";
            }

            echo "-----------------------<br>";
        }

        echo "======================<br>";
    }

    echo "array de los coches <br>";
    foreach ($coches as $matricula => $coche) {
        echo "coche con matricula: $matricula <br>";
        foreach ($coche as $clave => $valor) {
            echo "$clave: $valor <br>";
        };
        echo "--------------------";
    }

    ?>












    <br><br><br><br><br><br><br><br>







</body>

</html>