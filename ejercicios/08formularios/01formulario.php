<?php

/*
Crear un script PHP que presente un formulario donde se introduce un número entero y devuelve una respuesta con el número convertido en varios sistemas: binario, octal, hexadecimal, decimal.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");


inicio_html("Numero entero a sistemas de numeración", ["/estilos/formulario.css", "/estilos/general.css", "/estilos/tabla.css"]);


// en la peticion POST recibimos los datos de los formularios
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //verificamos que hemos recibido los datos
    //plus de seguridad
    // enviar es el identificador del botón submit 
    if (isset($_POST['enviar'])) {
        echo "<h3>NO SE HAN ENVIADO LOS DATOS CORRECTOS</h3>";

        fin_html();
    }

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

    //guardo el array de respuestas
    $resu = sistemasNumeracion($_POST['numero']);
    //lo muestro enformato tabla
    if ($resu) {
        echo "<table border='1'>";
        foreach ($resu as $sistema => $valor) {
            echo "<tr><td>" . $sistema . "</td><td>" . $valor . "</td></tr>";
        }
        echo "</table>";
    }


} else {
?>
    <h2>1</h2>
    <p>
        Crear un script PHP que presente un formulario donde se introduce un número entero y devuelve una respuesta con el número convertido en varios sistemas: binario, octal, hexadecimal, decimal.
    </p>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="numero">Numero Entero:</label>
        <input type="number" name="numero" id="numero" min="0" size="3" value="15">
        
        <input type="submit" value="enviar">
    </form>

    <!-- Boton de envio -->


<?php
    fin_html();
}

?>