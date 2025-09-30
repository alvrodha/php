<?php
    function calSuma($valor1, $valor2, &$resu) {
        $resu = $valor1 + $valor2;
    }
    function calResta($valor1, $valor2, &$resu) {
        $resu = $valor1 - $valor2;
    }
    function calMultiplicacion($valor1, $valor2, &$resu) {
        $resu = $valor1 * $valor2;
    }
    function calDivision($valor1, $valor2, &$resu) {
        $resu = $valor1 / $valor2;
    }
    function calElevar($valor1, $valor2, &$resu) {
        $resu = $valor1 ** $valor2;
    }
    function calModulo($valor1, $valor2, &$resu) {
        $resu = $valor1 % $valor2;
    }
?>