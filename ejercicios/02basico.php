<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Primer script</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='main.js'></script>
    <noscript>No tienes soporte de javascript</noscript>
</head>

<body>
    <h1>Ejercicios basicos</h1>

    <p>
        Crea un script PHP que genera aleatoriamente un número entero y muestre si es par o impar.
    </p>

    <?php
    $numero = rand(0, 110);

    if ($numero == 0) {
        echo "el numero es 0. ni impar ni par";
    } elseif ($numero % 2 == 0) {
        echo "El numero $numero es par";
    } else {
        echo "el numero $numero es impar";
    }
    ?>

    <h3>21</h3>
    <p>
        Crea un script PHP que asigna una variable la edad de un usuario y muestre en pantalla si es mayor de edad.
    </p>

    <?php
    $numero = rand(0, 110);

    if ($numero < 18) {
        echo "$numero Menor de edad";
    } else {
        echo "$numero Mayor de edad";
    }
    ?>

    <h3>22</h3>
    <p>
        Crea un script PHP asigna a variables el número de personas adultas y niños que compran un billete para un viaje en globo. Cada adulto pesa 75Kg y cada niño 20Kg. Si la cesta del globo solo soporta 1000 libras, muestra en pantalla si pueden subir juntas al globo o deben dividirse en dos viajes. Una libra son 453,5923699993531 gramos.
    </p>

    <?php
    // Definir variables
    $adultos = 3;
    $ninos = 5;

    // Definir los pesos en kilogramos
    $pesoAdultoKg = 75;
    $pesoNinoKg = 20;

    // Convertir los pesos a libras (1 kilogramo = 2.20462 libras)
    $pesoAdultoLb = $pesoAdultoKg * 2.20462;
    $pesoNinoLb = $pesoNinoKg * 2.20462;

    // Calcular el peso total en libras
    $pesoTotal = ($adultos * $pesoAdultoLb) + ($ninos * $pesoNinoLb);

    // Comprobar si el peso total excede la capacidad del globo (1000 libras)
    if ($pesoTotal <= 1000) {
        echo "Todos pueden ir en un solo globo.";
    } else {
        echo "Tendrán que dividirse en dos viajes.";
    }
    ?>

    <h3>23</h3>
    <p>
        Crear un script PHP que genera aleatoriamente un número que corresponde a una edad entre 0 y 90 años. Después muestra un periodo dependiendo de la edad: Infancia (0-3), Infantil (4-11), Adolescente (12-20), Adulto (21-65), Tercera edad (+65). Hay dos formas de enfocar este problema.
    </p>
    <?php
    $edad = rand(0, 110);

    switch (true) {
        case ($edad >= 0 && $edad <= 3):
            echo "Periodo de la vida: Infancia";
            break;
        case ($edad >= 4 && $edad <= 11):
            echo "Periodo de la vida: Infantil";
            break;
        case ($edad >= 12 && $edad <= 20):
            echo "Periodo de la vida: Adolescente";
            break;
        case ($edad >= 21 && $edad <= 65):
            echo "Periodo de la vida: Adulto";
            break;
        default:
            echo "Periodo de la vida: Tercera edad";
            break;
    }
    ?>

    <h3>24</h3>
    <p>
        24.
        Crear un script PHP asigna a variables un nombre del usuario y un número entero. Luego muestre el nombre del usuario en tantas líneas como indique el número.
    </p>
    <?php
    $numero = rand(0, 10);
    $nombre = "pepe";

    for ($i = 0; $i <= $numero; $i++) {
        echo $nombre . "<br>";
    }

    ?>

    <h3>25</h3>
    <p>
        Crea un script PHP que asigna a una variable el nombre del usuario y luego muestre la cadena El nombre < nombre> tiene < n> letras
    </p>

    <?php
    $nombre = "pepe";
    $numLetras = strlen($nombre);

    echo " el nombre $nombre tiene $numLetras "

    ?>

    <h3>26</h3>
    <p>
        Crea un script PHP que asigna a tres variables números enteros aleatorios y los muestra en orden ascendente. Además mostrará también si la generación aleatoria fue en orden.
    </p>
    <?php
    // Generar tres números aleatorios entre 1 y 100
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    $num3 = rand(1, 100);

    // Mostrar los números generados
    echo "Números generados: $num1, $num2, $num3<br>";

    // Verificar si fueron generados en orden ascendente
    if ($num1 <= $num2 && $num2 <= $num3) {
        echo "Los números fueron generados en orden ascendente.<br>";
    } else {
        echo "Los números no fueron generados en orden ascendente.<br>";
    }

    // Colocar los números en un array para ordenarlos
    $numeros = array($num1, $num2, $num3);

    // Ordenar el array en orden ascendente
    sort($numeros);

    // Mostrar los números en orden ascendente
    echo "Números en orden ascendente: $numeros[0], $numeros[1], $numeros[2]";
    ?>

    <h3>27</h3>
    <p>
        Crear un script PHP que asigna a una variable una nota entre 0 y 10. Luego, transforma la nota en una calificación y muestra el resultado.
    </p>

    <?php
    $nota = rand(0, 10);

    switch (true) {
        case ($nota >= 0 && $nota < 5):
            echo "suspenso";
            break;
        case ($nota >= 5 && $nota <= 6):
            echo "aprobado";
            break;
        case ($nota > 6 && $nota <= 8):
            echo "notable";
            break;
        case ($nota > 8 && $nota <= 10):
            echo "sobresaliente";
            break;
        default:
            echo "invalida";
            break;
    }
    ?>

    <h3>28</h3>
    <p>
        Crea un script PHP que asigna dos números enteros positivos a dos variables, X y N. A continuación calcula y muestra la potencia N de X. (No utilizar el operador de potencia).
    </p>

    <?php
    // Asignar valores a las variables X y N
    $x = 5;
    $n = 3;

    // Inicializar la variable para almacenar el resultado
    $resultado = 1;

    // Calcular X^N usando un bucle
    for ($i = 1; $i <= $n; $i++) {
        $resultado *= $x;
    }

    // Mostrar el resultado
    echo "$x elevado a la $n es igual a $resultado.";
    ?>


    <h3>29</h3>
    <p>
        Para pagar impuestos es necesario que las personas sean mayores de 16 años y tengan un sueldo superior a 1000€ al mes. Crear un script PHP que asigne a una variable un nombre y asigna aleatoriamente una edad y un sueldo anual. A continuación muestra si se deben pagar impuestos.
    </p>

    <?php
    $nombre = "pepe";
    $edad = rand(0, 80);
    $salario = rand(0, 5000);
    if ($edad >= 18 && $salario >= 1000) {
        echo "debes pagar impuestos ";
    } else {
        echo "no debes pagar impuestos aun";
    }
    ?>

    <h3>30</h3>
    <p>
        Crear un script PHP que obtenga el producto de dos números enteros positivos mediante sumas sucesivas.
    </p>

    <?php
    $numero = 5;
    $producto = 0;

    for ($i = 0; $i < $numero; $i++) {
        $producto += $i;
    }
    echo $producto;
    ?>


    <h3>31</h3>
    <p>
        Crear un script PHP que obtenga el cociente y el resto de dos números enteros positivos mediante restas sucesivas.
    </p>

    <?php
    // Definir los números
    $dividendo = 17;
    $divisor = 3;

    // Verificar que el divisor no sea cero
    if ($divisor == 0) {
        echo "El divisor no puede ser cero.";
        exit();
    }

    // Inicializar el cociente y el resto
    $cociente = 0;
    $resto = $dividendo;

    // Realizar restas sucesivas
    while ($resto >= $divisor) {
        $resto -= $divisor;
        $cociente++;
    }

    // Mostrar los resultados
    echo "Cociente: " . $cociente . "\n";
    echo "Resto: " . $resto . "\n";
    ?>

    <h3>32</h3>
    <p>
        Crear un script PHP que muestre la tabla de multiplicación de un número entero positivo entre 1 y 10 obtenido aleatoriamente.
    </p>
    <?php
    $numero = rand(1, 10);
    for ($i = 0; $i <= 10; $i++) {
        $resu = $numero * $i;
        echo "$numero x $i = $resu <br>";
    }

    ?>

    <h3>33</h3>
    <p>
        Crear un script PHP que muestre la lista de intereses y el capital acumulado producido cada año por un capital inicial C, con un interés anual R durante N años. El interés obtenido anualmente se calcula con la fórmula:
        Supongamos que el capital inicial es 1.000.000€, el interés anual del 4% y seaplica durante 20 años. El capital se incrementa con el interés producido cada año
    </p>

    <?php
    // Definir los valores iniciales
    $capital_inicial = 1000000; // 1.000.000 €
    $interes_anual = 0.04; // 4%
    $anios = 20; // 20 años

    // Variables para guardar el capital y mostrar los resultados
    $capital_acumulado = $capital_inicial;

    echo "Año\tInterés producido\tCapital acumulado\n";
    echo "--------------------------------------------------\n";

    // Bucle para calcular los intereses y el capital acumulado cada año
    for ($i = 1; $i <= $anios; $i++) {
        $interes_anual_producido = $capital_acumulado * $interes_anual;
        $capital_acumulado += $interes_anual_producido;

        // Mostrar los resultados
        echo $i . "\t" . number_format($interes_anual_producido, 2, ',', '.') . "€\t\t" . number_format($capital_acumulado, 2, ',', '.') . "€\n";
    }
    ?>


    <h3>34</h3>
    <p>
        Crear un script PHP que asigna a variables dos números enteros positivos N y M, y luego calcule y muestre los múltiplos de N menor que M.
    </p>

    <?php
    // Asignar valores a las variables N y M
    $N = 7;  // Número entero positivo N
    $M = 50; // Límite superior M

    // Verificar que los números sean positivos
    if ($N <= 0 || $M <= 0) {
        echo "N y M deben ser números enteros positivos.";
        exit();
    }

    echo "Múltiplos de $N menores que $M:\n";

    // Calcular y mostrar los múltiplos de N menores que M
    for ($i = 1; $i * $N < $M; $i++) {
        echo $i * $N . "\n";
    }
    ?>

    <h3>35</h3>
    <p>
        Crear un script PHP que calcule y muestre el factorial de un número.
    </p>

    <?php
    // Definir el número para el que se va a calcular el factorial
    $numero = 5; // Puedes cambiar este valor por cualquier otro número entero positivo

    // Verificar que el número sea no negativo
    if ($numero < 0) {
        echo "El factorial no está definido para números negativos.";
        exit();
    }

    // Inicializar la variable del factorial
    $factorial = 1;

    // Calcular el factorial
    for ($i = 1; $i <= $numero; $i++) {
        $factorial *= $i;
    }

    // Mostrar el resultado
    echo "El factorial de $numero es: $factorial\n";
    ?>

    <h3>36</h3>
    <p>
        Crear un script PHP que genera aleatoriamente 15 veces un número y muestre un mensaje si el número es divisible por 2, por 3 o por ninguno de ellos.
    </p>
    <?php
    for ($i = 0; $i < 15; $i++) {
        $numero = rand(0, 100);
        if ($numero == 0) {
            echo "el numero $numero es 0 <br>";
        } elseif ($numero % 2 == 0) {
            echo "el numero $numero es par <br>";
        } else {
            echo "el numero $numero es impar <br>";
        }
    }
    ?>

    <h3>37</h3>
    <p>
        Crear un script PHP que genera aleatoriamente un color RGB en hexadecimal. Mostrar el resultado con ese color de fondo y el texto “Este es el color generado aleatoriamente”. ¡Cuidado! El texto debe poder verse en el color de fondo.
    </p>

    <?php
    // Generar un color RGB aleatorio en formato hexadecimal
    $rojo = dechex(rand(0, 255));
    $verde = dechex(rand(0, 255));
    $azul = dechex(rand(0, 255));

    // Asegurarse de que los valores hexadecimales tengan dos caracteres
    $rojo = str_pad($rojo, 2, "0", STR_PAD_LEFT);
    $verde = str_pad($verde, 2, "0", STR_PAD_LEFT);
    $azul = str_pad($azul, 2, "0", STR_PAD_LEFT);

    // Combinar los valores para formar el color hexadecimal
    $color_hex = "#$rojo$verde$azul";

    // Función para calcular la luminosidad y determinar si el texto debe ser claro u oscuro
    function calcularLuminosidad($r, $g, $b)
    {
        return (0.299 * $r + 0.587 * $g + 0.114 * $b);
    }

    // Calcular la luminosidad del color generado
    $luminosidad = calcularLuminosidad(hexdec($rojo), hexdec($verde), hexdec($azul));

    // Determinar si el texto debe ser blanco o negro según la luminosidad del color
    $color_texto = $luminosidad > 128 ? '#000000' : '#FFFFFF';

    ?>

    <h3>38</h3>
    <p>
        Crear un script PHP que muestre los cuadrados y cubos de dos números enteros generados aleatoriamente y con una diferencia entre ellos menor de 20.
    </p>
    <?php
    // Generar el primer número aleatorio entre 1 y 100
    $num1 = rand(1, 100);

    // Generar el segundo número aleatorio, asegurándose de que la diferencia con el primero sea menor a 20
    do {
        $num2 = rand(1, 100);
    } while (abs($num1 - $num2) >= 20);

    // Calcular los cuadrados y cubos de ambos números
    $cuadrado_num1 = $num1 * $num1;
    $cubo_num1 = $num1 * $num1 * $num1;

    $cuadrado_num2 = $num2 * $num2;
    $cubo_num2 = $num2 * $num2 * $num2;

    // Mostrar los resultados
    echo "Número 1: $num1\n";
    echo "Cuadrado de $num1: $cuadrado_num1\n";
    echo "Cubo de $num1: $cubo_num1\n\n";

    echo "Número 2: $num2\n";
    echo "Cuadrado de $num2: $cuadrado_num2\n";
    echo "Cubo de $num2: $cubo_num2\n";
    ?>

    <h3>39</h3>
    <p>
        Crear un script PHP que genera hasta un máximo de 100 números aleatorios o hasta la suma de sus cuadrados sea mayor que 10.000 y menor que 11.000. Al final, que muestre también cuántos de ellos son impares.
    </p>

    <?php
    // Inicializar variables
    $suma_cuadrados = 0;
    $contador_numeros = 0;
    $numeros_impares = 0;
    $numeros_generados = [];

    // Generar hasta un máximo de 100 números
    while ($contador_numeros < 100 && ($suma_cuadrados <= 10000 || $suma_cuadrados >= 11000)) {
        // Generar un número aleatorio entre 1 y 100
        $numero = rand(1, 100);

        // Calcular el cuadrado del número y sumarlo a la suma de cuadrados
        $suma_cuadrados += $numero * $numero;

        // Guardar el número en un array para mostrarlo al final
        $numeros_generados[] = $numero;

        // Contar si el número es impar
        if ($numero % 2 != 0) {
            $numeros_impares++;
        }

        // Incrementar el contador de números
        $contador_numeros++;

        // Detener si la suma de cuadrados está dentro del rango deseado
        if ($suma_cuadrados > 10000 && $suma_cuadrados < 11000) {
            break;
        }
    }

    // Mostrar los resultados
    echo "Números generados:\n";
    echo implode(', ', $numeros_generados) . "\n\n";

    echo "Suma de los cuadrados: $suma_cuadrados\n";
    echo "Cantidad de números generados: $contador_numeros\n";
    echo "Cantidad de números impares: $numeros_impares\n";
    ?>


    <h3>40</h3>
    <p>
        Crear un script PHP que genera números aleatorios entre 1 y 100 números que hasta uno que tenga raíz cuadrada entera. Mostrar todos los números con sus raíces cuadradas.
    </p>
    <?php
    // Inicializar variables
    $numeros_generados = [];
    $raiz_entera_encontrada = false;

    // Bucle para generar números aleatorios hasta encontrar uno con raíz cuadrada entera
    while (!$raiz_entera_encontrada) {
        // Generar un número aleatorio entre 1 y 100
        $numero = rand(1, 100);

        // Calcular la raíz cuadrada del número
        $raiz_cuadrada = sqrt($numero);

        // Guardar el número y su raíz cuadrada en el array
        $numeros_generados[] = [
            'numero' => $numero,
            'raiz_cuadrada' => $raiz_cuadrada
        ];

        // Verificar si la raíz cuadrada es entera
        if ($raiz_cuadrada == floor($raiz_cuadrada)) {
            $raiz_entera_encontrada = true;
        }
    }

    // Mostrar todos los números generados y sus raíces cuadradas
    echo "Números generados:\n";
    foreach ($numeros_generados as $dato) {
        echo "Número: " . $dato['numero'] . " - Raíz cuadrada: " . $dato['raiz_cuadrada'] . "\n";
    }

    echo "\nNúmero con raíz cuadrada entera encontrado: " . $numero . "\n";
    ?>


    <br><br><br><br><br>
    <hr>
    <p>Fin del script</p>
</body>

</html>