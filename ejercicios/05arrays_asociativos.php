<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays asociativos </title>
</head>

<body>
    <h1>Arrays Asociativos</h1>
    <h2>19</h2>
    <p>
        Escribir un script PHP que gestiona el inventario de una pequeña tienda.
        • Usa un array para almacenar el nombre de varios productos junto con la cantidad que tienes en stock de cada uno.
        • Muestra en pantalla cuántas unidades tienes de cada producto.
        • Simula que se vendieron 3 manzanas y 5 plátanos, actualizando las cantidades en el array.
        • Agrega un nuevo producto al inventario llamado "Naranjas" con una cantidad de 15 unidades.
        • Vuelve a mostrar el inventario actualizado en pantalla.
    </p>

    <?php
    $inventario = [
        "manzanas" => 10,
        "plátanos" => 5,
        "peras" => 7
    ];

    foreach ($inventario as $producto => $cantidad) {
        echo "Tienes $cantidad unidades de $producto<br>";
    }

    echo "<hr>";


    // array merge: combina dos o más arrays

    /*
$inventario["manzanas"] -= 3;
$inventario["plátanos"] -= 5;
 
*/


    $inventario = array_merge($inventario, ["manzanas" => 7, "plátanos" => 0]);

    foreach ($inventario as $producto => $cantidad) {
        echo "Tienes $cantidad unidades de $producto<br>";
    }

    echo "<hr>";

    $inventario["naranjas"] = 15;

    foreach ($inventario as $producto => $cantidad) {
        echo "Tienes $cantidad unidades de $producto<br>";
    }

    ?>

    <h2>20</h2>

    <p>
        Escribir un script PHP para almacenar información sobre estudiantes y sus
        calificaciones en diferentes asignaturas.
        • La clave del array es el nombre de un estudiante y el valor es otro array asociativo con las asignaturas y sus respectivas calificaciones.
        • Muestra las calificaciones de todos los estudiantes y asignaturas en un formato de tabla.
        • Calcula el promedio de las calificaciones de cada estudiante y muestra el resultado.
        • Simula que a uno de los estudiantes le subieron la nota en "Historia" en 1 punto y actualiza el array.
        • Agrega un nuevo estudiante llamado "Marta" con las siguientes calificaciones: "Matemáticas" => 10, "Historia" => 10.
        • Vuelve a mostrar el listado de estudiantes actualizado. Lista los estudiantes que lo han aprobado todo.
    </p>


    <?php
    $estudiantes = [
        "Juan" => [
            "Matemáticas" => 5,
            "Historia" => 6,
            "Inglés" => 7
        ],
        "Ana" => [
            "Matemáticas" => 8,
            "Historia" => 9,
            "Inglés" => 6
        ],
        "Luis" => [
            "Matemáticas" => 4,
            "Historia" => 5,
            "Inglés" => 6
        ]
    ];

    function mostrarCalificaciones($estudiantes)
    {
        echo "<table border='1'>";
        echo "<tr><th>Estudiante</th><th>Matemáticas</th><th>Historia</th><th>Inglés</th><th>Media</th></tr>";
        foreach ($estudiantes as $estudiante => $asignaturas) {
            echo "<tr>";
            echo "<td>$estudiante</td>";
            echo "<td>" . (isset($asignaturas["Matemáticas"]) ? $asignaturas["Matemáticas"] : '-') . "</td>";
            echo "<td>" . (isset($asignaturas["Historia"]) ? $asignaturas["Historia"] : '-') . "</td>";
            echo "<td>" . (isset($asignaturas["Inglés"]) ? $asignaturas["Inglés"] : '-') . "</td>";
            $media = array_sum($asignaturas) / count($asignaturas);
            echo "<td>" . round($media, 2) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    function calcularPromedios($estudiantes)
    {
        echo "<h3>Promedios</h3>";
        foreach ($estudiantes as $estudiante => $asignaturas) {
            $promedio = array_sum($asignaturas) / count($asignaturas);
            echo "Promedio de $estudiante: " . round($promedio, 2) . "<br>";
        }
    }

    function listarAprobados($estudiantes)
    {
        echo "<h3>Estudiantes que han aprobado todo</h3>";
        foreach ($estudiantes as $estudiante => $asignaturas) {
            $aprobadoTodo = true;
            foreach ($asignaturas as $calificacion) {
                if ($calificacion < 5) {
                    $aprobadoTodo = false;
                    break;
                }
            }
            if ($aprobadoTodo) {
                echo "$estudiante ha aprobado todo.<br>";
            }
        }
    }

    // Mostrar calificaciones iniciales
    mostrarCalificaciones($estudiantes);

    // Calcular y mostrar promedios
    calcularPromedios($estudiantes);

    // Subir la nota de Historia de Juan en 1 punto
    $estudiantes["Juan"]["Historia"] += 1;

    // Agregar nuevo estudiante Marta
    $estudiantes["Marta"] = [
        "Matemáticas" => 10,
        "Historia" => 10
    ];

    // Mostrar calificaciones actualizadas
    echo "<h3>Calificaciones actualizadas</h3>";
    mostrarCalificaciones($estudiantes);

    // Calcular y mostrar promedios actualizados
    calcularPromedios($estudiantes);

    // Listar estudiantes que han aprobado todo
    listarAprobados($estudiantes);
    ?>


    <h2>21</h2>
    <p>
        Escribir un script PHP para crear una agenda telefónica simple que almacena y muestra números de contacto.
        • La clave del array son los nombres de personas y los valores son un nuevo array con su número de teléfono y su dirección de email.
        • Muestra todos los contactos de la agenda, mostrando el nombre, el número de teléfono y el email en un formato de tabla.
        • Simula que el número de "Juan" ha cambiado y actualiza su número en el array.
        • Añade un nuevo contacto llamado "Laura" con el número "741852963".
        • Busca si el contacto "Pedro" está en la agenda y, si existe, muestra su número de teléfono y email. Si no, muestra un mensaje indicando que no se encontró el contacto.
        • Muestra la agenda completa actualizada, también en formato tabla.
    </p>

    <?php


    // nota: esta es la mejor forma de mostrar una tabla en php
    function mostrarAgenda($agenda)
    {
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Teléfono</th><th>Email</th></tr>";
        foreach ($agenda as $nombre => $datos) {
            echo "<tr>";
            echo "<td>$nombre</td>";
            // Mostrar teléfono si existe, si no, mostrar un guion
            echo "<td>" . (isset($datos['telefono']) ? $datos['telefono'] : '-') . "</td>";
            echo "<td>" . (isset($datos['email']) ? $datos['email'] : '-') . "</td>";
        }
        echo "</table>";
    }

    function buscarAgenda($agenda, $nombre)
    {
        if (isset($agenda[$nombre])) {
            echo "Teléfono: " . $agenda[$nombre]['telefono'] . "<br>";
            echo "Email: " . $agenda[$nombre]['email'] . "<br>";
        } else {
            echo "No se encontró el contacto $nombre";
        }
    }

    $agenda = [
        "Juan" => [
            "telefono" => "123456789",
            "email" => "juan@example.com"
        ],
        "Ana" => [
            "telefono" => "987654321",
            "email" => "ana@example.com"
        ],
        "Luis" => [
            "telefono" => "456123789",
            "email" => "luis@example.com"
        ]
    ];

    mostrarAgenda($agenda);
    echo "<br>";

    $agenda["Juan"]["telefono"] = "987654321";
    mostrarAgenda($agenda);

    $agenda += ["Laura" => ["telefono" => "741852963"]];
    echo "<br>";
    mostrarAgenda($agenda);

    echo "<br>";
    buscarAgenda($agenda, "Pedro");

    mostrarAgenda($agenda);




    ?>

    <h2>22</h2>
    <p>
        Escribir un script en PHP que gestiona un conjunto de dato$datos bancarios en una cuenta corriente, donde cada uno es:
        • La clave del array es el número de cuenta.
        • El valor de cada elemento es un array asociativo con el tipo de dato$dato (solo puede ser [I]ngreso o [R]eintegro), la fecha del dato$dato (si quieres, y te atreves, usa un objeto date), concepto y cantidad.
        • Listar en formato de tabla la cantidad total de ingresos, reintegros y el saldo de la cuenta.
        • Buscar si ha habido algún ingreso procedente de una transferencia bancaria. Pista: función str_contains().
    </p>


    <?php
    $banco = [
        "123456" => [
            ["tipo" => "I", "fecha" => "2020-01-01", "concepto" => "Nómina", "cantidad" => 1000],
            ["tipo" => "R", "fecha" => "2020-01-05", "concepto" => "Alquiler", "cantidad" => 500],
            ["tipo" => "I", "fecha" => "2020-01-10", "concepto" => "Venta de muebles", "cantidad" => 300]
        ],
        "654321" => [
            ["tipo" => "I", "fecha" => "2020-01-02", "concepto" => "Transferencia", "cantidad" => 200]
            ]
        ];
        
        function mostrarCuentas($banco)
        {
            echo "<table border='1'>";
            echo "<tr>
            <th>Cuenta</th>
            <th>Tipo</th>
        <th>Fecha</th>
        <th>Concepto</th>
        <th>Cantidad</th>
        </tr>";

        foreach ($banco as $cuenta => $datos) {
            foreach ($datos as $dato) {
                echo "<tr>";
                echo "<td>$cuenta</td>";
                echo "<td>" . (isset($dato['tipo']) ? $dato['tipo'] : '-') . "</td>";
                echo "<td>" . (isset($dato['fecha']) ? $dato['fecha'] : '-') . "</td>";
                echo "<td>" . (isset($dato['concepto']) ? $dato['concepto'] : '-') . "</td>";
                echo "<td>" . (isset($dato['cantidad']) ? $dato['cantidad'] : '-') . "</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }

    function saldoCuentas($banco)
    {
        $ingresos = 0;
        $reintegros = 0;
        foreach ($banco as $cuenta => $datos) {
            foreach ($datos as $dato) {
                if ($dato['tipo'] == 'I') {
                    $ingresos += $dato['cantidad'];
                } else {
                    $reintegros += $dato['cantidad'];
                }
            }
            echo "<table border='1'>";
            echo "<tr>
        <th>Cuenta</th>
        <th>Cantidad</th>
        </tr>";
        echo "<tr>";
        echo "<td>$cuenta</td>";
        echo "<td>" . ($ingresos - $reintegros) . "</td>";
        echo "</tr>";
        echo "</table>";
    }
}

function buscarTransferencias($banco)
{
    echo "<h3>Ingresos por Transferencia Bancaria</h3>";
    foreach ($banco as $cuenta => $datos) {
        foreach ($datos as $dato) {
            if ($dato['tipo'] == 'I' && str_contains($dato['concepto'], 'Transferencia')) {
                echo "Cuenta: $cuenta, Fecha: " . $dato['fecha'] . ", Concepto: " . $dato['concepto'] . ", Cantidad: " . $dato['cantidad'] . "<br>";
            }
        }
    }
}

mostrarCuentas($banco);
echo "<br>";
saldoCuentas($banco);
echo "<br>";
buscarTransferencias($banco);



    ?>







    <br><br><br><br><br><br><br><br><br><br>
</body>

</html>