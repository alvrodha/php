<?php 
define ('FILEUSER','dat/usuarios.txt');
/**
 * 
 * Compruba que la usuario y la contraseña son correctos consultando
 * el archivo de datos
 * @param mixed $login
 * @param mixed $passwd
 * @return bool
 */
function userOk ( $login, $passwd):bool {
    $tuUsuarioLinea = @file(FILEUSER);
    if (!$tuUsuarioLinea) {
        die("Error al abrir el fichero");
    }
    foreach ($tuUsuarioLinea as $lineaUser) {
        $datosUser = explode("|", $lineaUser);
        if ($datosUser[0] == $login && password_verify($passwd, $datosUser[1])) {
            return true;
        }
    }
    return false;
}

/**
 *  Actualiza la password de un usuario en el archivo de datos
 * @param mixed $login
 * @param mixed $passwd
 * @return bool true si el usuarios existe en el fichero
 */
function updatePasswd ($login, $passwd):bool {
    if (userOk($login, $passwd)) {
        
    }
    return true;
}


