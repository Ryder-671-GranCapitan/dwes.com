<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>funciones</title>
</head>

<body>
    <h1>Basico</h1>

    <h2>1</h2>
    <p>
        Desarrollar una función que reciba como parámetros dos números y devuelva un valor lógico que indique si el primer número es divisible por el segundo.
    </p>

    <?php

    function divisiblePor($num1, $num2): bool
    {
        if ($num1 % $num2 == 0) {
            return true;
        } else {
            return false;
        }
    }

    if (divisiblePor(4, 2)) {
        echo "El número 4 es divisible por 2.";
    } else {
        echo "El número 4 no es divisible por 2.";
    }

    ?>

    <h2>2</h2>
    <p>
        Desarrollar una función que tenga un parámetro entero y devuelva la letra P si el número es positivo, O si el número es cero o N si el número es negativo.
    </p>

    <?php

    function postivoNegativoCero($num1): string
    {

        if ($num1 >= 1) {
            return "P";
        } elseif ($num1 == 0) {
            return "O";
        } else {
            return "N";
        }
    }

    echo postivoNegativoCero(10)

    ?>

    <h2>3</h2>
    <p>
        Desarrollar una función que devuelva un valor lógico y tenga dos parámetros. Si el primer parámetro es divisible por el segundo, devuelve Verdadero, Falso en caso contrario.
    </p>

    <?php
    // función del primer ejercicio

    if (divisiblePor(4, 2)) {
        echo "El número 4 es divisible por 2.";
    } else {
        echo "El número 4 no es divisible por 2.";
    }

    ?>


    <h2>4</h2>
    <p>
        Desarrollar una función lógica llamada es_dígito() que determine si un carácter recibido como parámetro es un dígito numérico.
    </p>

    <?php
    function esDigito($num1): bool
    {
        return is_numeric($num1) ? true : false;
    }

    if (esDigito("t")) {
        echo "Es digito";
    } else {
        echo "no es digito";
    }


    ?>

    <h2>5</h2>
    <p>
        Desarrollar una función lógica llamada es_vocal() que determine si un carácter recibido como parámetro es una letra vocal.
    </p>



    <?php
    function esVocal($char): bool
    {
        $vocales = ['a', 'e', 'i', 'o', 'u'];

        return in_array(strtolower($char), $vocales) ? true : false;
    }

    if (esVocal("A")) {
        echo "Es vocal";
    } else {
        echo "no es vocal";
    }


    ?>


    <h2>6</h2>

    <p>
        Desarrolla una función que reciba como parámetros tres números que representen el salario bruto, el porcentaje de IRPF y el porcentaje de seguridad social. Luego devuelve el salario neto. Si no se incluye IRPF o porcentaje de seguridad social su valor por defecto es 20% y 15% respectivamente.
    </p>

    <?php
    function salarioNeto($salarioBruto, $irpf = 20, $seguridadSocial = 15): float
    {
        $irpfDescuento = ($salarioBruto * $irpf) / 100;
        $seguridadSocialDescuento = ($salarioBruto * $seguridadSocial) / 100;
        return $salarioBruto - $irpfDescuento - $seguridadSocialDescuento;
    }

    echo "El salario neto es: " . salarioNeto(2000);

    ?>

    <h2>7</h2>
    <p>
        Repetir la función anterior pero tiene que devolver el salario neto, el importe de IRPF y el importe de la seguridad social.
    </p>

    <?php
    function salarioNetoDetalles($salarioBruto, $irpf = 20, $seguridadSocial = 15): array
    {
        $irpfDescuento = ($salarioBruto * $irpf) / 100;
        $seguridadSocialDescuento = ($salarioBruto * $seguridadSocial) / 100;
        $salarioNeto = $salarioBruto - $irpfDescuento - $seguridadSocialDescuento;
        return [
            'salario_neto' => $salarioNeto,
            'irpf' => $irpfDescuento,
            'seguridad_social' => $seguridadSocialDescuento
        ];
    }

    $resultado = salarioNetoDetalles(2000);
    echo "El salario neto es: " . $resultado['salario_neto'] . "<br>";
    echo "El importe de IRPF es: " . $resultado['irpf'] . "<br>";
    echo "El importe de la seguridad social es: " . $resultado['seguridad_social'];

    ?>

    <h2>8</h2>
    <p>
        Desarrolla una función que reciba como parámetros el radio de una circunferencia, luego muestre el área del círculo y finalmente devuelva la longitud de la circunferencia.
    </p>

    <?php

    function areaLongitudCirculo($radio): array
    {
        $area = pi() * pow($radio, 2);
        $longitud = 2 * pi() * $radio;

        return [
            'area' => $area,
            'longitud' => $longitud
        ];
    }

    $result = areaLongitudCirculo(5);
    echo "area: " . round($result['area'], 2) . "<br>";
    echo "longitud: " . round($result['longitud'], 2) . "<br>";


    ?>

    <h2>9</h2>
    <p>
        Desarrolla una función que calcule el área de un triángulo. Para ello, recibe como parámetros la base y la altura del triángulo. Finalmente, devuelve el área calculada.
    </p>

    <?php

    function areaTriangulo($base, $altura): int
    {
        $area = ($base * $altura) / 2;
        return $area;
    }

    $resu = areaTriangulo(5, 10);

    echo "area del triangulo: $resu";

    ?>

    <h2>10</h2>
    <p>
        Desarrolla una función que calcule el área de un círculo y otra que calcule el volumen de un cilindro utilizando la primera.
    </p>


    <?php
    function areaCirculo($radio): float
    {
        return pi() * pow($radio, 2);
    }

    function volumenCilindro($radio, $altura): float
    {
        $areaBase = areaCirculo($radio);
        return $areaBase * $altura;
    }

    $area = areaCirculo(5);
    $volumen = volumenCilindro(5, 10);

    echo "Área del círculo: " . round($area, 2) . "<br>";
    echo "Volumen del cilindro: " . round($volumen, 2) . "<br>";

    ?>

    <h2>11</h2>
    <p>
    Desarrolla una función que convierta un número decimal en binario.
    
    </p>

    <?php
    
    function decimalToBinario($decimal) : int {
        $binario = decbin($decimal);
        return $binario;
    }

    echo "decimal to binario: " . decimalToBinario(45);
    
    
    ?>

<h2>12</h2>
    <p>
    Desarrolla una función que convierta un número binario en decimal.    
    </p>

    <?php
    
    function binarioToDecimal($binario) : int {
        $decimal = bindec($binario);
        return $decimal;
    }

    echo "decimal to binario: " . binarioToDecimal(11100);
    
    
    ?>




































    <br><br><br><br><br><br><br><br><br><br>
</body>

</html>