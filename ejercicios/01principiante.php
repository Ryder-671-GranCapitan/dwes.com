<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>01 Principiante</title>
</head>

<body>
    <h1>Ejercicios principiante</h1>
    <h2>Javier Rider Jimenez</h2>
    <h3>1.</h3>
    <p>
        Crea un script PHP que visualiza las siguientes magnitudes (utiliza un número en
        notación científica y elige una precisión diferente para cada dato):
    </p>

    <?php
    // Distancia de la Tierra al Sol en kilómetros
    $distanciaTierraSol = 1.496e8; // 1.496x10^8 km
    // Distancia de Plutón al Sol en kilómetros
    $distanciaPlutonSol = 5.9064e9; // 5.9064x10^9 km
    // Diámetro del Sol en kilómetros
    $diametroSol = 1.3914e6; // 1.3914x10^6 km

    // Mostrar resultados con %e para notación científica
    printf("Distancia de la Tierra al Sol: %.2e km\n <br>", $distanciaTierraSol);
    printf("Distancia de Plutón al Sol: %.4e km\n <br>", $distanciaPlutonSol);
    printf("Diámetro del Sol: %.1e km\n <br>", $diametroSol);
    ?>

    <h3>2</h3>
    <P>
        Crea un script PHP que declara tres variables de tipo entero y les asigna a cada una el número 989 en
        decimal, octal, hexadecimal y binaria.
    </P>
    <?php
    $n1 = 989;
    $n2 = 0o1745; //octal 
    $n3 = 0x3dd;
    $n4 = 0b1111011101;
    echo "$n1 $n2 $n3 $n4";
    ?>

    <h3>3</h3>
    <p>
        3.
        Crea un script PHP que muestre en pantalla (utiliza un número float en notación científica
        y elige una precisión diferente para ambos datos):
        • La cantidad de bits en una memoria RAM de 16 GB.
        • La población de la Tierra.
        • El tamaño de algún virus (20 nm).
    </p>
    <?php
    // Cantidad de bits en una memoria RAM de 16 GB (16 GB * 8 bits por byte * 1024^3 bytes)
    $cantidadBitsRAM = 16 * 8 * pow(1024, 3);

    // Población aproximada de la Tierra (en este caso, se estima en 8 mil millones de personas)
    $poblacionTierra = 8e9;

    // Tamaño de un virus (en nanómetros, 20 nm)
    $tamanoVirus = 20e-9; // Convertido a metros (ya que los nanómetros son 10^-9 metros)

    // Mostrar resultados con diferentes precisiones
    printf("Cantidad de bits en una memoria RAM de 16 GB: %.2e bits\n <br>", $cantidadBitsRAM);
    printf("Población de la Tierra: %.1e personas\n <br>", $poblacionTierra);
    printf("Tamaño de un virus: %.3e metros\n <br>", $tamanoVirus);
    ?>
    <h3>4</h3>
    <p>
        4.
        Crea un script PHP que muestre la cadena “Mi primer, y no único, ejercicio”, incluyendo las comillas dobles.
        Inicialmente la cadena se muestra directamente, luego utiliza una variable.
    </p>

    <?php
    echo "\"Mi primer, y no único, ejercicio\" <br>";

    $cadena = "\"Mi primer, y no único, ejercicio ahora en variable\"";
    echo $cadena;

    ?>

    <h3>5</h3>
    <p>
        5.
        Crea un script PHP que asigna un nombre de usuario a una variable y luego muestra la cadena
        ¡Hola nombre>! El nombre> es el nombre de usuario asignado a la variable.
    </p>

    <?php
    $nombre = "pepe";
    echo "!hola &lt;$nombre&gt;!"; //no hay otra manera de poner <> en especial <
    ?>

    <h3>6</h3>
    <p>
        6.
        Crea un script PHP que asigna el nombre de tu padre/madre y luego, muestre en pantalla la cadena ¡El nombre de mi padre/madre es <nombre>!.
    </p>

    <?php
    $papa = "Manolo";
    $mama = "Ana";

    echo "!hola &lt;$papa&gt; y &lt;$mama&gt!"; //no hay otra manera de poner <> en especial <
    ?>

    <h3>7</h3>
    <p>
        Crea un script PHP que calcule y muestre la siguiente operación aritmética

        (3+2 / 2*5)^2
    </p>
    <?php
    $ecuacion = ((3 + 2) / 2 * 5) ** 2;

    echo $ecuacion;
    ?>

    <h3>8</h3>
    <p>
        8.Crea un script PHP que declare las variables a, b y c con valores 3.5, 6 y 4.25 respectivamente. Luego calcule y muestre en pantalla la siguiente operación aritmética:
        (a+2/2⋅b)⋅(c-4/a/c)2
    </p>
    <?php
    $a = 3.5;
    $b = 6;
    $c = 4.25;

    $ecuacion = ((($a + 2) / (2 * $b)) * (($c - 4) / ($a / $c)) ** 2);

    echo $ecuacion;
    ?>

    <h3>9</h3>
    <p>
        Crea un script PHP asigna a dos variables un número de horas extra trabajadas y el salario por cada una. Luego, calcula y muestre en pantalla el salario con el símbolo monetario.
    </p>

    <?php
    $horas = 15;
    $salarioHora = 6.25;

    $salario = $horas * $salarioHora;
    echo "El salario total por horas extras es: $" . number_format($salario, 2) . "\$";
    ?>

    <h3>10</h3>
    <p>
        Crea un script PHP que asigna a una variable un número entero positivo y luego muestre la suma de números enteros desde 1 al número ingresado. Esta suma se puede calcular con la siguiente expresión:
    </p>


    <?php
    $n = 3.5;

    $ecuacion = ($n * ($n + 1)) / 2;

    echo $ecuacion;
    ?>

    <h3>11</h3>

    <p>
        Crea un script PHP que asigna a una variable tu peso en Kg y luego calcule el peso equivalente en onzas. Una onza son 28,3495 gramos.
    </p>

    <?php
    $peso = 61.5;

    // Convertir el peso a onzas
    $peso_onzas = ($peso * 1000) / 28.3495;

    // Mostrar el resultado
    echo "Tu peso en onzas es: " . number_format($peso_onzas, 2) . " onzas.";
    ?>

    <h3>12</h3>
    <p>
        Crea un script PHP que calcule y muestre cuántos bytes hay en un SSD de 64GB.
    </p>
    </p>

    <?php
    $ssd = 64;

    $bytes = (1024 ** 3) * 64;

    echo "tu capacidad en bytes es : $bytes";
    ?>

    <h3>13</h3>
    <p>
        Crea un script PHP que asigna a una variable un NIF sin la letra. Después calcula y muestra la letra correspondiente a él.
    </p>


    <?php
    $dni = 25619445;

    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";

    $indice = $dni % 23;

    // Obtener la letra correspondiente
    $letra = $letras[$indice];

    echo "El NIF completo es: " . $dni . $letra;
    ?>

    <h3>14</h3>
    <p>
        14.
        Crea un script PHP que calcule y muestre la cantidad de KB y bytes que hay en 5 MB.
    </p>

    <?php
    $mb = 5;

    $kb = $mb * 1024;
    $bytes = $kb * 1024;

    // Mostrar los resultados
    echo "En $mb MB hay $kb KB y $bytes bytes.";
    ?>

    <h3>15</h3>
    <p>
        Crea un script PHP que asigna a variables el peso (en Kg) y la altura (en metros). Luego, calcule el índice de masa corporal. Finalmente, muestre en pantalla el enunciado Tu índice de masa corporal es < imc>, donde < imc> es el índice de masa corporal calculado con dos dígitos decimales.
    </p>
    <?php
    $peso = 61.5;
    $altura = 1.60;

    // Convertir el peso a onzas
    $imc = $peso / ($altura * $altura);

    // Mostrar el resultado
    echo "Tu índice de masa corporal es " . number_format($peso_onzas, 2);
    ?>


    <h3>16</h3>
    <p>
        Crea un script PHP que asigna a variables dos números enteros y muestre en pantalla <n> dividido por <m> dé como resultado un cociente de <c> y el resto es <r>, donde <n> y <m> son los números introducidos, <c> es el cociente y <r> es el resto respectivamente.
    </p>

    <?php
    // Asignar dos números enteros a las variables
    $n = 10; // Cambia este valor por el primer número
    $m = 3;  // Cambia este valor por el segundo número

    // Calcular el cociente y el resto
    $cociente = intdiv($n, $m); // División entera
    $resto = $n % $m;           // Calcular el resto

    // Mostrar el resultado en el formato deseado
    echo "$n dividido por $m da como resultado un cociente de $cociente y el resto es $resto.";
    ?>

    <h3>17</h3>
    <p></p>

    <p>
        Crea un script PHP que asigna a una variable una temperatura en ºC y muestre en pantalla su equivalente en ºK y ºF.
    </p>

    <?php
    $celsius = 35;

    $kelvin = $celsius + 273.15;
    $fahrenheit = ($celsius * 9 / 5) + 32;

    // Mostrar los resultados
    echo "$celsius ºC es: $kelvin ºK y $fahrenheit ºf ";
    ?>

    <h3>18</h3>
    <p>
        Crea un script PHP que asina a variables el número de muñecos y el número de coches de juguete que hay en un paquete enviado por una agencia de transporte. Si un muñeco pesa 4 onzas y un coche de juguete pesa 2 libras, ¿cuánto pesa el paquete en Kg?
    </p>

    <?php
    // Asignar el número de muñecos y coches de juguete
    $munecos = 5; // Cambia este valor por el número de muñecos
    $coches = 3;  // Cambia este valor por el número de coches de juguete

    // Peso de un muñeco en onzas y coche de juguete en libras
    $peso_muneco_onzas = 4 * $munecos;  // Peso de un muñeco en onzas
    $peso_coche_libras = 2 * $coches;  // Peso de un coche de juguete en libras

    // Convertir el peso a kilogramos
    $peso_muneco_kg = $peso_muneco_onzas * 0.0283495;  // Convertir onzas a Kg
    $peso_coche_kg = $peso_coche_libras * 0.453592;    // Convertir libras a Kg

    // Calcular el peso total del paquete en Kg
    $peso_total = ($munecos * $peso_muneco_kg) + ($coches * $peso_coche_kg);

    // Mostrar el resultado
    echo "El peso total del paquete es: " . number_format($peso_total, 2) . " kg.";
    ?>

    <h3>19</h3>
    <p>
        Crea un script PHP que asigna a una variable una cantidad de dinero en € y muestre en pantalla su equivalente en $ y £.
    </p>

    <?php
    $euros = 35;

    $dolares = $euros * 0.84;
    $libras = $euros * 1.10;

    // Mostrar los resultados
    echo "$euros €: $dolares $ y $libras li £";
    ?>




    <br><br><br><br><br>
</body>

</html>