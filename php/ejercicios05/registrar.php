<?php

function postvalor(String $elemento) {
    if (isset($_POST[$elemento])) {
        $resu = $_POST[$elemento];
    } else {
        $resu = "";
    }
    return $resu;
}

function estaVacio($valor)
{
    return empty(trim($valor));
}

function contieneMayus($contraseña) {
    for ($i = 0; $i < strlen($contraseña); $i++) {
        if (ctype_lower($contraseña[$i])) {
            return true;
        }
    }
    return false;
}

function contieneMinus($contraseña) {
    for ($i = 0; $i < strlen($contraseña); $i++) {
        if (ctype_lower($contraseña[$i])) {
            return true;
        }
    };
    return false;
}

function contieneDigi($contraseña) {
    for ($i = 0; $i < strlen($contraseña); $i++) {
        if (ctype_digit($contraseña[$i])) {
            return true;
        }
    }
    return false;
}

function contieneNoAlfa($contraseña) {
    for ($i = 0; $i < strlen($contraseña); $i++) {
        if (!ctype_alpha($contraseña[$i])) {
            return true;
        }
    }
    return false;
}

$msg = "";
$registrado = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $campoVacio = '';
    foreach ($_POST as $campo => $valor) {
        if (estaVacio($valor)) {
            $campoVacio = $campo;
            break;
        }
    }
    if ($campovacio != "") {
        $msg = "El campo $campovacio esta vacio <br>";
    } elseif ($_POST['contrasenna'] != $_POST['contrasennaCom'] ) {
        $msg .= 'Las contraseñas no son iguales';
    } elseif (strlen($_POST['contrasenna']) < 8) {
        $msg .= 'La contraseña no es lo suficientemente larga';
    } elseif (!contieneMayus($_POST['contrasenna'])) {
        $msg .= 'La contraseña no contiene mayúscula';
    } elseif (!contieneMinus($_POST['contrasenna'])) {
        $msg .= 'La contraseña no continen minúsculas';
    } elseif (!contieneDigi($_POST['contrasenna'])) {
        $msg .= 'La contraseña no contiene un dígito';
    } elseif (!contieneNoAlfa($_POST['contrasenna'])) {
        $msg .= 'La contraseña no contiene un caracter no alfanumérico';
    } else {
        $registrado = true;
    }
}

/*
function checkContrasenna() {
    $contrasenna = $_POST["contrasenna"];
    $contrasennaCom = $_POST["contrasennaCom"];
    $mensage = "";
    $correcta = false;
    if (strlen($contrasenna) < 8) {
        $correcta = false;
        $mensage = "La contraseña no supera los 8 caracteres";
    } elseif (strlen(($contrasenna)) > 1) {

    }
    return $correcta;
}

function obtenerMsg($mensaje) {
    $msg = $mensaje;
    return $msg;
}
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="default.css" rel="stylesheet" type="text/css" >
    <title>EJ5-02</title>
</head>
<body>
    <div id="container">
        <div id="header">
            <h1>Registro</h1>
        </div>
        <div id="content">
            <?php if (!$registrado): ?>
                <form method="post">
                    <fieldset>
                        Nombre: <input type="text" name="nombre" placeholder="Nombre"
                        value="<? postvalor('nombre') ?>" ><br>
                        Correo Electronico: <input type="text" name="correo" placeholder="Correo Electronico"
                        value=" <? postvalor('correo') ?> " ><br>
                        Contraseña: <input type="password" name="contrasenna" placeholder="Contraseña"
                        value=" <? postvalor('contrasenna') ?> " ><br>
                        Confirmar Contraseña: <input type="password" name="contrasennaCom" placeholder="Comfirmar Contraseña"
                        value=" <? postvalor('contrasennaCom') ?> " ><br>
                        <input type="submit" value="enviar">
                        <input type="reset" value="limpiar">
                    </fieldset>
                    
                </form> 
                <?= $msg ?>
            <?php else: ?>
                <p>Registro Exitoso</p>
            <?php endif ?> 
        </div>
    </div>
    
</body>
</html> 