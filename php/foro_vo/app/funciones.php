<?php
function usuarioOk($usuario, $contraseña) :bool {
   $valido = false;
   if (strlen($contraseña) > 8) {
      if (strrev($contraseña)== $usuario) {
         $valido = true;
      } else {
         $valido = false;
      }
   } else {
      $valido = false;
   }
   return $valido;
}
