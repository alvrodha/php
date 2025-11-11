<?php
$contenido = false;
$dir = $_GET('directorio');

if (isset($dir)) {
    if (is_dir($dir)){
        $tablaDir = infoDir($dir);

    } else {
        $contenido .= "No es un directorio";
    }
} else {
    $contenido .= "Directorio no encontrado";
}

function infoDir($dir) :array {
    $resu = [];
    opendir($dir);
    return $resu;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ7-03</title>
</head>
<body>
    <?php if ($contenido ) : ?>
    <?= $contenido ?>
    <?php else : ?>
    <form>
        <label>Directorio:</label>
        <input type="text" name="directorio">
        <input type="submit" value="Enviar">
    </form>
    <?php endif ?>
</body>
</html>