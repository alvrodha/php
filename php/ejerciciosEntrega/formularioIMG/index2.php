<?php
// Directorio de subida
$uploadDir = "uploads/";
$skull = "188409.png";

// Si es GET → mostrar el formulario
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include("captura.html");
    exit;
}

// Si es POST → procesar los datos
function limpiar($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

$nombre = limpiar($_POST["nombre"] ?? "");
$alias = limpiar($_POST["alias"] ?? "");
$edad = intval($_POST["edad"] ?? 0);
$mensajeError = "";
$imagenFinal = $skull;

// Validación de inyección
if (!preg_match("/^[a-zA-Z0-9 áéíóúÁÉÍÓÚñÑ]+$/u", $nombre) || 
    !preg_match("/^[a-zA-Z0-9 áéíóúÁÉÍÓÚñÑ]+$/u", $alias)) {
    $mensajeError = "⚠️ Campos con caracteres no permitidos.";
}

// Procesar imagen si existe
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
        // Intentar mover la imagen al directorio
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
} elseif ($_FILES["imagen"]["error"] !== UPLOAD_ERR_NO_FILE) {
    $mensajeError = "⚠️ Error al subir la imagen.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Datos del Jugador</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 30px; }
    img { max-width: 150px; display: block; margin-top: 10px; }
    .error { color: red; font-weight: bold; }
  </style>
</head>
<body>
  <h2>Datos del jugador</h2>
  <p><strong>Nombre:</strong> <?= $nombre ?></p>
  <p><strong>Alias:</strong> <?= $alias ?></p>
  <p><strong>Edad:</strong> <?= $edad ?></p>

  <h3>Imagen:</h3>
  <img src="<?= $imagenFinal ?>" alt="Imagen del jugador">
  <?php if ($mensajeError): ?>
    <p class="error"><?= $mensajeError ?></p>
  <?php endif; ?>

  <p><a href="index.php">Volver al formulario</a></p>
</body>
</html>
