<?php
$uploadDir = "uploads/";
$skull = "188409.png";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include("captura.html");
    exit;
}
function limpiar($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

$nombre = limpiar($_POST["nombre"] ?? "");
$alias = limpiar($_POST["alias"] ?? "");
$edad = intval($_POST["edad"] ?? 0);
$armas = limpiar($_POST["armas"] ?? "NO");
$magia = limpiar($_POST["SI"] ?? "NO");
$mensajeError = "";
$imagenFinal = $skull;

if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
    $nombreTmp = $_FILES["imagen"]["tmp_name"];
    $nombreArchivo = basename($_FILES["imagen"]["name"]);
    $tipo = mime_content_type($nombreTmp);
    $tamano = $_FILES["imagen"]["size"];

    if ($tipo !== "image/png") {
        $mensajeError = "⚠️ Solo se permiten imágenes PNG.";
    } elseif ($tamano > 10 * 1024) {
        $mensajeError = "⚠️ La imagen excede los 10KB.";
    } else {
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $rutaDestino = $uploadDir . uniqid("jugador_") . ".png";
        if (move_uploaded_file($nombreTmp, $rutaDestino)) {
            $imagenFinal = $rutaDestino;
        } else {
            $mensajeError = "⚠️ Error al subir la imagen.";
        }
    }
} else if ($_FILES["imagen"]["error"] !== UPLOAD_ERR_NO_FILE) {
    $mensajeError = "⚠️ Error al subir la imagen.";
}
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
        <div id="texto">
            <p><strong>Nombre:</strong> <?= $nombre ?></p>
            <p><strong>Alias:</strong> <?= $alias ?></p>
            <p><strong>Edad:</strong> <?= $edad ?></p>
            <p><strong>Armas sleccionadas:</strong> <?= $armas ?></p>
            <p><strong>¿Practicas artes mágicas?</strong> <?= $magia ?></p>
        </div>
        <div id="campoImagen">
            <h3>Imagen:</h3>
            <img src="<?= $imagenFinal ?>" alt="Imagen del jugador">
            <?php if ($mensajeError): ?>
                <p class="error"><?= $mensajeError ?></p>
            <?php endif; ?>
        </div>
    </div>
    
</body>
</html>