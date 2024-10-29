<?php
/*
    Actividad05 según el enunciado en Actividades RA3 - Proceso de formularios.pdf
*/

require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

/*
function obtenerDatosFormulario($destinos, $compañias) {
    $opciones_filtrado = [
        'responsable' => FILTER_SANITIZE_SPECIAL_CHARS,
        'telefono' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[0-9]{9}$/']
        ],
        'email' => FILTER_VALIDATE_EMAIL,
        'destino' => FILTER_SANITIZE_SPECIAL_CHARS,
        'compañia' => FILTER_SANITIZE_SPECIAL_CHARS,
        'hotel' => [
            'filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 3, 'max_range' => 5, 'default' => 3]
        ],
        'desayuno' => FILTER_SANITIZE_SPECIAL_CHARS,
        'personas' => [
            'filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 5, 'max_range' => 10, 'default' => 5]
        ],
        'dias' => FILTER_SANITIZE_NUMBER_INT,
        'extras' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY | FILTER_NULL_ON_FAILURE
        ]
    ];

    $datos = filter_input_array(INPUT_POST, $opciones_filtrado);

    // Validaciones adicionales
    $datos['destino'] = array_key_exists($datos['destino'], $destinos) ? $datos['destino'] : false;
    $datos['compañia'] = array_key_exists($datos['compañia'], $compañias) ? $datos['compañia'] : false;
    $datos['dias'] = in_array($datos['dias'], [5, 10, 15]) ? $datos['dias'] : false;
    $datos['desayuno'] = isset($datos['desayuno']) && $datos['desayuno'] === "On";

    return $datos;
}
*/

function validarYSanearDatos($destinos, $compañias, $extras)
{
    // Definir opciones de filtrado
    $opciones_filtrado = [
        'responsable' => FILTER_SANITIZE_SPECIAL_CHARS,
        'telefono' => FILTER_SANITIZE_NUMBER_INT,
        'email' => FILTER_SANITIZE_EMAIL,
        'destino' => FILTER_SANITIZE_SPECIAL_CHARS,
        'compañia' => FILTER_SANITIZE_SPECIAL_CHARS,
        'hotel' => FILTER_SANITIZE_NUMBER_INT,
        'desayuno' => FILTER_SANITIZE_SPECIAL_CHARS,
        'personas' => FILTER_SANITIZE_NUMBER_INT,
        'dias' => FILTER_SANITIZE_NUMBER_INT,
        'extras' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY | FILTER_NULL_ON_FAILURE
        ]
    ];

    /*
Teléfono: Se valida que tenga 9 dígitos usando una expresión regular.
Email: Se valida que sea un email válido usando filter_var con FILTER_VALIDATE_EMAIL.
Destino: Se valida que el destino exista en el array $destinos usando array_key_exists.
Compañía: Se valida que la compañía exista en el array $compañias usando array_key_exists.
Hotel: Se valida que el valor esté entre 3 y 5 usando filter_var con opciones de rango.
Personas: Se valida que el valor esté entre 5 y 10 usando filter_var con opciones de rango.
Días: Se valida que el valor sea uno de los permitidos (5, 10, 15) usando in_array.
Desayuno: Se verifica si el campo está marcado.
Extras: Se valida que todos los extras existan en el array $extras usando array_diff_key.
    */

    // Recoger y sanear datos del formulario
    $datos_saneados = filter_input_array(INPUT_POST, $opciones_filtrado);

    // Validar datos   
    $telefono = preg_match("/[0-9]{9}/", $datos_saneados['telefono']) ? $datos_saneados['telefono'] : false;
    $email = filter_var($datos_saneados['email'], FILTER_VALIDATE_EMAIL) ? $datos_saneados['email'] : false;
    $destino = array_key_exists($datos_saneados['destino'], $destinos) ? $datos_saneados['destino'] : false;
    $compañia = array_key_exists($datos_saneados['compañia'], $compañias) ? $datos_saneados['compañia'] : false;
    $hotel = filter_var($datos_saneados['hotel'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 3, 'max_range' => 5, 'default' => 3]]);
    $personas = filter_var($datos_saneados['personas'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 5, 'max_range' => 10, 'default' => 5]]);
    $dias = in_array($datos_saneados['dias'], [5, 10, 15]) ? $datos_saneados['dias'] : false;
    $desayuno = isset($datos_saneados['desayuno']) && $datos_saneados['desayuno'] == "On";
    $extras_ok = $datos_saneados['extras'] && array_diff_key(array_flip($datos_saneados['extras']), $extras) === [];

    // Retornar datos validados y ajustados
    // se vuelven a filtrar
    return [
        'responsable' => $datos_saneados['responsable'],
        'telefono' => $telefono,
        'email' => $email,
        'destino' => $destino,
        'compañia' => $compañia,
        'hotel' => $hotel,
        'desayuno' => $desayuno,
        'personas' => $personas,
        'dias' => $dias,
        'extras_ok' => $extras_ok,
        'extras_recibido' => $datos_saneados['extras']
    ];
}





ini_set("upload_max_filesize", 500 * 1024);

// Array de destinos
$destinos = [
    'paris'     => array('nombre' => 'Paris', 'precio' => 100),
    'londres'   => array('nombre' => 'Londres', 'precio' => 120),
    'estocolmo' => array('nombre' => 'Estocolmo', 'precio' => 200),
    'edinburgo' => array('nombre' => 'Edinburgo', 'precio' => 175),
    'praga'     => array('nombre' => 'Praga', 'precio' => 125),
    'viena'     => array('nombre' => 'Viena', 'precio' => 150)
];

// Array de compañías
$compañias = [
    'miair'     => array('nombre' => 'MiAir', 'precio' => 0),
    'airfly'   => array('nombre' => 'AirFly', 'precio' => 50),
    'vuelaconmigo' => array('nombre' => 'VuelaConmigo', 'precio' => 75),
    'apedalesair' => array('nombre' => 'ApedalesAir', 'precio' => 150)
];

$hoteles = [
    3 => 0,
    4 => 40,
    5 => 100
];

$extras = [
    'vg'     => 200,
    'bt'     => 30,
    '2m'     => 20,
    'sv'     => 30,
];




// Página autogenerada: El formulario se presenta con GET y el proceso se hace con POST

inicio_html("Actividad 05", ["/estilos/general.css", "/estilos/formulario.css"]);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Procesa el formulario
    // Si hay sticky form, se inicializan las variables 
    // con los datos del formulario para inicializar los valores 
    // de los controles del formulario.



    // Datos se han recibido, saneado y validado.
    // Se genera el presupuesto

    $total = 0;
    if ($destino) {
    }
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    // Poner el formulario si no es sticky form

    // Si es sticky form, inicializar los valores de los controles
    // del formulario con valores por defecto.
}

// Si es sticky form, el formulario viene aquí

?>
<header>Presupuesto de viaje</header>
<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?= 500 * 1024 ?>">
    <fieldset>
        <legend>Datos del viaje</legend>
        <label for="responsable">Responsable del grupo</label>
        <input type="text" name="responsable" id="responsable" size="40" required>

        <label for="telefono">Teléfono</label>
        <input type="tel" name="telefono" id="telefono" size="10" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" size="30" required>

        <label for="destino">Destino</label>
        <select name="destino" id="destino" size="1">
            <?php
            foreach ($destinos as $clave => $valor) {
                echo "<option value='$clave'>{$valor['nombre']}</option>";
            }
            ?>
        </select>

        <label for="compañia">Compañía aérea</label>
        <select name="compañia" id="compañia" size="1">
            <?php
            foreach ($compañias as $clave => $valor) {
                echo "<option value='$clave'>{$valor['nombre']}</option>";
            }
            ?>
        </select>

        <label for="hotel">Hotel</label>
        <select name="hotel" id="hotel" size="1">
            <?php
            foreach ($hoteles as $clave => $valor) {
                echo "<option value='$clave'>$clave * ($valor €/p/d)</option>";
            }
            ?>
        </select>

        <label for="desayuno">Desayuno incluido</label>
        <input type="checkbox" name="desayuno" id="desayuno">

        <label for="personas">Nº Personas</label>
        <input type="number" min="5" max="10" value="5" name="personas" id="personas">

        <label for="dias">Nº de días</label>
        <div>
            <input type="radio" name="dias" id="dias_5" value="5">5
            <input type="radio" name="dias" id="dias_10" value="10">10
            <input type="radio" name="dias" id="dias_15" value="15">15
        </div>

        <label for="extras[]">Extras</label>
        <div>
            <input type="checkbox" name="extras['vg']" id="extras_1">Visita guiada<br>
            <input type="checkbox" name="extras['bt']" id="extras_2">Bus turístico<br>
            <input type="checkbox" name="extras['2m']" id="extras_3">2ª Maleta facturada<br>
            <input type="checkbox" name="extras['sv']" id="extras_4">Seguro de viaje<br>
        </div>

        <label>Copia del libro de familia</label>
        <input type="file" name="libro" id="libro">
    </fieldset>
</form>
<?php
fin_html();
?>