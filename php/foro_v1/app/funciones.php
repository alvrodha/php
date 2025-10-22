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

function calcularLetra($comentario): String {
    $comentario = strtolower($comentario);
    $frecuencia = count_chars($comentario, 1);
    $letraMasRepetida = chr(array_search(max($frecuencia), $frecuencia));
    return $letraMasRepetida;
}

function calcularPalabra ($comentario): String {
    $comentario = strtolower($comentario);
    $palabras = str_word_count($comentario, 1);
    $frecuencias = array_count_values($palabras);
    $masRepetida = array_search(max($frecuencias), $frecuencias);
    return $masRepetida;
}
