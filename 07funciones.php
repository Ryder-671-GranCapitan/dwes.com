<?php

/*
    Conjunto de sentencias con nombre asociado que se ejecutan a discreción del desarrollador cuando es necesario.

    Invocación o llamada de la función:
    - Sentencia que solicita la ejecución de la función, momento en el cual el flujo del programa se desvía hacia la primera sentencia de la función y comienza su ejecución.

    - Las funciones pueden necesitar datos. Estos datos se pasan en forma de parámetros o argumentos a la función en el momento de la ejecución.

    - Pueden devolver uno o varios valores al punto de la invocación, los cuales pueden ser utilizados posteriormente en cualquier expresión.

    Tipos de funciones:
    - Internas: Integradas o predefinidas. Son las propias del lenguaje.
    - Métodos: Funciones que pertenecen a clases de objetos.
    - De usuario: Las que crea el desarrollador.

    3.1 Definición de la función:
    - Se puede definir en cualquier parte del script.
    - Las funciones tienen una cabecera y un cuerpo.
    
    Sintaxis:
        function nombre_funcion([argumento1], [argumento2], ...) {
            // Sentencias
        }

    - Nombre: Cualquier nombre válido sin el símbolo $.
    - Lista de argumentos: Separados por comas ",".
    - El cuerpo de la función es el conjunto de sentencias entre {}.

    3.3 Paso de parámetros:
    - Parámetro: dato que la función necesita para su ejecución.
    - Esto permite que las funciones se ejecuten con diferentes datos en múltiples invocaciones.
    - Se hace para evitar código repetitivo.

    Tipos de parámetros:
        * Parámetro formal: es el que se define en la cabecera de la función. Este parámetro es equivalente a una variable. También conocido simplemente como "parámetro".
        * Parámetro real: es el que se emplea en la invocación de la función. Puede ser cualquier expresión que arroje un valor. También conocido como "argumento".

    - Los argumentos y los parámetros tienen una correspondencia posicional en la definición y en la invocación. 
      El primer argumento corresponde al primer parámetro, el segundo al segundo, y así sucesivamente.

    3.3.1 Paso de parámetros por valor y por referencia:

    - Paso por valor: consiste en copiar el valor del argumento en el parámetro.
    - Hay 2 entidades: el parámetro de la función y el argumento de la llamada, los cuales son independientes entre sí.

    - Paso por referencia: consiste en pasar al parámetro la referencia (dirección de memoria) del argumento. 
      Por tanto, solo hay una entidad y si el parámetro dentro de la función se modifica, el nuevo valor será visible en el script principal.

    3.3.2 Parámetros con nombre:
    - En la invocación de la función, se puede pasar el argumento con el nombre del parámetro. Esto permite utilizar un orden diferente en la invocación.

    3.3.3 Parámetros con valor por defecto:
    - En la cabecera, los parámetros pueden tener un valor por defecto. Estos valores deben ser literales (pueden ser arrays o el valor NULL).
    - Esto permite invocar la función sin esos parámetros, los cuales adquieren el valor por defecto definido en la cabecera de la función.

    - Si la función combina parámetros obligatorios con parámetros con valor por defecto, los obligatorios deben definirse antes que los que tienen valor por defecto, 
      a menos que en la invocación se utilicen argumentos con nombre.
*/

function area_triangulo($base, $altura)
{
    $area = ($base * $altura) / 2;
    return $area;
};

function area_triangulo2(&$base, &$altura)
{
    echo "area dentro de la funcion 2";
    $base = 10;
    $altura = 10;
    $area = ($base * $altura) / 2;

    return $area;
};

define("PI","3.14");
function volumen_cilindro($radio, $altura=15) {
    $area_base = PI * $radio ** 2;
    $volumen = $area_base * $altura;

    return $volumen;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>funciones php</title>
</head>

<body>
    <h1>funciones</h1>
    <?php

    $base = 8;
    $altura = 9;

    $area = area_triangulo($base, $altura);

    echo "el area del triagulo con altura: $altura y $base es: $area <br>";

    // segunda funcion
    $area = area_triangulo2($base, $altura);
    echo " 2 - el area del triagulo con altura: $altura y $base es: $area <br>";


    // se pueden pasar cambiados
    //$area = area_triangulo2($base, $altura / 2);
    echo " 3 - el area del triagulo con altura: $altura y $base es: $area <br>";

    /*paso por referencia
    la llamada a la funcion usamos & antes del argumento 
    en este caso el agumento es obligatorio que sea una variable

    */

    $area = area_triangulo2($base, $altura);
    echo " 4 - el area del triagulo con altura: $altura y $base es: $area <br>";

    //paso de parametros con nombre

    $area = area_triangulo($base = 5, $altura = 9);
    echo " 5 - el area del triagulo con altura: $altura y $base es: $area <br>";

    //parametros por defecto
    $volumen = volumen_cilindro(8, 9);
    echo " 6 - el volumen del cilindor con altura: $altura y $base es: $volumen <br>";


    $volumen = volumen_cilindro(9);
    echo " 7 - el volumen del cilindor con altura: $altura y $base es: $volumen <br>";

    ?>
</body>

</html>