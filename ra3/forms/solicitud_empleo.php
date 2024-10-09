<?php
require($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

inicio_html("proceso de formulario 1" , ["/style/general.css"]);

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$clave = $_POST['clave'];

$perfil_linkedin = $_POST['linkedin'];
$fecha_disponible = $_POST['fecha_disponible'];
$hora_entrevista = $_POST['hora_entrevista'];
$salario = $_POST['salario'];
$areas = $_POST['areas'];

?>