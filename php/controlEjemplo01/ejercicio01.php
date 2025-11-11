<?php
define('CUENTAFICHERO', 'misaldo.txt');
if (!isset($_SESSION['token'])) {
    header ('Location: acceso.php?msg=Error+de+acceso 1');
    exit();
}


if ($_SESSION['token'] != $_POST['token']) {
    header("Location: acceso.php?msg=" . urlencode($msg));
    exit();
}

$saldo = file_get_contents(CUENTAFICHERO);
echo $saldo;

if ($_POST['Orden'] == "Ver saldo") {
    $msg = "Su saldo acutal es: " . number_format($saldo, 2);
    header("Location: aceceso.php?msg=" . urlencode($msg));
}

if (empty($_POST['importe']) || !is_numeric($_POST['importe']) || $_POST['importe'] <= 0) {
    $msg = "Importe Erroneo o importe menor de 0";
    header("Location: acceso.php?msg=" . urlencode($msg));
    exit();
}

$importe = $_POST['importe'];
if ($_POST['Orden'] == "Ingreso") {
    $saldo += $importe;
    file_put_contents(CUENTAFICHERO, $saldo);
    $msg = "Operacion realizada";
    header("Location: acceso.php?msg=" . urlencode($msg));
}

if ($_POST['Orden'] == "Reintegro") {
    if ($importe <= $saldo) {
        $saldo += $importe;
        file_put_contents(CUENTAFICHERO, $saldo);
        $msg = "Operacion realizada";
    } else {
        $msg = "Importe erroneo";
    }
    
    header("Location: acceso.php?msg=" . urlencode($msg));
}


?>