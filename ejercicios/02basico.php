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

    for ($i=0; $i < $numero; $i++) { 
            $producto += $i;
    }
    echo $producto;
    ?>
    <br><br><br><br><br>
    <hr>
    <p>Fin del script</p>
</body>

</html>