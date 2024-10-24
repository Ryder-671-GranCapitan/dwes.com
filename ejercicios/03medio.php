<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nivel medio</title>
</head>

<>
    <h1>Actividades basicas</h1>
    <h2>medio</h2>

    <h3>43</h3>
    <p>
        Crear un script PHP que asigna una frase a una cadena de caracteres y la muestra en
        sentido inverso
    </p>
    <?php
    $frase = "Hola mundo";
    // string reverse
    echo strrev($frase);

    ?>
    <h3>44</h3>
    <p>
        Crear un script PHP que ingrese por teclado dos números y descubra si son amigos. Dos números son amigos cuando ambos tienen la misma suma de sus divisores.
    </p>
    <form method="post">
        <label for="num1">Número 1:</label>
        <input type="number" id="num1" name="num1" required>
        <br>
        <label for="num2">Número 2:</label>
        <input type="number" id="num2" name="num2" required>
        <br>
        <input type="submit" value="Verificar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['num1']) && isset($_POST['num2'])) {
            $n1 = intval($_POST['num1']);
            $n2 = intval($_POST['num2']);

            function sumaDivisores($n)
            {
                $suma = 0;
                for ($i = 1; $i < $n; $i++) {
                    if ($n % $i == 0) {
                        $suma += $i;
                    }
                }
                return $suma;
            }
            $suma1 = sumaDivisores($n1);
            $suma2 = sumaDivisores($n2);

            if ($n1 == $suma2 && $n2 == $suma1) {
                echo "Son amigos";
            } else {
                echo "No son amigos";
            }
        }
    }


    ?>

    <h3>45</h3>
    <p>
        Crear un script PHP asigna a una variable el nombre de un usuario usuario y luego lo muestre tres veces. Primero con el nombre completo en mayúsculas, luego en minúsculas y finalmente con la letra inicial del nombre y el apellido en mayúsculas.
        Por supuesto, el nombre del usuario puede contener cualquier tipo de letra.
    </p>

    <form method="post">
        <label for="nombre">nombre</label>
        <input type="text" id="nombre" name="nombre" value="pepe">
        <br>
        <label for="apellido">apellido</label>
        <input type="text" id="apellido" name="apellido" value="jimenez">

        <label for="repeticiones">repeticiones</label>
        <input type="number" name="repeticiones" id="repeticiones" min="0" value="3">
        <br>
        <input type="submit" value="Verificar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['repeticiones'])) {

            $nombre = strval($_POST['nombre']);
            $apellido = strval($_POST['apellido']);
            $repeticiones = intval($_POST['repeticiones']);

            for ($i = 1; $i <= $repeticiones; $i++) {
                echo "<p> $i: $nombre $apellido </p>";

                if ($i == 1) {
                    echo "<p> $i: " . strtoupper($nombre) . " " . strtoupper($apellido) . "</p>";
                }
                if ($i == 2) {
                    echo "<p> $i: " . strtolower($nombre) . " " . strtolower($apellido) . "</p>";
                }
                if ($i == 2) {
                    echo "<p>$i: " . ucwords(strtolower($nombre)) . " " . ucwords(strtolower($apellido)) . "</p>";
                }
            }
        }
    }
    ?>

    <h3>46</h3>
    <p>
        Crear un script PHP que resuelva una ecuación de segundo grado. Para ello, se asignan los coeficientes A, B y C y luego, se calculan las posibles soluciones.
    </p>

    <form method="post">
        <label for="coeficiente1">Número 1:</label>
        <input type="number" id="coeficiente1" name="coeficiente1" value="5" required>
        <br>

        <label for="coeficiente2">Número 2:</label>
        <input type="number" id="coeficiente2" name="coeficiente2" value="2" required>
        <br>

        <label for="coeficiente3">Número 3:</label>
        <input type="number" id="coeficiente3" name="coeficiente3" value="3" required>

        <br>
        <input type="submit" value="Verificar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['coeficiente1']) && isset($_POST['coeficiente2']) && isset($_POST['coeficiente3'])) {
            $n1 = intval($_POST['coeficiente1']);
            $n2 = intval($_POST['coeficiente2']);
            $n3 = intval($_POST['coeficiente3']);

            if ($n1 == 0) {
                echo "No es una ecuación de segundo grado";
            } else {

                $discriminante = $n2 * $n2 - 4 * $n1 * $n3;

                if ($discriminante > 0) {
                    $raiz1 = (-$n2 + sqrt($discriminante)) / (2 * $n1);
                    $raiz2 = (-$n2 - sqrt($discriminante)) / (2 * $n1);
                    echo "Las raices son $raiz1 y $raiz2";
                } elseif ($discriminante == 0) {
                    $raiz = -$n2 / (2 * $n1);
                    echo "La raiz es $raiz";
                } else {
                    echo "No tiene solución";
                }
            }
        }
    }

    ?>



    <h3>47</h3>
    <p>
        Crear un script PHP que genera aleatoriamente 3 números (entre 1 y 20) 5 veces. Cada vez los números deben mostrarse en orden ascendente.
    </p>

    <?php

    for ($i = 0; $i < 5; $i++) {
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        $num3 = rand(1, 20);
        $numeros = [$num1, $num2, $num3];
        sort($numeros);
        echo "<p> $numeros[0] $numeros[1] $numeros[2] </p>";
    }

    ?>

    <h3>48</h3>
    <p>
        Repetir el ejercicio anterior pero, se debe generar un número más que indique el tipo de orden para mostrar los números (ascendente o descendente).
    </p>

    <?php

    for ($i = 0; $i < 5; $i++) {
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        $num3 = rand(1, 20);
        $orden = rand(0, 1);
        if ($orden == 0) {
            $numeros = [$num1, $num2, $num3];
            sort($numeros);
            echo "<p>ascendente: ";
        } else {
            $numeros = [$num1, $num2, $num3];
            rsort($numeros);
            echo "<p>descendente: ";
        }
        echo "$numeros[0] $numeros[1] $numeros[2] </p>";
    }

    ?>

    <h3>49</h3>
    <p>
        Crear un script PHP genera aleatoriamente un número y muestre si es perfecto. Un número es perfecto cuando es igual a la suma de sus divisores.
    </p>

    <?php
    $num1 = rand(1, 100);

    function esPerfecto($n)
    {
        $suma = 0;
        for ($i = 1; $i < $n; $i++) {
            if ($n % $i == 0) {
                $suma += $i;
            }
        }
        return $suma == $n;
    }
    echo "<p>El número es $num1 ";
    if (esPerfecto($num1)) {
        echo "Es perfecto</p>";
    } else {
        echo "No es perfecto</p>";
    }

    ?>

    <h3>50</h3>
    <p>
        Crear un script PHP que genera un número aleatoriamente y muestre si es primo. Un número es primo si no tiene divisores menores que su raíz cuadrada, excepto el 1.
    </p>

    <?php
    $num1 = rand(1, 100);

    function esPrimo($num): Bool
    {

        if ($num <= 1) {
            return false;
        } else {
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i == 0) {
                    return false;
                }
            }
        }

        return true;
    }

    echo "<p>El número es $num1 ";
    if (esPrimo($num1)) {
        echo "Es primo</p>";
    } else {
        echo "No es primo</p>";
    }

    ?>

    <h3>51</h3>
    <p>
        Crear un script que genera aleatoriamente un año de nacimiento desde 1900 hasta 2000. Después debe mostrar en pantalla cada año desde su año de nacimiento hasta el año actual.
    </p>

    <?php

    $anio = rand(1900, 2000);

    for ($i = $anio; $i <= date('Y')/*hasta el año actual*/; $i++) {
        echo "$i ";
    }

    ?>

    <h3>52</h3>
    <p>
        Crear un script PHP que genera un número entero positivo y muestre en pantalla cada número impar desde 1 hasta ese número separado por coma.
    </p>

    <?php
    $num = rand(1, 100);

    for ($i = 1; $i < $num; $i++) {
        if ($i == 1 || $i % 3 == 0) {
            echo "$i, ";
        }
    }

    ?>

    <h3>53</h3>
    <p>
        Crear un script PHP que genera aleatoriamente un número entero positivo y muestre en pantalla la cuenta regresiva desde ese número hasta 0, separados por coma.
    </p>

    <?php
    $num = rand(1, 100);

    for ($i = $num; $i >= 0; $i--) {
        if ($i % 2 == 0) {
            echo "$i, ";
        }
    }

    ?>

    <h3>54</h3>
    <p>
        Crear un script que muestre en pantalla la tabla de multiplicar del 1 al 10.
    </p>

    <?php
    $num = rand(1, 10);

    for ($i = 0; $i <= 10; $i++) {
        echo "$num x $i = " . $num * $i . "<br>";
    }
    ?>

    <h3>55</h3>
    <p>
        Crear un script PHP que genera un número aleatorio entre 1 y 9, y muestra en pantalla un triángulo rectángulo como el de la figura.
    </p>

    <?php
    $num = rand(1, 9);

    for ($i = 1; $i <= $num; $i++) {

        for ($j = 1; $j <= $i; $j++) {
            echo rand(1, 9);
        }
        echo "<br>";
    }
    ?>

    <h3>56</h3>

    <p>
        Crear un script PHP que genera números aleatorios hasta el 0. Finalmente, muestre en la pantalla el número más bajo y el más alto.
    </p>

    <?php
    $num = "";
    $numeros = [];


    while ($num != 0 && count($numeros) < 10) {
        $num = rand(-10, 10);
        $numeros[] += $num;
    }
    echo "el numero de ejecuciones es " . count($numeros) . "<br>";
    echo "El número más bajo es: " . min($numeros) . "<br>";
    echo "El número más alto es: " . max($numeros) . "<br>";

    ?>

    <h3>57</h3>
    <p>
        Crear un script PHP que genera aleatoriamente una cadena de caracteres y luego muestre en la pantalla cada letra de la cadena comenzando con la última hasta la primera. Pista: función chr().
    </p>

    <?php
    $cadena = "";

    function generarCadenaAleatoria($longitud)
    {
        $cadena = '';
        for ($i = 0; $i < $longitud; $i++) {
            // Generar un número aleatorio entre 97 (a) y 122 (z) usando la función chr()
            $cadena .= chr(rand(97, 122)); // Minúsculas entre 'a' y 'z'
        }
        return $cadena;
    }

    $cadena = generarCadenaAleatoria(rand(10, 100));

    for ($i = strlen($cadena) - 1; $i >= 0; $i--) {
        echo $cadena[$i] . " ";
    }

    ?>

    <h3>58</h3>
    <p>
        Crear un script PHP que asigna a una variable una frase. Después genera aleatoriamente una letra y muestre en la pantalla cuántas veces aparece esa letra en la sentencia.
    </p>

    <?php
    //function from exercise 57 to generate random characters
    $letra = generarCadenaAleatoria(1);

    $frase = generarCadenaAleatoria(50);

    $contador = 0;
    for ($i = 0; $i < strlen($frase); $i++) {
        if ($frase[$i] == $letra) {
            $contador++;
        }
    }

    echo "La letra $letra aparece $contador veces en la frase '$frase'";
    ?>


    <h3>59</h3>
    <p>
        Crear un script PHP para buscar los primeros 5 números perfectos.
    </p>

    <?php
/*
    $num = 1;
    $perfectos = 0;
    echo "<p>Los primeros 5 números perfectos son:</p>";
    while ($perfectos < 5 || $num < 500) {
        if (esPerfecto($num)) {
            echo "$num ";
            $perfectos++;
        }
        $num++;
    }
    */
    ?>

    <br><br><br><br><br><br><br><br><br><br>
    </body>

</html>