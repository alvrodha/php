<?php
$contenido = "";
if (isset($_GET['fichero'])){
    $nombreFichero = $_GET['fichero'];
    if (is_readable(($nombreFichero))){
        $tlinea = file($nombreFichero);
        $cont = 1;
        $contenido = "<code><pre>";
        foreach ($tlinea as $linea){
            $contenido .= $cont . ":" . htmlspecialchars($linea);
            $cont++;
        }
        $contenido .= "</pre></code>";
        $contenido .= "Nº de lineas: " . $cont . "<br>";
        $contenido .= "Nº de caracteres: " . filesize($nombreFichero) . "<br>";
    } else {
        $contenido = "El fichero no es legible o no se puede leer.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ7-02</title>
</head>
<body>
    <h1>Mostrando un fichero</h1>
    <?php if ($contenido) : ?>
        <?= $contenido ?>
    <?php else : ?>
    <form>
        Fichero a mostrar: <input type="text" name="fichero">
    </form>
    <?php endif; ?>
</body>
</html>