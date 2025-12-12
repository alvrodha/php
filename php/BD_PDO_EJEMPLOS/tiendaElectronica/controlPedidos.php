<?php

include_once 'datos/AccesoDatos.php';

$nombre = $_GET['nom_cliente'];
$clave  = $_GET['clave'];

$ac = AccesoDatos::getModelo();
$cliente = $ac->getCliente($nombre, $clave);

if ($cliente) {
    $tablaPedidos = $ac->getPedidos($cliente->cod_cliente);
    $ac->incrementarVeces($cliente->cod_cliente);
    echo "Pedidos del cliente " . $cliente->cod_cliente . ":<br> Total pedidos: " . count($tablaPedidos) . "<br>";
    //include 'vistas/vistaPedidos.php';
} else {echo "Cliente no encontrado o clave incorrecta.";}
?>