<?php

include "dat/Cliente.php";

/**
 *  Lee el fichero de clientes y lo carga en un Array de objetos clientes
 *  @return array - tabla asociativa con clave dni.
 */

function cargarTablaClientes (): array {

    $tclientes = [];
    $fich = fopen('dat/clientes.csv','r');
    while ( $datosCli = fgetcsv($fich)){
        $cli = new Cliente( $datosCli[0],$datosCli[1],$datosCli[2],$datosCli[3]);
        $tclientes[$cli -> dni] = $cli;
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
    foreach( $tabla as $cli){
        $tablaDatos = [ $cli->dni, $cli->nombre, $cli->clavehash, $cli->puntos ];
        fputcsv($fich,$tablaDatos);
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

    $tablaCli = cargarTablaClientes();
    if (array_key_exists($dni, $tablaCli) && password_verify($clave, $tablaCli[$dni]->clavehash)) {
        $tablaCli[$dni]->puntos = $puntos;
        salvarTablaClientes($tablaCli);
        return true;
    } else {
        return false;
    }
}

/**
 * Anota los puntos logrados en la última partida 
 * @param string $dni DNI del cliente a modificar
 * @param int $puntos Puntos a almacenar
 * @return true si han anotado los datos
*/
function anotarPuntos($dni,$puntos): bool {
    $tablaCli = cargarTablaClientes();
    if (array_key_exists($dni, $tablaCli) && password_verify($clave, $tablaCli[$dni]->clavehash)) {
        $tablaCli[$dni]->puntos = $puntos;
        salvarTablaClientes($tablaCli);
        return true;
    } else {
        return false;
    }
}