<?php
require_once ('dat/datos.php');
/**
 *  Devuelve true si el código del usuario y contraseña se 
 *  encuentra en la tabla de usuarios
 *  @param $login : Código de usuario
 *  @param $clave : Clave del usuario
 *  @return true o false
 */
function userOk($login,$clave):bool {
    global $usuarios;
    $allOk = false;
    if (isset($usuarios[$login]) && $usuarios[$login][1] == $clave) {
        $allOk = true;
        $contSesion = 0;
    }
    return $allOk;
}

/**
 *  Devuelve el rol asociado al usuario
 *  @param $login: código de usuario
 *  @return ROL_ALUMNO o ROL_PROFESOR
 */
function getUserRol($login){
    global $usuarios;
    return $usuarios[$login][2];
}

/**
 *  Muestra las notas del alumno indicado.
 *  @param $codigo: Código del usuario
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */
function verNotasAlumno($codigo):String{
    $msg="";
    global $nombreModulos;
    global $notas;
    global $usuarios;

    $msg .= " Bienvenido/a alumno/a: ". $usuarios[$codigo][0];
    $msg .= "<table>";
    for ($i = 0; $i < count($notas) - 1; $i++ ) {
        $msg .= "<tr><td>" . $nombreModulos[$i] . "</td><td>" . $notas[$codigo][$i] . "</td></tr>";
    }
    $msg .= "</table>";
    return $msg;
}

/**
 *  Muestra las notas de todos alumnos. 
 *  @param $codigo: Código del profesor
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */
function verNotaTodas ($codigo): String {
    $msg="";
    global $nombreModulos;
    global $notas;
    global $usuarios;
    $msg .= " Bienvenido Profesor: ". $usuarios[$codigo][0];
    $msg .= "<table>";
    for ($y = 0; $y < 6; $y++) {
        $msg .= "<tr>";
        for ($x = 0; $x < 6; $x++) {
            if ($y = 0) {
                $msg .= "<td>xx</td>";
            } else {
                $msg .= "yy";
            }
        }
        $msg .= "</tr>";
        
/* 
        if ($y = 0) {
            for ($x = 0; $x < count($nombreModulos); $x++) {
                if ($x = 0) {$msg .= "<tr><tr>Nombre</td>";} elseif ($x > 0 && $x < 4){
                    $msg .= "<td>" . $nombreModulos[$x - 1] . "</td>";
                } else {
                    $msg .= "</tr>";
                }
            }
        } else {
            for ($x = 0; $x < count($nombreModulos); $x++) {
                if ($x = 0) {$msg .= "<tr><td>" . $usuarios[$y][0] . "</td>";} elseif ($x > 0 && $x < 4) {
                    $msg .= "<td>" . $notas[$usuarios[$x -1]][$y]. "</td>";
                } else {
                    $msg .= "</tr>";
                }
            } 
        }
*/
    }  
    
    $msg .= "</table>";
    return $msg;
}