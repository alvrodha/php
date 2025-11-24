<?php

define('FICHERO', 'accesos.txt');

$numVisitas = 0;
if (isset($_COOKIE['visitas'])) {
    $numVisitas = intval($_COOKIE['visitas']);
}
$numVisitas++;
setcookie("visitas", $numVisitas, time() + 90*24*3600);

$numero = 0;

if (file_exists(FICHERO)) {
    $contenido = @file_get_contents(FICHERO);
    if ($contenido === false) {
        exit("Error al abrir el fichero");
    }
    $numero = intval($contenido);
}
$numero++;

if (file_put_contents(FICHERO, $numero) === false) {
    exit("Error al escribir en el fichero");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ7-01</title>
</head>
<body>
    <h1>CONTADOR</h1>
    <br> Número de accesos desde este navegador = <?= $numVisitas ?>
    <br> Número de accesos Totales = <?= $numero ?>   
</body>
</html>
