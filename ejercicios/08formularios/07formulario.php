<?php
/*
 Crear un script PHP con un formulario en el que se registran solicitudes de empleo en
una empresa de empleo temporal donde se pueden subir archivos PDF con el
curriculum vitae de los solicitantes de empleo.
a) Los archivos se guardan en la carpeta curriculums de la raíz de documentos del
servidor. Si no está creada se crea con los permisos necesarios para poder crear
nuevos archivos.
b) La página es autogenerada.
c) Se valida que el archivo subido es PDF. Al guardarse el archivo se renombra con
el dni de la persona que subió el archivo.

e) Si el solicitante no acepta el registro de los datos personales, se cancela la subida
del archivo y se devuelve el formulario con los datos enviados y un mensaje de
error indicando que tiene que aceptar los datos.

f) mostar en una tabla los empleados de la empresa
 */

require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

$empleados = [
    '12345678k' => [
        'nombre' => 'Juan',
        'apellidos' => 'García Pérez',
        'email' => 'juanperez@gmail.com',
        'aceptacion' => true

    ],
    '87654321m' => [
        'nombre' => 'María',
        'apellidos' => 'González López',
        'email' => 'maria@gmail.com',
        'aceptacion' => true

    ],
    '11111111a' => [
        'nombre' => 'Ana',
        'apellidos' => 'Martínez Sánchez',
        'email' => 'ana@gmail.com',
        'aceptacion' => true
    ]
];

function validarDatos()
{
    global $empleados;
    $opciones_filtrado = [
        'dni' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[0-9]{8}[a-z]$/']
        ],
        'nombre' => FILTER_SANITIZE_SPECIAL_CHARS,
        'apellidos' => FILTER_SANITIZE_SPECIAL_CHARS,
        'email' => FILTER_VALIDATE_EMAIL,
        'aceptacion' => FILTER_VALIDATE_BOOLEAN,
    ];

    $datosSaneados = filter_input_array(INPUT_POST, $opciones_filtrado);

    $dni = isset($datosSaneados['dni']) && !array_key_exists($datosSaneados['dni'], $empleados)? $datosSaneados['dni'] : false;
    $nombre = isset($datosSaneados['nombre']) ? $datosSaneados['nombre'] : false;
    $apellidos = isset($datosSaneados['apellidos']) ? $datosSaneados['apellidos'] : false;
    $email = isset($datosSaneados['email']) ? $datosSaneados['email'] : false;
    $aceptacion = isset($datosSaneados['aceptacion']) && $datosSaneados['aceptacion'] == 'on' ? true : false;

    subirPDF($_FILES['archivo']);


    if ($dni && $aceptacion) {
        return [
            'dni' => $dni,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'email' => $email,
            'aceptacion' => $aceptacion
        ];
    } else {
        echo "Error al validar los datos";
        return false;
    }
}
function mostrarEmpleados() {
    global $empleados;

    echo "<table border='1'>";
    echo "
    <tr>
        <th>dni</th>
        <th>nombre</th>
        <th>apellidos</th>
        <th>email</th>
        <th>terminos</th>
    </tr>";
    foreach ($empleados as $dni => $value) {
        echo "<tr>";
        echo "<td>$dni</td>";
        echo "<td>{$value['nombre']}</td>";
        echo "<td>{$value['apellidos']}</td>";
        echo "<td>{$value['email']}</td>";
        echo "<td>" . ($value['aceptacion'] ? 'aceptado' : 'no aceptados') . "</td>";

        echo "</tr>";
    }
    
}

function anadirEmpleado($empleado) {
    global $empleados;

    $empleados[$empleado['dni']] = $empleado;
    mostrarEmpleados();
    
}

function subirPDF($archivo) {
    $tiposAdmitidos = ['application/pdf'];

    if (!isset($archivo) || $archivo['error'] != UPLOAD_ERR_OK) {
        echo "Error al subir el archivo";
        return false;
    }

    $archivoTmp = $archivo['tmp_name'];
    $mimeArchivo = mime_content_type($archivoTmp);

    if($mimeArchivo && in_array($mimeArchivo, $tiposAdmitidos)){
        $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";

        if (!is_dir($path) && !mkdir($path, 0777, true)) {
            echo "<h2>Error al crear la carpeta de destino</h2>";
            return false;
        }

        $nombreArchivo = $_POST['dni'] . ".pdf";

        if (move_uploaded_file($archivoTmp, $path . $nombreArchivo)) {
            echo "<h2>Archivo subido correctamente</h2>";
            return true;
        } else {
            echo "<h2>Error al subir el archivo</h2>";
            return false;
        }

    }
    else {
        echo "<h2>Tipo de archivo no permitido</h2>";
        return false;
    }
    
}



inicio_html("formulario 7 tuneado", ["/estilos/formulario.css", "/estilos/general.css", "/estilos/tabla.css"]);

// ==================================================================
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])) {
    if ($datos = validarDatos()) {
        anadirEmpleado($datos);
        //mostrarEmpleados($datos);
        mostrarFormulario($datos);
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $datos = [];
    mostrarFormulario($datos);
}
// ==================================================================
function mostrarFormulario($datos)
{

?>

    <header>solicitudes de empleo</header>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>solicitudes de empleo</legend>

            <label for="dni">dni:</label>
            <input type="text" name="dni" id="dni" value="<?= isset($datos['dni']) ? $datos['dni'] : ''  ?>" pattern="[0-9]{8}[a-z]">

            <label for="nombre">nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?= isset($datos['nombre']) ? $datos['nombre'] : ''  ?>">

            <label for="apellidos">apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" value="<?= isset($datos['apellidos']) ? $datos['apellidos'] : ''  ?>">

            <label for="email">email:</label>
            <input type="email" name="email" id="email" value="<?= isset($datos['email']) ? $datos['email'] : ''  ?>">

            <label for="aceptacion">aceptar terminos y condiciones</label>
            
            <!-- NO PONER VALUES EN LOS CHECKBOX -->
            <input type="checkbox" name="aceptacion" id="aceptacion" 
                <?= isset($datos['aceptacion']) && $datos['aceptacion'] == '1' ? 'checked' : '' ?>>

            <label for="cv">curriculum vitae:</label>
            <input type="file" name="archivo" id="archivo">



        </fieldset>
        <input type="submit" name="enviar" value="enviar">
    </form>

<?php
}
fin_html();
?>