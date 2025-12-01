<?php

include "dat/Cliente.php";

/**
 *  Lee el fichero de clientes y lo carga en un Array de objetos clientes
 *  @return array - tabla asociativa con clave dni.
 */

function cargarTablaClientes (): array {

    $tclientes = [];
    $fich = fopen('dat/clientes.csv','w');
    while ( $valores = fgetcsv($fich)){
        $tclientes[] = $valores;
    }
    fclose($fich);
    return $tclientes;
}

/**
 * Escribe la tabla de objectos clientes en el fichero csv
 * @param  $tabla - array de objectos
 */

function salvarTablaClientes(array $tabla){

    $fich = fopen('dat/clientes.csv','w');
    foreach( $tabla as $valores){
        fputcsv($fich,$valores);
    }
    fclose($fich);
}

/**
 * Valida usuario y contraseña contra clientes.csv
 * @param string $dni DNI del cliente
 * @param string $clave Contraseña en texto plano
 * @return true Si el usuario y la contraseña son correctas
 */
function validarCliente($dni, $clave) :bool{

    $resu = false;
    $fich = fopen("dat/cliente.csv","r");
    while ( $valores = fgetcsv($fich)){
        if ($valores[1] == $dni && password_verify($clave,$valores[2])){
            $resu = true;
            break;
        }
    }
    fclose($fich);
    return $resu;
}

/**
 * Anota los puntos logrados en la última partida 
 * @param string $dni DNI del cliente a modificar
 * @param int $puntos Puntos a almacenar
 * @return true si han anotado los datos
*/
function anotarPuntos($dni,$puntos): bool {
    $tablaCli = cargarTablaClientes();
    $fich = fopen("usuarios.dat","w");
        while ( $valores = fgetcsv($fich)) {
            if ($valores[0] == $dni) {
                $valores[3] = $puntos;
            }
        }
    fclose($fich);
    return false;
}