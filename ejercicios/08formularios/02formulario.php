<?php

/*
Crear un script PHP para consultar los libros de una biblioteca.
a) El formulario de entrada de datos incluye: 

- campo: isbn
  - tipo de campo: texto
  - valores: formato ###-#-#####-###-#

- campo: titulo
  - tipo de campo: texto
  - valores: 

- campo: autor
  - tipo de campo: lista de selección múltiple
  - valores: Ken Follet, Max Hastings, Isaac Asimov, Carl Sagan, Steve Jacobson, George R.R. Martin

- campo: genero
  - tipo de campo: lista de selección múltiple
  - valores: Novela, Historia, Divulgación científica, biografía, fantástica

b) La respuesta es una tabla con todos los libros que se ajusten al criterio de
búsqueda.

Los libros están almacenados en un array asociativo con el isbn como clave.
Pueden usarse los siguientes:


    

*/
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

$libros = [
    "123-4-56789-012-3" => [
        "autor" => "Ken Follet",
        "titulo" => "Los pilares de la tierra",
        "genero" => "Novela histórica"
    ],
    "987-6-54321-098-7" => [
        "autor" => "Ken Follet",
        "titulo" => "La caída de los gigantes",
        "genero" => "Novela histórica"
    ],
    "345-1-91827-019-4" => [
        "autor" => "Max Hastings",
        "titulo" => "La guerra de Churchill",
        "genero" => "Biografía"
    ],
    "908-2-10928-374-5" => [
        "autor" => "Isaac Asimov",
        "titulo" => "Fundación",
        "genero" => "Fantasía"
    ],
    "657-4-39856-543-3" => [
        "autor" => "Isaac Asimov",
        "titulo" => "Yo, robot",
        "genero" => "Fantasía"
    ],
    "576-4-23442-998-5" => [
        "autor" => "Carl Sagan",
        "titulo" => "Cosmos",
        "genero" => "Divulgación científica"
    ],
    "398-4-92438-323-2" => [
        "autor" => "Carl Sagan",
        "titulo" => "La diversidad de la ciencia",
        "genero" => "Divulgación científica"
    ],
    "984-5-39874-209-4" => [
        "autor" => "Steve Jacobson",
        "titulo" => "Jobs",
        "genero" => "Biografía"
    ],
    "564-7-54937-300-6" => [
        "autor" => "George R.R. Martin",
        "titulo" => "Juego de tronos",
        "genero" => "Fantasía"
    ],
    "677-2-10293-833-8" => [
        "autor" => "George R.R. Martin",
        "titulo" => "Sueño de primavera",
        "genero" => "Fantasía"
    ]
];

inicio_html("Gestión de biblioteca", ["/estilos/formulario.css", "/estilos/general.css", "/estilos/tabla.css"]);


// en la peticion POST recibimos los datos de los formularios
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //verificamos que hemos recibido los datos
    //plus de seguridad
    // enviar es el identificador del botón submit 
    if (!isset($_POST['enviar'])) {
        echo "<h3>NO SE HAN ENVIADO LOS DATOS CORRECTOS</h3>";

        fin_html();
    }

    //funcion para mostrar la tabla completa
    /*DESACTIVADA */
    function mostrarLibros($libros)
    {
        echo "<table border='1'>";
        echo "
        <tr>
            <th>ISBN</th>
            <th>autor</th>
            <th>titulo</th>
            <th>Genero</th>
        </tr>";
        foreach ($libros as $isbn => $libro) {
            echo "<tr>";
            echo "<td>$isbn</td>";
            echo "<td>" . (isset($libro['autor']) ? $libro['autor'] : "-") . "</td>";
            echo "<td>" . (isset($libro['titulo']) ? $libro['titulo'] : "-") . "</td>";
            echo "<td>" . (isset($libro['genero']) ? $libro['genero'] : "-") . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }


    //funcion para mostrar la tabla con libros concretos
    function buscarLibros($libros, $criterios)
    {
        // almaceno las caracteristicas buscadas en funciones
        $librosFiltrados = [];
        $isbnBuscado = $criterios['isbn'];
        $tituloBuscado = $criterios['titulo'];
        $autoresBuscados = $criterios['autor'];
        $generosBuscados = $criterios['genero'];

        //recorro la lista principal una primera vez. recogiendo individualmente en el array $librosFiltrados los libros de $libros que cumplen la condición 
        foreach ($libros as $isbn => $libro) {
            if (!empty($isbnBuscado) && $isbn == $isbnBuscado) {
                $librosFiltrados[$isbn] = $libro;
            }

            if (!empty($tituloBuscado) && stripos($libro['titulo'], $tituloBuscado) !== false) {
                $librosFiltrados[$isbn] = $libro;
            }

            if (!empty($autoresBuscados) && in_array($libro['autor'], $autoresBuscados)) {
                $librosFiltrados[$isbn] = $libro;
            }

            if (!empty($generosBuscados) && in_array($libro['genero'], $generosBuscados)) {
                $librosFiltrados[$isbn] = $libro;
            }
        }

        //cuando he recogido todos los libros que busco los muestro en una tabla. recorriendo $librosBuscados en vez de $libros principal
        echo "<table border='1'>";
        echo "
        <tr>
            <th>ISBN</th>
            <th>Autor</th>
            <th>Título</th>
            <th>Género</th>
        </tr>";

        foreach ($librosFiltrados as $isbn => $libro ) {
            echo "<tr>";
            echo "<td>$isbn</td>";
            echo "<td>" . (isset($libro['autor']) ? $libro['autor'] : "-") . "</td>";
            echo "<td>" . (isset($libro['titulo']) ? $libro['titulo'] : "-") . "</td>";
            echo "<td>" . (isset($libro['genero']) ? $libro['genero'] : "-") . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])) {
        $criterios = [
            'isbn' => $_POST['isbn'] ?? '',
            'titulo' => $_POST['titulo'] ?? '',
            'autor' => $_POST['autor'] ?? [],
            'genero' => $_POST['genero'] ?? []
        ];

        // si no hay criterios de búsqueda llama mostrar libros que muestra todos los libros
        if (empty($criterios['isbn']) && empty($criterios['titulo']) && empty($criterios['autor']) && empty($criterios['genero'])) {
            mostrarLibros($libros);
        } else {
            buscarLibros($libros, $criterios);
        }
    }

} else {
?>
    <h2>1</h2>
    <p>
        Crear un script PHP para consultar los libros de una biblioteca.
    </p>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <div>
                <label for="isbn">ISBN:</label>
                <input type="text" name="isbn" id="isbn" pattern="\d{3}-\d-\d{5}-\d{3}-\d">
            </div>

            <div>
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo">
            </div>

            <div>
                <label for="autor">Autor:</label>
                <select name="autor[]" id="autor" multiple>
                    <?php
                    // Mostrar todos los autores guardados como opciones seleccionables
                    $autoresUnicos = [];
                    foreach ($libros as $isbn => $libro) {
                        if (!in_array($libro['autor'], $autoresUnicos)) {
                            $autoresUnicos[] = $libro['autor'];
                            echo "<option value='{$libro['autor']}'>{$libro['autor']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div>
                <label for="genero">Género:</label>
                <select name="genero[]" id="genero" multiple>
                    <?php
                    $generosUnicos = [];
                    foreach ($libros as $isbn => $libro) {
                        if (!in_array($libro['genero'], $generosUnicos)) {
                            $generosUnicos[] = $libro['genero'];
                            echo "<option value='{$libro['genero']}'>{$libro['genero']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div>
                <input type="submit" name="enviar" value="enviar">
            </div>
        </fieldset>
    </form>

<?php
    fin_html();
}

?>