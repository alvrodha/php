$tusuarios = [
    'pepe' => '1234',
    "luis" => "siul",
    "admin" => "admin"
];
$msg = "";
$error = false;

if (empty($_REQUEST['nombre']) ||  empty($_REQUEST['clave'])) {
    $msg = "Error: falta valores, introducir el  usuario y  la contraseña.<br> ";
    $error = true;
} else {
    // PELIGRO: No controlo la seguridad de las entradas
    $usuario = $_REQUEST['nombre'];
    $clave   = $_REQUEST['clave'];
    if (array_key_exists($usuario, $tusuarios) &&  $tusuarios[$usuario] == $clave) {
        $msg = " Bienvenido $usuario al sistema ";
    } else {
        $msg = "Error: Usuario y contraseña no válidos.<br> ";
        $error = true;
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="default.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="container" style="width: 400px;">
        <div id="header">
            <h1>Procesando formulario</h1>
        </div>

        <div id="content">
            <?= $msg ?>
            <?php if ($error) : ?>
                <button onclick='window.history.back();'>Volver</button>
            <?php endif ?>
        </div>
    </div>
</body>

</html>