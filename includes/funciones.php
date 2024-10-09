<?php
function inicio_html($titulo, $estilos) { ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
        foreach ($estilos as $estilo) {
            "<\t\tlink rel='stylesheet' type='text/css' href='$estilo'>\n";
        }
?>
        
        <title><?=$titulo?></title>
    </head>
    <body>
<?php
}

function fin_html() { ?>
        </body>
    </html>
<?php
}
?>