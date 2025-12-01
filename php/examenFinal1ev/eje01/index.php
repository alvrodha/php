<?php
session_start();
include_once 'funciones.php';


if (!isset($_COOKIE['timeout']) && $tiempoFuera > 0) {
    if (isset($_SESSION['dni'])) {
        $tiempoFuera = 0;
        setcookie('timeout', $tiempoFuera, 60 * 10);
        if (isset($_GET['orden'])) {
            if ($_GET['orden'] == 'salir') {
                anotarPuntos($_SESSION['dni'],$_SESSION['puntos']);
                $tiempoFuera = $_COOKIE['timeout'];
                exit();
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
} else {
    
}





if ($_SERVER['REQUEST_METHOD'] == "GET" && !isset($_SESSION['dni'])) {
    include 'vistas/login.php';
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (!ctype_digit($_SESSION['puntos'])) {
        header("El balor de puntos no es numerico");
    } elseif (validarCliente($_SESSION['dni'], $_SESSION['clave'])) {
        header("DNI y contraseña incorrecta");
    } else {
        
        include 'vistas/puntos.php';
    }
}



