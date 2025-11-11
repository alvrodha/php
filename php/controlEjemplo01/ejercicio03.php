<?php
$numeros = [1 => 'uno','dos','tres','cuatro','cinco','seis','siete','ocho', 'nueve', 'diez'];
$tmulti = [];

foreach ($numeros as $pos => $valor) {
    $tablaValores = [];
    for ($i = 1; $i <= 10; $i++) {
        $tablaValores[$i] = $i * $pos;
    }
    $tmulti[$valor] = $tablaValores;
}

var_dump($tmulti);

?>