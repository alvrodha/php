<?php
require_once "precios.php";
session_start();

// Manejo de la sesión con dos valores
// 'cliente' => nombre del cliente
// 'pedidos' => array asociativo fruta => cantidad


// Nuevo cliente: anoto en la sesión su nombre y creo su tabla de pedidos vacía
if (isset($_GET['cliente']) && !isset($_SESSION['cliente'])) {
    $_SESSION['cliente'] = $_GET['cliente'];
    $_SESSION['pedidos'] = [];
}

// No hay definido un cliente
if (!isset($_SESSION['cliente'])) {
    require_once 'bienvenida.php';
    exit();
}


// Proceso las acciones 
if (isset($_POST["accion"])) {
    $fruta = $_POST["fruta"];
    $cantidad = $_POST["cantidad"];
    switch ($_POST["accion"]) {
        case " Anotar ":
            if (isset($_SESSION["pedidos"][$fruta])) {
                $_SESSION["pedidos"][$fruta] += $cantidad;
            } else {
                $_SESSION["pedidos"][$fruta] = $cantidad;
            }
            break;
        case " Anular ":
            unset($_SESSION["pedidos"][$fruta]);
            break;
        case " Terminar ":
            $compraRealizada = htmlTablaPedidos($precios);
            // Destruyo la sesión y vuelvo a la página de bienvenida
            require_once "despedida.php";
            session_destroy();
            exit();
    }
}

$compraRealizada = htmlTablaPedidos($precios);
require_once 'compra.php';

function htmlTablaPedidos($precios): string {
    $msg = "";
    $msg .= "<table>";
    $importeTotal = 0;
    $msg .= "<th>Fruta</th><th>Cantidad</th><th>Subtotal</th>";
    foreach ($_SESSION['pedidos'] as $fruta => $cantidad) {
        $precio = $precios[$fruta];
        $importe = $precio * $cantidad;
        $importeTotal += $importe;
        $msg .= "<tr><td>" . $fruta . ": </td><td>" . $cantidad . "<td></td>" . $importe . "</td></tr>";
    }
    $msg .= "<tr><td>Importe Total: " . $importeTotal . "</td></tr>";
    $msg .= "</table";
    return $msg;
}