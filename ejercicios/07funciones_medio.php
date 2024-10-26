<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>funciones $mediaSuspensos</title>
</head>

<body>
    <h1>funciones medio</h1>

    <h2>25</h2>
    <p>
        25. Desarrollar una función que calcule y muestre el factorial de un número.
    </p>
    <?php
    function factorial($numero): int
    {
        $resu = 1;
        for ($i = 1; $i <= $numero; $i++) {
            $resu *= $i;
        }
        return $resu;
    }

    echo factorial(5);

    ?>

    <h2>26</h2>
    <p>
        Desarrollar una función que recibe un número entero y luego, calcule y muestre ese número en varios sistemas de numeración (octal, hexadecimal y binario).
    </p>

    <?php
    function sistemasNumeracion($numero)
    {

        if (is_nan($numero)) {
            echo "no es un numero";
            return;
        } else {
            $hexadecimal = dechex($numero);
            $decimal = $numero;
            $octal = decoct($numero);
            $binario = decbin($numero);
        }

        return [
            'hexadecimal' => $hexadecimal,
            'decimal' => $decimal,
            'octal' => $octal,
            'binario' => $binario
        ];
    }

    $resu = sistemasNumeracion(15);
    if ($resu) {
        foreach ($resu as $sistema => $valor) {
            echo ucfirst($sistema) . ": " . $valor . "<br>";
        }
    }
    ?>

    <h2>27</h2>
    <p>
        27. Desarrollar una función que tenga tres parámetros: un nombre de usuario, una contraseña y un límite de intentos. La función solicita un nombre de usuario y una contraseña dentro del número de intentos permitidos. Si el nombre de usuario es el usuario pasado como parámetro y la contraseña es la que se pasa como parámetro retorna Verdadero, Falso en caso contrario. Por defecto el nombre de usuario es usuario y la contraseña es abcd1234@.
    </p>

    <?php

    $fallos = 0; // Variable para contar los fallos

    function iniciarSesion($user, $pass, $intentos = 4): bool
    {

        $usuarios = [
            'usuario1' => 'password1',
            'usuario2' => 'password2',
            'usuario3' => 'password3',
            'usuario' => 'abcd1234@'
        ];
        global $fallos; // Usar la variable global para contar los fallos

        foreach ($usuarios as $usuario => $contrasenia) {
            if ($usuario == $user && $contrasenia == $pass) {
                if ($fallos < $intentos) {
                    return true; // Login exitoso
                } else {
                    return false; // Demasiados intentos fallidos
                }
            }
        }

        $fallos++; // Incrementar el conteo de fallos si no se encuentra el usuario o la contraseña no coincide

        return false; // Login fallido
    }



    if (iniciarSesion('usuario', 'abcd1234@')) {
        echo "Inicio de sesión exitoso.";
    } else {
        echo "Fallo en el inicio de sesión.";
    }

    ?>

    <h2>31</h2>
    <p>
        Desarrollar una función que calcule el MCD de dos números mediante el algoritmo de Euclides.
    </p>

    <?php
    function mcd($a, $b): int
    {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }

    echo "El MCD de 48 y 18 es: " . mcd(48, 18);

    ?>

    <h2>32</h2>
    <p>
        Desarrollar una función que calcule el MCM de dos números. Aquí tienes la fórmula:
        MCM(a, b) = (a * b) / MCD(a, b).
    </p>

    <?php
    function mcm($a, $b): int
    {
        return ($a * $b) / mcd($a, $b);
    }

    echo "El MCM de 48 y 18 es: " . mcm(48, 18);
    ?>

    <h2>33</h2>
    <p>
        Desarrollar una función que tenga un parámetro de coma flotante y uno entero. La función debe devolver el número de coma flotante redondeado a los dígitos decimales del segundo parámetro establecido.
    </p>
    <?php

    function redondear($numero, $nDecimales): float
    {
        return round($numero, $nDecimales);
    }

    ?>


    <h2>34</h2>
    <p>
        Desarrollar una función que recibe una hora en formato hh:mm:ss y devuelva un valor indicando si el formato es correcto.
    </p>

    <?php

    function comprobarHoras($tiempo): bool
    {

        /*
        Aquí, H:i:s representa el formato esperado:

        H: Horas en formato de 24 horas (00 a 23).
        i: Minutos (00 a 59).
        s: Segundos (00 a 59).
        */
        $format = 'H:i:s';


        /*
        DateTime::createFromFormat() intenta crear un objeto DateTime usando el formato dado (H:i:s). Si tiempo coincide con este formato, se crea el objeto; de lo contrario, d será false.
        */
        $d = DateTime::createFromFormat($format, $tiempo);

        /*
        Primero, la función verifica que $d sea un objeto DateTime válido.
        Luego, d->format($format) convierte el objeto DateTime de nuevo al formato H:i:s.
        Si esta conversión coincide exactamente con el valor original de $tiempo, significa que es un valor de tiempo válido en el formato correcto, y la función devuelve true; si no, devuelve false.        
        */
        return $d && $d->format($format) === $tiempo;
    }

    $hora = "54:30:45";
    if (comprobarHoras($hora)) {
        echo "La hora $hora tiene un formato correcto.";
    } else {
        echo "La hora $hora tiene un formato incorrecto.";
    }


    ?>

    <h2>35</h2>
    <p>
        Desarrollar una función que recibe una fecha en formato dd/mm/aaaa y devuelva un valor indicando si el formato es correcto.
    </p>

    <?php
    function comprobarFecha($fecha): bool
    {
        $format = 'd/m/Y';
        $resu = DateTime::createFromFormat($format, $fecha);

        return $resu && $resu->format($format) === $fecha;
    }
    $fecha = "29/02/2000";
    if (comprobarFecha($fecha)) {
        echo "La hora $fecha tiene un formato correcto.";
    } else {
        echo "La hora $fecha tiene un formato incorrecto.";
    }

    ?>

    <h2>36</h2>
    <p>
        Desarrollar una función que recibe una marca de tiempo con formato dd/mm/aaaa
        hh:mm y muestre si la fecha y la hora son correctas.
    </p>

    <?php
    function comprobarFechaHora($tiempo): bool
    {
        $format = 'd/m/Y H:i';
        $resu = DateTime::createFromFormat($format, $tiempo);
        return $resu && $resu->format($format) === $tiempo;
    }

    $tiempo = "29/02/2000 23:55";
    if (comprobarFechaHora($tiempo)) {
        echo "La hora $tiempo tiene un formato correcto.";
    } else {
        echo "La hora $fecha tiene un formato incorrecto.";
    }

    ?>

    <h2>37</h2>
    <p>
        Desarrollar una función que calcule la ecuación lineal a partir de dos coordenadas que pertenecen a esa recta. Tiene que dos valores: la pendiente de la recta y el punto de corte en el eje y.
    </p>


    <h2>38</h2>
    <p>
        Desarrollar una función que devuelva la mediana de un conjunto de números
        pasados como argumento.
    </p>

    <?php
    function mediana($numeros )
    {
        sort($numeros);
        $count = count($numeros);
        $middle = floor($count / 2);

        if ($count % 2) {
            return $numeros[$middle];
        } else {
            return ($numeros[$middle - 1] + $numeros[$middle]) / 2;
        }
    }

    $numeros = [1, 3, 3, 6, 7, 8, 9];
    echo "La mediana es: " . mediana($numeros);
    ?>













    <br><br><br><br><br><br><br><br><br><br>
</body>

</html>