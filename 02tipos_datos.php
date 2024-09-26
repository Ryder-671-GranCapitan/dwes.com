
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
    <h1>Tercer script</h1>

    <h2>tipos de datos en php</h2>
    <p>
        estos datos son escalares(prinitivos)
    </p>
    <ul>
        <li>booleanos</li>
        <li>numerico entero</li>
        <li>en coma flotante</li>
        <li>cadena de caracteres</li>
    </ul>

    <p>datos compuestos </p>

    <ul>
        <li>arrays</li>
        <li>objetos</li>
        <li>callable (nombres de funcion o metodos, todo lo invocable)</li>
        <li>iterable(elemento recorrible)</li>
        
    </ul>

    <p>tipos especiales </p>
    <ul>
        <li>resource (puntero a archivo)</li>
        <li>NULL</li>
    </ul>

    <h2>boolean</h2>
    <p>inicialmente las constantes True y False. sin embargo otro tipos de datos tiene conversion inplicita al tipo booleano</p>
    <ul>
        <li>numerico entero 0 y el -0False. Cualquier otra cosa es true</li>
        <li>numerico en coma flotante 0.0 y el -0.0False. otro valor es True</li>
        <li>una array con 0 elementos es False. con elementos es True</li>
        <li>el tipo especial es NULL es false, otro elemento es True</li>
        <li>una variable no definida es False </li>
    </ul>

<?php
    $valor_booleano = true;
    $edad = 20;
    $mayor_edad = $edad > 18;

    echo "mayor de edad es booleano:" . is_bool($mayor_edad);

    $dinero = 0;
    if ($dinero ) {
        // equivale a si $dinero != de 0
        // por lo que podria darse -50 dinero y aun asi saltaria la frase
        echo "soy rico";
    }
    else echo "estoy arruinado< br>";

?>

    <h2>Enteros</h2>
    <p>numeros enteros en php son de 32 bits. pueden expresarse en diferentes notaciones</p>

<?php
    $numero_entero = 123;
    $numero_negativo = -123;
    echo " $numero_entero  $numero_negativo";

    $numero_octal = 0123;
    echo "0123 es en octal $numero_octal <br>";

    echo "el numero $numero_octal en octal es: " .decoct($numero_octal) . "<br>";

    $numero_hexadecimal = 0x8ae;
    echo "el numero hexadecimal 0x8ae es $numero_hexadecimal <br>";
    echo "el numero hexadecimal $numero_hexadecimal en hexadecimal es :" . dechex($numero_hexadecimal) . "<br>";

    $numero_binario = 0b110101;
    echo "el numero binario 0x8ae es $numero_binario <br>";
    echo "el numero binario $numero_binario en hexadecimal es :" . decbin($numero_binario) . "<br>";
?>

    <h2>Numeros en punto flotante</h2>
    <p>el separador decimal es el . y se pueden expresar numeros muy grandes o muy pequeños mediante la notacion cientifica con base 10</p>

<?php
    $pi = 3.14159;
    echo "el numero pi es $pi <br>";
    echo "el numero pi es $pi redondeado es " . round($pi,2) . "<br>";
    

    $inf_int = 7.9e13;
    echo "informacion que circula en internet en un dia $inf_int <br>";

    $inf_int = 0.2e-9;
    echo "negativo muy muy pequeño $inf_int <br>";

?>

    <h2>cadena de caracteres</h2>
    <p>un string o cadena es una serie de caracteres donde cada caracter equivale a un byte. esto significa que php solo admite 256 caractares. por lo que no ofrece soporte nativo a utf8. un literal de tipo string se expresa de 4 formas</p>

    <ul>
        <li>comillas simples</li>
        <li>comillas dobles</li>
        <li>heredox</li>
        <li>nowdoc</li>
    </ul>
    
    <h3>comillas simples</h3>
<?php
    //una cadena encerrada entre comillas simples
    //solo admite el caracter de escape \'

    echo 'esto es una cadena sencilla<br>';
    echo 'esto es una cadena sencilla
            si quiero puede
            ser en varias lineas<br>';

    //no se reconocen caracteres de escape excepto ' \
    echo 'el mejor pub de la ciudad es 0\'donlet<br>';
    echo 'la raiz del disco duro es C:\\<br>';

    //el salto de linea no se exapnde
    echo 'la raiz del disco \n duro es C:\\<br>';

    //no interpola variables 
    echo 'mi edad es $edad<br>' ;


?>

    <h3>comillas dobles</h3>
    <p>la forma habitual de expresar cadenas de caracteres ya que expande los caracteres de escape y las variables</p>
<?php

    $cadena = " esto es una cadena con comillas dobles";
    echo "es una cadena de un objeto?" . is_object($cadena) . "<br>";

    if (is_object($cadena)) echo "de echo las candeas son objetos";
    else echo "de echo no es una cadena";
    
    $con_secuencias = "\t\ el simbolo \$ se emplea para as variables \n y 
    si lo quieres en una cadena que escaparlo con \\ mejor usar \"para 
    delimitar cadenas";

    echo $cadena;
?>

    <h3>cadenas HEREDOC</h3>
    <p>
        es una cadena muy larga que empieza con <<< le sigue un identificador  y justo despues un salto de linea.
        a continuacion se escribe la cadena con los saltos de linea que necesitemos, podemos interpolar variables y 
        poner caracteres de escape. para terminar hay que hacer un salto de linea y volver a poner el identificador
    </p>

<?php
    $cadena_hd = <<<HD
    esto es una cadena heredoc 
    que respeta los saltos de liena
    que respeta variables $edad
    ademas secuencias de escape 
    el identificador no neceista \$
    y tampoco usamos \"
    simplemente acabamos con un salto de linea 
    mas el identificador <br>
    HD;

    echo $cadena_hd
?>

    <h3>cadena NOWDOW</h3>
    <p>
        la cadena nowdow es como la cadena heredoc con comillas simples
        no se interpolan variables ni se reconocen secuencias de escape mas alla de \\'
    </p>
<?php
    $cadena_nd = <<<'ND'
    esto es ununa cadena no NOWDOW 
    y el salto de linea no lo respeta
    no puedo meter variables
    y solo reconoce \\ y \'. <br>
    ND;

    echo $cadena_nd
?>


    <h2>conversiones de tipos de datos</h2>
    <p>
        hay dos tipos de conversion. las implicitas y las explicitas
        las implicitas ocurren cuando en una expresion hay operandos de diferente tipo. php convierte algunos de ellos para evaluar la expresion
    </p>
<?php
    $cadena = "25";
    $numero = 8;
    $booldeano = true;
    $resultado = $cadena + $numero + $booldeano;

    echo $resultado . "<br>";
?>
    <p>
        IMPORTANTE
        cuando se hace una conversion implicita solo afecta al operando pero no a la variable
        es decir. la conversion de cadena a entero solamente para evaluar la expresion
        pero cadena sigue siendo de tipo STRING 
    </p>

<?php
    $flotante = 3.5;
    $resultado = $cadena + $flotante + $numero + $booldeano;
    echo $resultado . "<br>";

    $cadena = "25 marranos dan mucho problema";
    $resultado = $numero + $cadena;
    echo $resultado;

    
?>


    <p>
        las conversiones explicitas se conocen como casting o moldeo y se hacen 
        precediendo la expresion con el tipo de datos a convertir entre parentesis
    </p>

<?php
    //si quiero convertir a entero -> (int)expresion
    //si quiero convertir a floar -> (float)expresion
    //si quiero convertir a string -> (string)expresion

    $valor_booleano = true;
    $valor_convertido = (int)$valor_booleano;

    echo "el valo convertido es $valor_convertido";

    $valor_float = 3.1258;
    $valor_convertido = (int)$valor_float;
    echo "el valor convertido es".$valor_convertido . "<br>";

    $valor_cadena = "12345";
    $valor_convertido = (int)$valor_cadena;
    echo "el valor convertido es ".$valor_convertido . "<br>";
?>














    <hr>
    <p>Fin del script</p>
</body>
</html>