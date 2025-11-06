<?php
$contenido = "";
if (isset($_GET['directorio'])){
    $nombreDirectorio = $_GET['directorio'];
    if (is_dir($nombreDirectorio)){
        
    } else {
        $contenido = "El directorio no es válido.";
    }
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
    <h1>Información de un directorio</h1>
    <fom>
        Ver información del directorio: <input type="text" name="directorio">
    </fom>
</body>
</html>