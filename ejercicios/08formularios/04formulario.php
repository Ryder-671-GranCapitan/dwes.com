<?php
/*
Crear un script para gestionar la configuración de un coche nuevo en el que se tiene
que elegir un modelo y una serie de características:
a) Crear un formulario para recoger los datos del vehículo y generar una respuesta
con todos los detalles del vehículo elegido, su precio desglosado y el precio total.
b) Si en el formulario se eligió pago financiado presentar el plan de pago que
consistirá en la cuota de entrada, todas las mensualidades (a ver quién se atreve a
poner las fechas de pago) y la cuota final.
*/

require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

$modelos = [
    "mo"        => array('nombre' => "Monroy", 'precio' => 20000),
    "mu"        => array('nombre' => "Muchopami", 'precio' => 21000),
    "za"        => array('nombre' => "Zapatoveloz", 'precio' => 22000),
    "gu"        => array('nombre' => "Guperino", 'precio' => 25500),
    "al"        => array('nombre' => "Alomejor", 'precio' => 29750),
    "te"        => array('nombre' => "Telapegas", 'precio' => 32550)
];

$motores = [
    "ga"        => array('nombre' => 'Gasolina', 'precio' => 0),
    "di"        => array('nombre' => 'Diesel', 'precio' => 2000),
    "hi"        => array('nombre' => 'Híbrido', 'precio' => 5000),
    "el"        => array('nombre' => 'Eléctrico', 'precio' => 10000)
];

$colores = [
    "gt"       => array('nombre' => 'Gris triste', 'precio' => 0),
    "rs"       => array('nombre' => 'Rojo sangre', 'precio' => 250),
    "rp"       => array('nombre' => 'Rojo pasión', 'precio' => 150),
    "an"       => array('nombre' => 'Azul noche', 'precio' => 175),
    "ca"       => array('nombre' => 'Caramelo', 'precio' => 300),
    "ma"       => array('nombre' => 'Mango', 'precio' => 275),
];

$extras = [
    "na"         => array('nombre' => 'Navegador GPS', 'precio' => 500),
    "ca"         => array('nombre' => 'Calefacción asientos', 'precio' => 250),
    "ti"         => array('nombre' => 'Antena aleta tiburón', 'precio' => 50),
    "sl"         => array('nombre' => 'Acceso y arranque sin llave', 'precio' => 150),
    "ap"         => array('nombre' => 'Arranque en pendiente', 'precio' => 200),
    "ci"         => array('nombre' => 'Cargador inalámbrico', 'precio' => 300),
    "cc"         => array('nombre' => 'Control de crucero', 'precio' => 500),
    "am"         => array('nombre' => 'Detector ángulo muerto', 'precio' => 350),
    "fl"         => array('nombre' => 'Faros led automáticos', 'precio' => 400),
    "fe"         => array('nombre' => 'Frenada de emergencia', 'precio' => 375)
];

$forma_pago = [
    "co"         => array('nombre' => 'Contado', 'meses' => 0),
    "2a"         => array('nombre' => 'Financiado 2 años', 'meses' => 24),
    "5a"         => array('nombre' => 'Financiado 5 años', 'meses' => 60),
    "10a"         => array('nombre' => 'Financiado 10 años', 'meses' => 120)
];


// funcion para sanear y validar los datos del formulario
function validarPresupuesto($modelos, $motores, $colores, $extras, $forma_pago)
{
    $opciones_filtrado = [
        'nombre' => FILTER_SANITIZE_SPECIAL_CHARS,
        'tlf' => FILTER_SANITIZE_NUMBER_INT,
        'modelo' => FILTER_SANITIZE_SPECIAL_CHARS,
        'motor' => FILTER_SANITIZE_SPECIAL_CHARS,
        'colores' => FILTER_SANITIZE_SPECIAL_CHARS,
        'extras' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            FILTER_REQUIRE_ARRAY,
            'flags' => FILTER_REQUIRE_ARRAY
        ],
        'forma_pago' => FILTER_SANITIZE_SPECIAL_CHARS
    ];

    $datos_saneados = filter_input_array(INPUT_POST, $opciones_filtrado);

    $nombre = isset($datos_saneados['nombre']) ? $datos_saneados['nombre'] : false;
    $telefono = isset($datos_saneados['tlf']) && preg_match("/[0-9]{9}/", $datos_saneados['tlf']) ? $datos_saneados['tlf'] : false;
    $modelo = isset($datos_saneados['modelo']) && array_key_exists($datos_saneados['modelo'], $modelos) ? $datos_saneados['modelo'] : false;
    $motor = isset($datos_saneados['motor']) && array_key_exists($datos_saneados['motor'], $motores) ? $datos_saneados['motor'] : 'ga'; // si no recibe un motor valido se le asigna gasolina
    $color = isset($datos_saneados['colores']) && array_key_exists($datos_saneados['colores'], $colores) ? $datos_saneados['colores'] : false;
    $extras_seleccionados = isset($datos_saneados['extras']) && is_array($datos_saneados['extras']) ? array_filter($datos_saneados['extras'], function ($extra) use ($extras) {
        return array_key_exists($extra, $extras);
    }) : [];
    $forma_pago_seleccionada = isset($datos_saneados['forma_pago']) && array_key_exists($datos_saneados['forma_pago'], $forma_pago) ? $datos_saneados['forma_pago'] : $datos_saneados['forma_pago'] = 'co'; // si no recibe una forma de pago valida se le asigna contado

   //antes de terminar la validación. procesamos el archivo
    $archivoSubido = guardarArchivo();


    // si todos los campos son validos se devuelven
    if ($nombre && $telefono && $modelo && $motor && $color && $forma_pago_seleccionada && $archivoSubido) {
        return [
            'nombre' => $nombre,
            'tlf' => $telefono,
            'modelo' => $modelo,
            'motor' => $motor,
            'colores' => $color,
            'extras' => $extras_seleccionados,
            'forma_pago' => $forma_pago_seleccionada
        ];
    } else {
        echo "<h1>Error en los datos</h1>";
        return false;
    }
}

function guardarArchivo() {
    //globalizo $datos para poder tener sticki forms si falla el proceso del archivo y muestra el formulario con los datos
    global $datos;

    
    //validar archivo (Imágenes, como por ejemplo una foto del dni)
    // comprobaciones individuales para mostrar mensajes de error personalizados y probar cosas
    if (!isset($_FILES['archivo']) ){
        echo "<h2>el archivo no seleccionado</h2>";
        return false;
    } 
    elseif (isset($_FILES['archivo']) && $_FILES['archivo']['error'] != 0) {
        echo "<h2>error al subir el archivo</h2>";
        return false;
    }
    elseif ($_FILES['archivo']['size'] > 500 * 1024) {
        echo "<h2>el archivo es demasiado grande</h2>";
        return false;
    }
    elseif ($_FILES['archivo']['type'] != 'image/jpeg' && $_FILES['archivo']['type'] != 'image/png') {
        echo "<h2>el archivo no es una imagen</h2>";
        return false;
    }
    
    // comprobación final, como la hace rafa:
    $tiposAdmitidos = ['image/jpeg', 'image/png'];//tipos admitidos

    $archivo = $_FILES['archivo']['tmp_name'];//nombre del archivo temporal
    $mimeArchivo = mime_content_type($archivo);//tipo de archivo

    // comprobamos que el archivo tiene extensión y es del tipo admitido
    if ($mimeArchivo && in_array($mimeArchivo, $tiposAdmitidos)) {

        // marcamos la ruta donde se guardará el archivo
        $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";

        //comprobamos la exitencia de la carpeta /uploads/
        if (!file_exists($path) && !is_dir($path)) {
            if (mkdir($path, 0777)) {
                $nombre_archivo = $_FILES['archivo']['name'];
                echo "<h2>carpeta creada</h2>";


            } else {
                // no se ha podido crear la carpeta contenedora del archivo. por lo que mostramos el formulario con los datos otra vez, habiendo limpiado el buffer de salida
                //limpiamos el buffer de salida para que al volver a mostrar el archivo no recoja el archivo que ha dado error antes
                ob_clean();

                echo "<h2>error al crear la carpeta</h2>";
                mostrarFormulario($datos);
                fin_html();
                ob_flush();
                exit(6);
            }

            if (move_uploaded_file($archivo, $path . $nombre_archivo)) {
                echo "<h2>archivo subido correctamente</h2>";
                return true;
            }
            else {
                echo "<h2>error al subir el archivo</h2>";
                return false;
            }
    
        }

        //movemos el archivo a la carpeta uploads
 
        
    } else {
        
        echo "<h2>el archivo no es correcto</h2>";


    }


}


function mostrarPresupuesto($presupuesto)
{
    global $modelos, $motores, $colores, $extras, $forma_pago;


    //tabla resumen del presupuesto
    echo "<h1>Presupuesto</h1>";
    echo "<table border='1'>";
    echo "
    <tr>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Modelo</th>
        <th>Motor</th>
        <th>Color</th>
        <th>Extras</th>
        <th>Forma de pago</th>
    </tr>";

    echo "
    <tr>
    
        <td>{$presupuesto['nombre']}</td>
        <td>{$presupuesto['tlf']}</td>
        <td>{$modelos[$presupuesto['modelo']]['nombre']}</td>
        <td>{$motores[$presupuesto['motor']]['nombre']}</td>
        <td>{$colores[$presupuesto['colores']]['nombre']}</td>";
    echo "<td>";
    foreach ($presupuesto['extras'] as $extra) {
        echo "{$extras[$extra]['nombre']}<br>";
    }
    echo "</td>";
    echo "<td>{$forma_pago[$presupuesto['forma_pago']]['nombre']}</td>";
    echo "</tr>";

    echo "</table>";


    //desglose de precios
    $precio_modelo = $modelos[$presupuesto['modelo']]['precio'];
    $precio_motor = $motores[$presupuesto['motor']]['precio'];
    $precio_color = $colores[$presupuesto['colores']]['precio'];

    $precio_extras = array_sum(array_map(function ($extra) use ($extras) {
        return $extras[$extra]['precio'];
    }, $presupuesto['extras']));

    $precio_total = $precio_modelo + $precio_motor + $precio_color + $precio_extras;

    echo "<h2>Desglose de precios</h2>";
    echo "<ul>";
    echo "<li>Modelo: {$modelos[$presupuesto['modelo']]['nombre']} - {$precio_modelo} €</li>";
    echo "<li>Motor: {$motores[$presupuesto['motor']]['nombre']} - {$precio_motor} €</li>";
    echo "<li>Color: {$colores[$presupuesto['colores']]['nombre']} - {$precio_color} €</li>";
    echo "<li>Extras:</li>";
    echo "<ul>";
    foreach ($presupuesto['extras'] as $extra) {
        echo "<li>{$extras[$extra]['nombre']} - {$extras[$extra]['precio']} €</li>";
    }
    echo "</ul>";
    echo "<li>Precio total: {$precio_total} €</li>";
    echo "</ul>";
}

function pagoFinanciado()
{
    global $forma_pago;
}



inicio_html("Configurador de coches", ["/estilos/formulario.css", "/estilos/general.css", "/estilos/tabla.css"]);


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])) {
    // se comprueba que los datos del formulario son correctos
    if ($presupuesto = validarPresupuesto($modelos, $motores, $colores, $extras, $forma_pago)) {

        //muestro el presupuesto
        mostrarPresupuesto($presupuesto);

        mostrarFormulario($presupuesto);
    } else {
        echo "<h1>Error en los datos</h1>";
        mostrarFormulario($presupuesto);
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // no hace falta añadir el action porque se envía a la misma página y ademas esta en sticky forms 
    $datos = [];

    mostrarFormulario($datos);
}

function mostrarFormulario($datos)
{
    global $modelos, $motores, $colores, $extras, $forma_pago;
?>

    <header>Configurador de coches</header>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

        <!--  establecer el tamaño max de archivo -->
        <input type="hidden" name="MAX_FILE_SIZE" value="<?= 500 * 1024 ?>">

        <fieldset>
            <legend>Configurador de coches</legend>
            <label for="nombre">Nombre</label>

            <input type="text" name="nombre" id="nombre" size="40" required value="<?= isset($datos['nombre']) ? htmlspecialchars($datos['nombre']) : '' ?>">


            <label for="tlf">Telefono</label>
            <input type="tel" name="tlf" id="tlf" size="10" required value="<?= isset($datos['tlf']) ? htmlspecialchars($datos['tlf']) : '' ?>">

            <label for="modelo">Modelo</label>
            <select name="modelo" id="modelo" size="1">
                <?php
                foreach ($modelos as $clave => $modelo) {
                    echo "<option value='$clave'>{$modelo['nombre']} {$modelo['precio']} €</option>";
                }
                ?>
            </select>

            <label for="motores">motores</label>
            <div>
                <?php
                foreach ($motores as $clave => $motor) {
                    echo "<input type='radio' name='motor' value='$clave'>{$motor['nombre']} {$motor['precio']} € <br>";
                }
                ?>
            </div>

            <label for="colores">colores</label>
            <div>
                <select name="colores" id="colores">
                    <?php
                    foreach ($colores as $clave => $valor) {
                        echo "<option value='$clave'>{$valor['nombre']} {$valor['precio']} €</option>";
                    }
                    ?>
                </select>
            </div>

            <label for="extras[]">Extras</label>
            <div>
                <?php
                foreach ($extras as $clave => $extra) {
                    echo "<input type='checkbox' name='extras[]' value='$clave'>{$extra['nombre']} {$extra['precio']} €<br>";
                }
                ?>
            </div>

            <label for="forma_pago">Forma de pago</label>
            <div>
                <?php
                foreach ($forma_pago as $clave => $valor) {
                    echo "<input type='radio' name='forma_pago' value='$clave'>{$valor['nombre']} {$valor['meses']} € <br>";
                }
                ?>
            </div>
                <input type="file" name="archivo" id="archivo">
            <?php
            ?>

        </fieldset>

        <input type="submit" name="enviar" value="enviar">

    </form>

<?php
}

fin_html();
?>