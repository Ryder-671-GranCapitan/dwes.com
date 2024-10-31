<?php
// Javier Rider Jimenez n26

//array de almacenamiento de cursos

$cursos = [
    'ofi' => [
        'nombre'=> 'Ofimática',
        'precio' => 100],
    'pro' => [
        'nombre' => 'Programación',
        'precio' => 200],
    'rep' => [
        'nombre' => 'Reparación de ordenadores ',
        'precio' => 150]
    ];


require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");


function validarClases($cursos) {
    $opcionesFiltrado = [
        'email' => FILTER_VALIDATE_EMAIL,
        'cursos' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY
        ],
        'nClases' => FILTER_SANITIZE_NUMBER_INT,
        'desempleo' => FILTER_VALIDATE_BOOLEAN,
    ];
    
    $datosSaneados = filter_input_array(INPUT_POST, $opcionesFiltrado);

    print_r($datosSaneados['cursos']);
    print_r($cursos);

    $email = isset($datosSaneados['email']) ? $datosSaneados['email'] : false;

    $cursosEscogidos = [];
    if (isset($datosSaneados['cursos'])) {
        foreach ($datosSaneados['cursos'] as $curso) {
            if (array_key_exists($curso, $cursos)) {
                $cursosEscogidos[$curso] = $cursos[$curso];
            }
        }
    }

    $nClases = isset($datosSaneados['nClases']) && is_int($datosSaneados['nClases']) && (5 <= $datosSaneados['nClases'] && $datosSaneados['nClases'] <= 10) ? $datosSaneados['nClases'] : false;  
    $situacion = isset($datosSaneados['desempleo']) ? true : false;

    $estadoArchivo = false;

    if ($email && $cursosEscogidos && $nClases) {
        if($situacion){
            echo "subiendo tarjeta de demanda de empleo";
            $estadoArchivo = guardarArchivo($_FILES['archivo'], $email);
        }
        
        return [
            'email' => $email,
            'cursos' => $cursosEscogidos,
            'nClases' => $nClases,
            'desempleo' => $situacion,
            'archivo' => $estadoArchivo
        ];
    } else {
        echo '<h2>Fallo en la validación de datos</h2>';
        return false;
    }
}

function guardarArchivo($archivo, $nombre)
{
    $tiposAdmitidos = ['application/pdf']; 

    $archivoTmp = $archivo['tmp_name']; 
    $mimeArchivo = mime_content_type($archivoTmp); 

    $nombreArchivo = $nombre . '.pdf';

    if ($mimeArchivo && in_array($mimeArchivo, $tiposAdmitidos)) {
        $path = $_SERVER['DOCUMENT_ROOT'] . "/tarjetas/";

        if (!is_dir($path) && !mkdir($path, 0775, true)) {
            echo "<h2>Error al crear la carpeta de tarjetas</h2>";
            return false;
        }

        if (move_uploaded_file($archivoTmp, $path . $nombreArchivo)) {
            echo "<h2>Archivo subido correctamente</h2>";
            return true;
        } else {
            echo "<h2>Error al mover el archivo al destino final</h2>";
            return false;
        }
    } else {
        echo "<h2>Tipo de archivo no permitido</h2>";
        return false;
    }
}

function mostrarDatos($datos)  {
    echo "<h1>presupuesto de clases</h1>";
    echo "<table border='1'>";
    echo "
    <tr>
        <th>email</th>
        <th>cursos</th>
        <th>N clases</th>
        <th>situacion</th>
        <th>archivo</th>
    </tr>";

    echo "<tr>";
    echo "<td>" . $datos['email'] ."</td>";
    echo "<td>";
    foreach ($datos['cursos'] as $key => $value) {
        echo $value['nombre']  ."-". $value['precio'] . "<br>";
    }
    echo "</td>";
    echo "<td>" . $datos['nClases'] ."</td>";
    echo "<td>" . ($datos['desempleo'] ? 'desempleado' : 'empleado') ."</td>";
    echo "<td>" . ($datos['archivo'] ? 'subido' : 'sin subir') ."</td>";
    echo "</tr>";

    echo "</table>";

    calcularPresupuesto($datos);
}

function calcularPresupuesto($datos)  {
    $total = 0 ;

    $precioPresencial = 10;
    $presencial = $datos['nClases'] * $precioPresencial;
    
    $asignaturas = 0;

    echo "Nº Clases presenciales: {$datos['nClases']} a precio $precioPresencial. es $presencial <br>";

    foreach ($datos['cursos'] as $key => $value) {
        echo "precio por asignatura: <br>";
        echo $value['nombre']  ."-". $value['precio']. '<br>';

        $asignaturas += $value['precio'];
    }

    $total = $presencial + $asignaturas;

    if($datos['desempleo']){
        $total = $total * 0.9; 
        echo "precio reducido por desempleo: $total  <br>";
    }
    else{
        echo "precio completo: $total <br>";
    }
}

inicio_html("Examen Ra2RA3", [
    "/estilos/formulario.css",
    "/estilos/general.css",
    "/estilos/tablas.css",
    "/estilos/bh.css"
]);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])) {
    if ($clases = validarClases($cursos)) {
        echo "<h1>Los datos :</h1>";
        mostrarDatos($clases);
    } else {
        echo "<h1>Error en los datos</h1>";
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $datos = [];
    mostrarFormulario($datos);
}

function mostrarFormulario($datos)
{
global $cursos;
?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="" >
        <fieldset>
            <legend>cursos de formación</legend>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= isset($datos['email']) ? $datos['email'] : '' ?>">
            
            <label for="cursos[]">cursos</label>
            <div>
            <?php foreach ($cursos as $key => $value) : ?>
                <input type="checkbox" name="cursos[]" id="cursos['<?= $key ?>']" value="<?= $key ?>" > <?= $value['nombre'] ?> - <?= $value['precio'] ?> €<br>
            <?php endforeach;?>
            </div>

            <label for="nClases">numero de clases</label>
            <input type="text" name="nClases" id="nClases">

            <label for="desempleo">situacion de desempleo</label>
            <input type="checkbox" name="desempleo" id="desempleo" <?= isset($datos['desempleo']) ? 'checked' : '' ?> >
            
            <label for="archivo">Tarjeta de demanda de empleo</label>
            <input type="file" name="archivo" id="archivo" >
        </fieldset>

        <input type="submit" value="enviar" name="enviar">
    </form>

<?php
}

fin_html();
?>