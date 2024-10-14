<?php
/*
  Script: 04subida_archivo.php
  Descripción: ejemplo de formulario para subida de archivos al servidor desde los clientes.

      SUBIDA DE ARCHIVOS
      ------------------

    * Un formulario permite subir archivos si el elemento for tiene el atributo
        enctype="multipart/form-data". Además trendrá al menos un elemento input con 
        type = "file".
      
    * Directivas php.ini que regulan la subida de archivos:
        - file_uploads <bool> -> Indica si la subida de archivos está activada.
        - upload_max_filesize <int> -> Límite del tamaño del archivo a subir en bytes.
                                       el límite por defecto son 2mb.
        - max_file_uploads <int> -> Número máximo de archivos que se pueden subir en una petición.
                                    por defecto son 20.
        - post_max_size <int> -> Tamaño máximo de la petición post. Por defecto 8Mb.
        - upload_tmp_dir <dir> -> Directorio TEMPORAL donde se almacenan los archivos subidos.
                                  Por defecto, según el SO: /tmp (Linux). C:\TEMP (Windows).
        
     * Todos los parámetros anteriores en php.ini son configurables con la función ini_set().

    * Además, podemos poner límite del tamaño de archivo subido:
        - Duro -> Directiva upload_max_filesize en php.ini.
        - Blando -> Campo oculto de formulario MAX_FILE_SIZE.
        - De usuario -> El desarrollador puede establecer límites en campos ocultos. Viene bien para cuando quiero poner un límite para diferentes tipos de archivos.

    * cuando se sube un archivo, el script que procesa el formulario tiene que hacer varias comprobaciones antes de guardarlo o procesarlo.
        1º existe el archivo en el array $_FILES (que haa un control de formulario para subida)
        2º el usuario ha incluido en el formulario el archivo a subir en el Scrip php
        3º el tamaño del archivo esta dentor de los limites de pp. automaticamnte php
        4º el tamaño del archivo esta dentro de los limites establecidos por el usuario. en el script php
        5º el tipo de archivo es el requerido

    * si vamos a guardar el archivo, comprobar si exsite el directorio de subida. si no, esta creado hay que crearlo

    *si el archivo subido cumple los requisitos, se guarda en el directorio de subida o se procesa

    Enfoque del script 
        -pagina autogenerada
        -se suben archivos de forma ciclica
        -peticion GET: se presenta el formulario
        -peticion post:
            - procesamos la subida del archivo
            - si hay error se presenta la salida producida hasta el momento. si hay error, presentamos un mensaje de error y el formulario de subida
            - si no hay error se guarda el archivo en un directorio y se presenta el formulario
    
*/

define("DIRECTORIO_DPF", $_SERVER['DOCUMENT_ROOT'] . "./archivos_cv");

require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/funciones.php");

inicio_html("subida de archivos", ["/style/formularios.css"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $limite_pdf = $_POST['limite_pdf'];

    echo "<h3>datos recibidos por la peticion</h3>";
    echo "el nombre es $nombre <br> el dni es $dni";
    echo "el limite de archivos pdf es $limite_pdf";


    /*
    creacion del directorio de subida 
    ----------------------------------------
        -el usuario que ejecuta el sercicio web apache en el servidor necesita tener permisos de escritura sobre el directorio padre del directorio de subida 

        - 1º forma: creamos el directorio desde el SO y se lasignamos propietario o permisos
            si el usuario no es propietario del directorio de subida tiene que tener permisos 777: rwx rwx rwx. No recomendable, cualquier usuario puede acceder al directorio y hacer lo que quiera

        - 2º forma: modificar la ACL del directorio de subida o del directorio padre 
        
        empleamos la segunda forma y asignamos rwx al usuario que ejecuta apache sobre el directorio padre del direcotrio de subida y este se crea en el script php
    
        setfacl -m u:www-data:rwx /var/www/dwes.com


        */
    if (!is_dir(DIRECTORIO_DPF)) {

        if (! mkdir(DIRECTORIO_DPF, 0750)) {
            echo "<h3>error nose ha podido crear el directorio de subida</h3>";
        } else {
            echo "<p> el directorio de subida se ha creado con exito</p>";
        }
    }
}

/*
    Acceso a los archivos subidos:
    -----------------------------------

    array global $_FILE contiene la informacion de los archivos que se han subido. es un array asociativo cuya clave es el nombre del campo file del formulario. cada elemento es a su ve otro array asociativo con los siguiente elementos

        - name: el nombre del archivo ¡¡¡cuidado!!! con la convencion de nombres del SO del cliente
        - type: tipo MIME del archivo
        - size: tamaño en bytes del archivo
        - TMP_name: nombre (con ruta absoluta) del archivo subido temporalmente
        - error: codigo de error si hubiera alguno
 */


/*
    1º comprobacion. existe el control del formulario para subir un archivo y la peticion ha llegado al servidor

*/
if (isset($_FILES["archivo_cv"])) {
    //existe el campo de formulario archivo_cv. puede existir incluso si el usuario no ha subido el archivo
    echo "<h3>datos del archivo</h3>";
    echo "<p>";
    echo "nombre = {$_FILES['archivo_cv']['name']}<br>";
    echo "tipo = {$_FILES['archivo_cv']['type']}<br>";
    echo "tamaño = {$_FILES['archivo_cv']['size']}<br>";
    echo "archivo temporal = {$_FILES['archivo_cv']['tmp_name']}<br>";
    echo "error = {$_FILES['archivo_cv']['error']}<br>";


    echo "</p>";


    /*
    2º comprobacion. el suuario ha enviado el formulario pero sin archivo el usuario no rellena el campo para el archivo
*/

    if ($_FILE["archivo_cv"]['error'] == UPLOAD_ERR_NO_FILE) {
        /*if (empty($_FILES["archivo_cv"]["name"])) {
        //no se ha subido el archivo}*/
        echo "<h3>ERROR no se ha subido el archivo</h3>";
    }else {
        /* 3º comprobacion. comprobacion del peso dentro de los limites */
        if ($_FILE["archivo_cv"]['error'] == UPLOAD_ERR_INI_SIZE) {
            echo "<h3>ERROR excede el tamaño inidcado</h3>";

        }elseif ($_FILE["archivo_cv"]['error'] == UPLOAD_ERR_FORM_SIZE) {
            echo "<h3>ERROR excede el MAX_FILE_SIZE</h3>";
            
        }
        
    }
    

} else {
    echo "<h3>errorel formulario no contiene el campo archivo_cv</h3>";
}









?>


<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <!-- limite duro -->
    <input type="hidden" name="MAX_FILE_SIZE" id="MAX_FILE_SIZE" value="<?= 1024 * 1024 ?>">
    <!-- limite blando -->

    <input type="hidden" name="limite_pdf" id="limite_pdf" value="<?= 1024 * 1024 ?>">
    <fieldset>
        <legend>introduce tus datos y tu curriculum</legend>

        <label for="dni">dni</label>
        <input type="text" name="dni" id="dni">

        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre">

        <label for="archivo_cv">archivo CV (solo PDF)</label>
        <input type="file" name="archivo_cv" id="archivo_cv" accept="application/pdf">

        <input type="submit" value="operacion" id="operacion" value="enviar">
    </fieldset>

</form>

<?php
fin_html();
?>