<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

inicio_html("Proceso de formulario 1", ["/style/general.css"]);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    $perfil_linkedin = $_POST['linkedin'];
    $fecha_disponible = $_POST['fecha_disponible'];
    $hora_entrevista = $_POST['hora_entrevista'];
    $salario = $_POST['salario'];
    $areas = $_POST['areas']; //ARRAY
    $modalidad = $_POST['modalidad'];
    $tipo_contrato = $_POST['tipo_contrato'];
    $habilidades = $_POST['habilidades']; //ARRAY
    $comentarios = $_POST['comentarios'];
    $operacion = $_POST['operacion'];

    // Mostrar la información

    echo "Nombre: $nombre<br>";
    echo "Email: $email<br>";
    echo "Clave: $clave<br>";
    echo "Perfil de LinkedIn: $perfil_linkedin<br>";
    echo "Fecha disponible: $fecha_disponible<br>";
    echo "Hora de entrevista: $hora_entrevista<br>";
    echo "Salario: $salario<br>";

    echo "Áreas de interés: <br>";
    foreach ($areas as $area) {
        echo "- $area<br>";
    }

    echo "Modalidad: $modalidad<br>";
    echo "Tipo de contrato: $tipo_contrato<br>";

    echo "Habilidades: <br>";
    foreach ($habilidades as $habilidad) {
        echo "- $habilidad<br>";
    }

    echo "Comentarios: $comentarios<br>";
    echo "Operación: $operacion<br>";

    fin_html();
} else {
    echo "<h3>error no se han mandado los datos</h3>";
}
