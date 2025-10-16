<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include("captura.html");
    exit();
}

$directorioSubida = "uploads/";
$imagenSubida = "";
$errorSubida = "";

if ($_FILES['imagen']['error'] != UPLOAD_ERR_NO_FILE) {
    if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK ) {
        $nombreArchivo = basename($_FILES["imagen"]["name"]);
        $rutaArchivo = $directorioSubida . $nombreArchivo;

        if ($_FILES['imagen']['type'] == "image/png" && $_FILES['imanen']['size'] <= 10000) {
            if  (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaArchivo)) {
                $imagenSubida = $rutaArchivo;
            } else {
                $errorSubida = "No se ha podido copiar la imagen";
            }
        } else {
            $errorSubida = "El fichero no es una imagen o supera el tamaño máximo";
        }
    } else {
        $errorSubida = "Error al subir el fichero ".$_FILES['imagen']['error'];
    }
} else {
    $errorSubida = 'No se ha indicao imagen a subir';
}

$nombre = htmlspecialchars($_POST['nombre']);
$alias = htmlspecialchars($_POST['alias']);
$edad = htmlspecialchars($_POST['edad']);

$armas = isset($_POST['armas']) ? $_POST['armas'] : [];
$artes_magicas = htmlspecialchars($_POST['artes_magicas']) === 'SI' ? 'Si' : 'No';

$listadearmas = count($armas) > 0 ? implode(', ', $armas) : 'Ninguna';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Datos del Jugador</title>
  <style>
    body {
        background: yellow;

    }

    h2 {
        text-align: center;
    }

    #content {
        display: flex;
        flex-direction: row;
        padding: 20px;
    }

    #texto {
        margin: 15px;
    }
  </style>
</head>
<body>
    <h2>Datos del jugador</h2>
    <div id="content">
        <table>
            <tr>
            <td>
                <p><strong>Nombre:</strong> <?= $nombre ?></p>
                <p><strong>Alias:</strong> <?= $alias ?></p>
                <p><strong>Edad:</strong> <?= $edad ?></p>
                <p><strong>Armas seleccionadas:</strong> <?= $listadearmas ?>
                </p>
                <p><strong>¿Practica artes mágicas?:</strong> <?= $artes_magicas ?></p>

            </td>
            <td>
                <?php if ($imagenSubida): ?>
                    <p><strong>Imagen subida:</strong></p>
                    <img src="<?= $imagenSubida; ?>" alt="Imagen del jugador">
                <?php else: ?>
                    <p><strong>No se subió ninguna imagen.</strong></p>
                    <img src="188409.png" alt="Imagen del jugador">
                    <p>
                        <?= $errorSubida ?>
                    </p>
                <?php endif; ?>
            </td>
            </tr>
        </table>
    </div>
    
</body>
</html>