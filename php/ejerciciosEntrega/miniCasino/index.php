<?php

require_once "bienvenida.php";
if (!isset($_COOKIE["visitas"])) {
    require_once "bienvenida.php";
    exit();
}

if (isset($_POST['saldoInit'])) {
    $saldoDisponible = $_POST['saldoInit'];
    require_once "juego.php";
}


?>
