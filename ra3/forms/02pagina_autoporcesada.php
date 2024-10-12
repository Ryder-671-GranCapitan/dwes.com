<?php
/*
 paginas autoprocesadas:

 -si se recibe una peticion GET se genera el formulario. el atributo tiene el valor

 -si se recibe una peticion POST se recogen los datos del formulario y se procesa la peticion generando la salida
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

inicio_html("Proceso de formulario ", ["/style/general.css"]);

 if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //genero el formulario
 }

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //recoger datos del formulario y procesar la respuesta
 }
fin_html();
?>