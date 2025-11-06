<?php
session_start();
$contFallo = 0;

include_once('app/funciones.php');
if ($contFallo < 5) {
  if (  !empty( $_GET['login']) && !empty($_GET['clave'])){
      if ( userOk($_GET['login'],$_GET['clave'])){
        if ( getUserRol($_GET['login']) == ROL_PROFESOR){
          $contenido = verNotaTodas($_GET['login']);
        } else {
          $contenido = verNotasAlumno($_GET['login']);
        }
        include_once ('app/resultado.php');
      } 
      // userOK falso
      else {
        $contenido = "El número de usuario y la contraseña no son válidos";
        $contFallo++;
        include_once('app/acceso.php');
      }
  } else {
      $contenido = " Introduzca su número de usuario y su contraseña";
      include_once('app/acceso.php');
  }
} else {
  $contenido = "Superado el numero máximo de accesos Erroneos";
  include_once "app/acceso.php";
}



