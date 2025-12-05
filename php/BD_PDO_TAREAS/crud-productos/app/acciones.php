<?php
include_once "Producto.php";
include_once 'AccesoDatos.php';

function accionBorrar ($nombre){    
    $db = AccesoDatos::getModelo();
    $tprod = $db->borrarProducto($nombre);
    $orden = "Borrar";
}

function accionTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
    header("Refresh:0 url='./index.php'");
}
 
function accionAlta(){
    $prod = new Producto();
    $prod->nombre  = "";
    $prod->precio   = "";
    $prod->stock   = "";
    $orden= "Nuevo";
    include_once "layout/formulario.php";
}

function accionDetalles($nombre){
    $db = AccesoDatos::getModelo();
    $prod = $db->getProducto($nombre);
    $orden="Detalles";
    include_once "layout/formulario.php";
}


function accionModificar($nombre){
    $db = AccesoDatos::getModelo();
    $prod = $db->getProducto($nombre);
    $orden="Modificar";
    include_once "layout/formulario.php";
}

function accionPostAlta(){
    $prod = new Producto();
    $prod->nombre  = $_POST['nombre'];
    $prod->precio   = $_POST['precio'];
    $prod->stock   = $_POST['stock'];
    $db = AccesoDatos::getModelo();
    $db->addProducto($prod);
    
}

function accionPostModificar(){
    
    $prod = new Producto();
    $prod->nombre = $_POST['nombre'];
    $prod->precio = $_POST['precio'];
    $prod->stock = $_POST['stock'];
    $db = AccesoDatos::getModelo();
    $db->modProducto($prod);
    
}