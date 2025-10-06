<?php
    $tusuarios = [
    'pepe' => '1234',
    "luis" => "siul",
    "admin" => "admin"
    ];

    $msg = "";

    if (empty($_REQUEST['nombre']) || empty($_REQUEST['clave'])) {
        $msg = "Error: faltan valores, introducir el usuario y la contraseña.<br>";
        return $msg;
    }

    $usuario = $_REQUEST["nombre"];
    $clave = $_REQUEST["clave"];

    if (key_exists($usuario, $tusuarios) && $tusuarios[$usuario] == $clave) {
        echo "Bienvenido". $usuario;
    } else {
        echo "Usuario y/o contraseña inválidos". $usuario;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ4-01</title>
</head>
<body>

    
</body>
</html>