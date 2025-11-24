<?php

$contenido = false;

if (isset($_GET['directorio'])) {
    $nombreDirectorio = $_GET['directorio'];

    if (is_dir($nombreDirectorio)) {
        if (opendir($nombreDirectorio)) {
            $tablaFicheros = infoDir($_GET['directorio']);
            $contenido  = "<table><th>Nombre</th><th>Tipo</th><th><Tamaño</th>";
            foreach ($tablaFicheros as $datosf) {
                $contenido .= "<tr><td>" . $datosf[0] . "</td><td>" . $fatosf[1] . "</td><td>" . $datosf[2] . "</td></td>";
            }
            $contenido .= "</table>";
        } else {
            die("No se puede habrir el directorio: " . $nombreDirectorio);
        }
    } else {
        die("No existe el directorio: " . $nombreDirectorio);
    }   
}

function infoDir($dir):array {
    $resu = [];

    if ($dh = opendir($dir)) {
        while (($file = readdir($dir)) !== false) {
            $resu ;
            $nombreRuta = $dir . "/" . $file;
            filesize($nombreRuta);
        }
    }

    return $resu;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Mostrando un directorio</h1>
    <?php if ($contenido) : ?>
        <?= $contenido ?>
    <?php else : ?>
    <form>
        Directorio a mostrar: <input type="text" name="directorio">
    </form>
    <?php endif; ?>
    
</body>
</html>