<?php

// MUESTRA TODOS LOS USUARIOS
function mostrarDatos (){
    
    $titulos = [ "Nombre","precio","stock"];
    $msg = "<table>\n";
     // Identificador de la tabla
    $msg .= "<tr>";
    for ($j=0; $j < count($titulos); $j++){
        $msg .= "<th>$titulos[$j]</th>";
    }  
    $msg .= "</tr>";
    $auto = $_SERVER['PHP_SELF'];
    $db = AccesoDatos::getModelo();
    $tprod = $db->getProductos();
    foreach ($tprod as $prod) {
        $msg .= "<tr>";
        $msg .= "<td>$prod->nombre</td>";
        $msg .= "<td>$prod->precio</td>";
        $msg .= "<td>$prod->stock</td>";
        $msg .="<td><a href=\"#\" onclick=\"confirmarBorrar('$prod->nombre','$prod->precio');\" >Borrar</a></td>\n";
        $msg .="<td><a href=\"".$auto."?orden=Modificar&id=$prod->nombre\">Modificar</a></td>\n";
        $msg .="<td><a href=\"".$auto."?orden=Detalles&id=$prod->nombre\" >Detalles</a></td>\n";
        $msg .="</tr>\n";
        
    }
    $msg .= "</table>";
   
    return $msg;    
}

/*
 *  Funciones para limpiar la entreda de posibles inyecciones
 */

function limpiarEntrada(string $entrada):string{
    $salida = trim($entrada); // Elimina espacios antes y después de los datos
    $salida = strip_tags($salida); // Elimina marcas
    return $salida;
}
// Función para limpiar todos elementos de un array
function limpiarArrayEntrada(array &$entrada){
 
    foreach ($entrada as $key => $value ) {
        $entrada[$key] = limpiarEntrada($value);
    }
}

