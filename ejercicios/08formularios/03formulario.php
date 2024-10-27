<?php

/*
Crear un script PHP para gestionar pizzas pedidas por Internet:
a) Todas las pizzas tienen tomate frito y queso como ingredientes básicos, con un precio inicial de 5 €.
b) Hay pizzas vegetarianas y no vegetarianas. La vegetariana tiene un incremento de 3 €. Las no vegetarianas tienen un incremento de 2 €.
c) El usuario puede añadir todos los ingredientes que quiera dentro de cada clase de pizza.
d) Crear un formulario para recoger pedidos de pizzas y generar una respuesta con todos los detalles de la pizza elegida, su coste desglosado y el coste total.
*/

require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

// Definir precios base y listas de ingredientes
$precioMinimo = 5;
$extraVegetal = 3;
$extraNoVegetal = 2;

$noVeg = [
    "Atún" => 2.00,
    "Carne picada" => 2.50,
    "Peperoni" => 1.75,
    "Morcilla" => 2.25,
    "Anchoas" => 1.50,
    "Salmón" => 3.00,
    "Gambas" => 4.00,
    "Langostinos" => 4.00,
    "Mejillones" => 2.00
];

$veg = [
    "Pepino" => 1.00,
    "Calabacín" => 1.50,
    "Pimiento verde" => 1.25,
    "Pimiento rojo" => 1.75,
    "Tomate" => 1.50,
    "Aceitunas" => 3.00,
    "Cebolla" => 1.00
];

inicio_html("Gestión de pizzas", ["/estilos/formulario.css", "/estilos/general.css", "/estilos/tabla.css"]);

// Función para obtener y sanear los datos del formulario
function obtenerDatosSaneados() {
    $opciones_filtrado = [
        'nombre' => FILTER_SANITIZE_SPECIAL_CHARS,
        'direccion' => FILTER_SANITIZE_SPECIAL_CHARS,
        'tlf' => FILTER_SANITIZE_NUMBER_INT,
        'tipoPizza' => FILTER_SANITIZE_SPECIAL_CHARS,
        'veg' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY | FILTER_NULL_ON_FAILURE
        ],
        'noVeg' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY | FILTER_NULL_ON_FAILURE
        ],
        'extrQueso' => FILTER_SANITIZE_NUMBER_INT,
        'bordQueso' => FILTER_SANITIZE_NUMBER_INT,
        'nPizzas' => FILTER_SANITIZE_NUMBER_INT
    ];

    return filter_input_array(INPUT_POST, $opciones_filtrado);
}

// Función para calcular el precio de la pizza
function calcularPrecioPizza($tipoPizza, $ingredientesVegetales, $ingredientesNoVegetales, $extraQueso, $bordQueso, $numPizzas, $precioMinimo, $extraVegetal, $extraNoVegetal, $veg, $noVeg) {
    $precioBase = $precioMinimo;
    $precioBase += ($tipoPizza == 'vegetariana') ? $extraVegetal : $extraNoVegetal;

    $precioIngredientes = 0;
    foreach ($ingredientesVegetales as $ing) {
        $precioIngredientes += $veg[$ing];
    }
    foreach ($ingredientesNoVegetales as $ing) {
        $precioIngredientes += $noVeg[$ing];
    }

    $precioIngredientes += $extraQueso ? 1 : 0; // Coste del extra queso
    $precioIngredientes += $bordQueso ? 1.5 : 0; // Coste del borde de queso

    return ($precioBase + $precioIngredientes) * $numPizzas;
}

// Función para mostrar el resumen del pedido
function mostrarResumenPedido($nombre, $direccion, $telefono, $tipoPizza, $ingredientesVegetales, $ingredientesNoVegetales, $extraQueso, $bordQueso, $numPizzas, $precioTotal) {
    echo "<h3>Resumen de tu pedido</h3>";
    echo "<p><strong>Nombre:</strong> $nombre</p>";
    echo "<p><strong>Dirección:</strong> $direccion</p>";
    echo "<p><strong>Teléfono:</strong> $telefono</p>";
    echo "<p><strong>Tipo de pizza:</strong> " . ucfirst($tipoPizza) . "</p>";
    echo "<p><strong>Ingredientes Vegetales:</strong> " . implode(", ", $ingredientesVegetales) . "</p>";
    echo "<p><strong>Ingredientes No Vegetales:</strong> " . implode(", ", $ingredientesNoVegetales) . "</p>";
    echo "<p><strong>Extra queso:</strong> " . ($extraQueso ? "Sí" : "No") . "</p>";
    echo "<p><strong>Borde de queso:</strong> " . ($bordQueso ? "Sí" : "No") . "</p>";
    echo "<p><strong>Número de pizzas:</strong> $numPizzas</p>";
    echo "<p><strong>Precio total:</strong> $precioTotal €</p>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])) {
    // Obtener y sanear los datos del formulario
    $datos_saneados = obtenerDatosSaneados();

    // Asignar valores saneados a variables
    $nombre = $datos_saneados['nombre'] ?? '';
    $direccion = $datos_saneados['direccion'] ?? '';
    $telefono = $datos_saneados['tlf'] ?? '';
    $tipoPizza = $datos_saneados['tipoPizza'] ?? '';
    $ingredientesVegetales = $datos_saneados['veg'] ?? [];
    $ingredientesNoVegetales = $datos_saneados['noVeg'] ?? [];
    $extraQueso = isset($datos_saneados['extrQueso']) && $datos_saneados['extrQueso'] == '1' ? 1 : 0;
    $bordQueso = isset($datos_saneados['bordQueso']) && $datos_saneados['bordQueso'] == '1' ? 1 : 0;
    $numPizzas = $datos_saneados['nPizzas'] ?? 1;

    // Calcular el precio total de la pizza
    $precioTotal = calcularPrecioPizza($tipoPizza, $ingredientesVegetales, $ingredientesNoVegetales, $extraQueso, $bordQueso, $numPizzas, $precioMinimo, $extraVegetal, $extraNoVegetal, $veg, $noVeg);

    // Mostrar el resumen del pedido
    mostrarResumenPedido($nombre, $direccion, $telefono, $tipoPizza, $ingredientesVegetales, $ingredientesNoVegetales, $extraQueso, $bordQueso, $numPizzas, $precioTotal);

    fin_html();
} else {
    // Mostrar el formulario si no se ha enviado una solicitud POST
    ?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">
            </div>
            <div>
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion">
            </div>
            <div>
                <label for="tlf">Teléfono</label>
                <input type="tel" name="tlf" id="tlf">
            </div>
            <div>
                <label for="veg">Vegetales:</label>
                <select name="veg[]" id="veg" size="5" multiple>
                    <?php foreach ($veg as $nombre => $precio) : ?>
                        <option value="<?= $nombre ?>"><?= "$nombre - $precio €" ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="noVeg">No Vegetales:</label>
                <select name="noVeg[]" id="noVeg" size="5" multiple>
                    <?php foreach ($noVeg as $nombre => $precio) : ?>
                        <option value="<?= $nombre ?>"><?= "$nombre - $precio €" ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="extrQueso">Extra queso:</label>
                <input type="checkbox" name="extrQueso" id="extrQueso" value="1">
            </div>
            <div>
                <label>Tipo de pizza:</label>
                <input type="radio" name="tipoPizza" id="vegetariana" value="vegetariana" checked>
                <label for="vegetariana">Vegetariana</label>
                <input type="radio" name="tipoPizza" id="noVegetariana" value="noVegetariana">
                <label for="noVegetariana">No Vegetariana</label>
            </div>
            <div>
                <label for="bordQueso">Borde de queso:</label>
                <input type="checkbox" name="bordQueso" id="bordQueso" value="1">
            </div>
            <div>
                <label for="nPizzas">Número de pizzas:</label>
                <input type="number" name="nPizzas" id="nPizzas" min="1" max="5" value="1">
            </div>
            <div>
                <input type="submit" name="enviar" value="Enviar">
            </div>
        </fieldset>
    </form>
    <?php
    fin_html();
}
?>