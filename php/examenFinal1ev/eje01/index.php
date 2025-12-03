<?php
session_start();
include_once 'funciones.php';


if (isset($_SESSION['dni'])) {
    
    if (isset($_GET['orden'])) {
        if ($_GET['orden'] == 'salir') {
            anotarPuntos($_SESSION['dni'],$_SESSION['puntos']);
            session_destroy();
            include 'vistas/login.php';
        }
        if ($_GET['orden'] == 'continuar' && $_SESSION['puntos'] > 0 && $tiempoFuera = 0) {
            $numAle = random_int(1, 10);
            if ($numAle % 2 == 0) {
                $_SESSION['puntos'] += 50;
            } else {
                $_SESSION['puntos'] -= 50;
            }
            if ($_SESSION['puntos'] <= 0) {
                $_SESSION['puntos'] = 0;
            }
        }
    } 
    include 'vistas/puntos.php';
}


if ($_SERVER['REQUEST_METHOD'] == "GET" && !isset($_SESSION['dni'])) {
    include 'vistas/login.php';
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $dni = $_POST['dni'];
    $clave = $_POST['clave'];
    $puntos = $_POST['puntos'];

    if (is_numeric($puntos)) {
        if (validarCliente($dni, $clave)) {
            $_SESSION['dni'] = $dni;
            $_SESSION['puntos'] = $puntos;
            include 'vistas/puntos.php';
        } else {
            $msg = "DNI o clave incorrectos";
            include 'vistas/login.php';
        }
    } else {
        $msg = "Los puntos deben ser numéricos";
        include 'vistas/login.php';
    }

    if (!ctype_digit($_SESSION['puntos'])) {
        header("El balor de puntos no es numerico");
    } elseif (validarCliente($_SESSION['dni'], $_SESSION['clave'])) {
        header("DNI y contraseña incorrecta");
    } else {
        
        include 'vistas/puntos.php';
    }
}