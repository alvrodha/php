<?php
const FACIL = 0.12;
const MEDIO = 0.16;
const DIFICIL = 0.32;

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
            $numBombas = round(FACIL * $filas * $columnas);
            break;
        case 'medio':
            $numBombas = round(MEDIO * $filas * $columnas);
            break;
        case 'dificil':
            $numBombas = round(DIFICIL * $filas * $columnas);
            break;
        default:
            $numBombas = round(FACIL * $filas * $columnas);
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

    for ($fila = 0; $fila < $filas; $fila++) {
        for ($columna = 0; $columna < $columnas; $columna++) {
            if (esUnaBomba($tablero, $fila, $columna)) {
                for ($i = -1; $i < 1; $i++) {
                    for ($j = -1; $j < 1; $j++) {
                        if ($i = 0 && $j = 0) {
                            continue;
                        } else {
                            if (isset($tablero[$fila + $i][$columna + $j]) && !esUnaBomba($tablero, $fila + $i, $columna + $j)) {
                                $tablero[$fila + $i][$columna + $j]++;
                            }
                        }
                    }
                }
                /*
                if ($fila = 0 && $columna = 0) {
                    if (!esUnaBomba($tablero, $fila, $columna + 1)) {
                        $tablero[$fila][$columna + 1]++;
                    }
                    if (!esUnaBomba($tablero, $fila + 1, $columna + 1)) {
                        $tablero[$fila + 1][$columna + 1]++;
                    }
                    if (!esUnaBomba($tablero, $fila +1, $columna)) {
                        $tablero[$fila + 1][$columna]++;
                    }
                }
                if ($fila = 0) {
                    if (!esUnaBomba($tablero, $fila, $columna -1)) {
                        $tablero[$fila][$columna -1]++;
                    }
                    if (!esUnaBomba($tablero, $fila, $columna + 1)) {
                        $tablero[$fila][$columna + 1]++;
                    }
                }
                */
            }
        }
    }
    return $tablero;
}

function esUnaBomba($tablero, $fila, $columna) {
    return $tablero[$fila][$columna] == -1;
}
?>