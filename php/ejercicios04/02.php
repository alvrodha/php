<?php 
// Crear página que simule un calculadora sencilla, mediante un único archivo 02.php 
// que mostrará un formularios con dos campos numéricos y 4 botones con los 4 tipos 
// de operaciones + - * /  posibles. Se incluirá también 3 controles de tipo radio que 
// indicarán como queremos que se muestre el resultado en decimal, binario o hexadecimal.
//
// El programa php debe comprobar que se han recibido los dos valores numéricos y 
// detectará el error de intento de división por cero. Mostrará el resultado calculado 
// según el formato elegido. Por omisión se mostrará en decimal.

// FUNCIONES AUXILIARES

function operar($val1,$val2,$operacion):float | null {
    $resultado = 0.0;
    if ($val1 == 0 || $val2 == 0) {
        return null;
    } else {
        switch($operacion) {
            case "+": return $resultado = $val1 + $val2;
            case "-": return $resultado = $val1 - $val2;
            case "*": return $resultado = $val1 * $val2;
            case "/": return $resultado = $val1 / $val2;
        }
        return $resultado;
    }
}

function imprimirConFormato($formato,$valor)
{
    switch($formato) {
        case "dec": break;
        case "bin": $valor = decbin($valor);    break;
        case "hex": $valor = dechex($valor);    break;
    }
    return "Resultado: ".$valor;
}

// Si fuera por POST podia chequear $_SERVER['REQUEST_METHOD'] == 'POST'

if (isset($_GET["operacion"])) {
    $num1 = $_REQUEST['num1'];
    $num2 = $_REQUEST['num2'];
    $operacion = $_REQUEST['operacion'];
    $resu = operar($num1,$num2,$operacion);
    if ($resu == null) {
        $msg = 'Numeros inválidos';
    } else {
        $formato = $_REQUEST['formato'];
        $msg = imprimirConFormato($formato, $resu);
    }
}
require_once ("02vista.php");
?>