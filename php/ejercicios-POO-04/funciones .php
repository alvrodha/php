<?php
require_once ("BiciElectrica.php");

function cargarBicis():array {
    $fich = @fopen("Bicis.csv", "r");
    if ( $fich == false ) {
        die("Error al abrir el fichero");
    }

    $tabla = [];

    while ($valor = fgetcsv($fich)) {
        list($id, $cx, $cy, $bat, $op) = $valor;
        $bici = new BiciElectrica($id, $cx, $cy, $bat, $op);
        $tabla [] = $bici;
    }

    return $tabla;

}

function mostrartablabicis($tabla) {
    $cadena ="<table><tr><td>ID</td><td>Coord x</td><td>Coord y</td><td>Batería</td></tr>";

    foreach ($tabla as $bici) {
        $cadena .= "<tr>";
        $cadena .= "<td>" . $bici -> id . "</td>";
        $cadena .= "<td>" . $bici -> coordx . "</td>";
        $cadena .= "<td>" . $bici -> coordy . "</td>";
        $cadena .= "<td>" . $bici -> bateria . "</td>";
        $cadena .= "</tr>";
    }

    $cadena .= "</table>";

    return $cadena;
}

function bicimascercana($tabla, $x, $y) {

    $bicicerca = null;
    $distanciamin = PHP_INT_MAX;

    foreach($tabla as $bici) {
        if ($bici -> operativa == 1) {
            $longitud = $bici -> distancia($x, $y);
            if ($longitud < $distanciamin) {
                $bicicerca = $bici;
                $distanciamin = $longitud;
            }
        }

    }
    return $bicicerca;
}
?>