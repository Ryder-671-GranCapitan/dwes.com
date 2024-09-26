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
    <h1>Segundo script</h1>
    <h2>entrada y salia </h2>
    <p>
        la entrada de datos en PHP es con un formulario html o con un enlace. 
        la salida de datos se produce con la funcion echo y su forma abreviada, y la funcion print.
        ademas para salida de datos con formato tenemos printf
    </p>
    <h3>funcion echo</h3>
<?php
    echo "<p>la funcion echo emite el resultado del aexpresion a la salida. se puede usar com funcion como contruccion del lenguaje(sin parenteis)</p>";
    echo "<p>esto es un parrafo HTML enviado por echo</p>";

    $nombre = "juan";
    echo "hola ", $nombre, "como estas? <br>";
    //echo ("hola ", $nombre, "como estas? <br>"); no sirve, hay mas de un argumento

    //quiero un salto de linea al final de la lunea
    echo "hola ", $nombre, " como estas?  con salto de linea<br>\n ves, he saltado de liena en el codigo";

    $nombre = "pepe";
    $apellidos = "rider";

    echo "<br> mi nombre es $nombre y mi apellido $apellidos";

    echo "<br> mi nombre es " . $nombre . " y mi apellido es " . $apellidos;

    echo "<br> uno mas dos es: ", 1+2 , " debe ser 3";
    //el operador . NO tiene precedencia sobre el operador +

    echo "<br> uno mas dos es: ". 1+2.3 . " debe ser 3";

    echo"<h4> forma abreviada de echo</h4>";
    echo "<p>cuando hay que enviar a la salida el resultado de una expresion pequeña 
            disponemos de la forma abreciada de echo que permite intercalarse con el codigo html con menos esfuerzo </p>";

    $tiene_portatil = True;

?>
    <!-- Forma abreviada de echo --->
    <?= $nombre . " " . $apellidos ?>

    <!-- uso habitual Valores de formulario por defecto --->
    <input type="text" name="nombre" size="15" value="<?=$nombre ?>"> <br>

    <input type="checkbox" name="portatil" <?= $tiene_portatil ? 'cheked' : ''?>> es portaril?

    <input type="text" name="apellido" size="15" value="<?=$apellidos ?>"> <br>

    <!-- rafa consejo: las cadenas en pho con "" y en html con '' --->




    <h3>funcion print</h3>

<?php 
    print "esto es una cadena con print";    
?>

    <h3>funcion printf</h3>
<?php 
    $pi = 3.14;
    $radio  = 3;
    $circunferencia = 2 * $pi * $radio;
    printf("<br> la circunferencia de radio %d es %.2f",$radio, $circunferencia);
    
?>
    <h2>tipos de datos</h2>


<hr>
<p>Fin del script</p>
</body>
</html>