<?php
session_start();
$contenido = "";


if (isset($_GET["nuevapartida"])) {
    session_destroy();
    header("Refresh:0");
    exit();
}

if (!isset($_SESSION['numeroOculto'])) {
    $_SESSION['numeroOculto'] = random_int(1, 20);
    $contenido .= "<h1>¡BIENVENIDO!</h2>";
} else {
    if (isset($_REQUEST['numeroUsuario'])) {
        $numu = $_REQUEST['numeroUsuario'];
        $numx = $_REQUEST['numeroOculto'];
        if ($numu == $numx){
            $contenido .= "¡Enorabuena, has acertado el número!";
            header("Refresh:2");
            session_destroy();

        } elseif ($numu > $numx) {
            $contenido .= "Te has pasado<br>";
        } else {
            $contenido .= "Te has quedado corto<br>";
        }
    }
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
    <h2>
        <?= $contenido ?>
        Adivina un número entre 1 y 20:
    </h2>
    <form method="get">
        Introduce un número: <input name="numeroUsuario" type="number" size="5">
    </form>
    <form method="get">
        <input type="submit" name="nuevapartida" value="Nueva Partida">
    </form>
</body>
</html>