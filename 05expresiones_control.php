<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expresiones de control</title>
    <noscript>no eres compatible</noscript>
</head>
<body>
    <h1>Expresiones de control</h1>
    <p>las expresiones simples acaban en ;, pudiendo haber mas de una en la misma linea</p>
    
<?php
    $numero = 3; echo "el numero es $numero"; print "ahora es $numer<br";
?>
    <p>un bloque de sentencia es un conjunto de sentencias encerrados entre llaves. no suelen ir solas si no que forman parte de una estrucctura de control, pero pueden ir solas. ademas se pueden anidar.</p>
<?php
    {
        $numero = 5;
        echo "el numero es $numero<br>";
        $numero = 2;
        echo "ahora es $numero<br>";
        {
            $numero = 8;
            echo "ahora es $numero<br>";
            $numero *= 2;
            echo "ahora es $numero<br>";

        }
        echo "el numero es $numero <br>";
    }
?>

    <h2>estruccturas de control simple</h2>

<?php
    // if (expresion) sentencia; 
    $numero = 4;
    if ($numero == 4) {
        echo "El numero es 4, $numero <br>";
    }
?>
</body>
</html>