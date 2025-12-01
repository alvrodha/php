<?php
const FACIL = 12;
const MEDIO = 16;
const DIFICIL = 30;

function generarTablero($columnas, $filas) {
    $tablero = [];
    for ($fila = 0; $fila < $filas; $fila++) {
        for ($columna = 0; $columna < $columnas; $columna++) {
            $tablero[$fila][$columna] = 0;
        }
    }
    return $tablero;
}

function mostrarTablero($tablero) {
    $filas = count($tablero);
    $columnas = count($tablero[0]);
    $msg = "<table border='1' id='tablero'>";
    for ($fila = 0; $fila < $filas; $fila++) {
        $msg .= "<tr>";
        for ($columna = 0; $columna < $columnas; $columna++) {
            $msg .= "<td>" . $tablero[$fila][$columna] . "</td>";
        }
        $msg .= "</tr>";
    }
    $msg .= "</table>";
    return $msg;
}

function introducirBombas($tablero, $dificultad) {
    $filas = count($tablero);
    $columnas = count($tablero[0]);
    $numBombas = 0;

    switch ($dificultad) {
        case 'facil':
            $numBombas = FACIL * $filas * $columnas / 100;
            break;
        case 'medio':
            $numBombas = MEDIO * $filas * $columnas / 100;
            break;
        case 'dificil':
            $numBombas = DIFICIL * $filas * $columnas / 100;
            break;
        default:
            $numBombas = FACIL * $filas * $columnas / 100;
    }

    for ($i = 0; $i < $numBombas; $i++) {
        $numRandomFilas = random_int(0, $filas - 1);
        $numRandomColumnas = random_int(0, $columnas - 1);
        if ($tablero[$numRandomFilas][$numRandomColumnas] = 0) {
            $tablero[$numRandomFilas][$numRandomColumnas] = -1;
            $numBombas--;
        }
    }
    return $tablero;
}

function generarNumero($tablero) {
    $filas = count($tablero);
    $columnas = count($tablero[0]);
    $minasAlrededor = 0;

    for ($fila = 0; $fila < $filas; $fila++) {
        for ($columna = 0; $columna < $columnas; $columna++) {
            if ($tablero[$fila][$columna] != -1) {
                for ($i = -1; $i <= 1; $i++) {
                    for ($j = -1; $j <= 1; $j++) {
                        if ($i == 0 && $j == 0) {
                            continue;
                        }
                        $nuevaFila = $fila + $i;
                        $nuevaColumna = $columna + $j;
                        if ($nuevaFila >= 0 && $nuevaFila < $filas && $nuevaColumna >= 0 && $nuevaColumna < $columnas) {
                            if ($tablero[$nuevaFila][$nuevaColumna] == -1) {
                                $minasAlrededor++;
                            }
                        }
                    }
                }
                $tablero[$fila][$columna] = $minasAlrededor;
                $minasAlrededor = 0;
            }
        }
    }
    return $tablero;
}


?>