<div>
<b> Detalles:</b><br>
<table>
<tr><td>Longitud:          </td><td><?= strlen($_REQUEST['comentario']) ?></td></tr>
<tr><td>Nº de palabras:    </td><td><?= strlen(str_replace(' ', '', $_REQUEST['comentario'])) ?></td></tr>
<tr><td>Letra + repetida:  </td><td><?= calcularLetra($_REQUEST['comentario']) ?></td></tr>
<tr><td>Palabra + repetida:</td><td><?= calcularPalabra($_REQUEST['comentario']) ?></td></tr>
</table>
</div>

<?php
function calcularLetra($comentario): String {
    $comentario = strtolower($comentario);
    $frecuencia = count_chars($comentario, 1);
    $letraMasRepetida = chr(array_search(max($frecuencia), $frecuencia));
    return $letraMasRepetida;
}

function calcularPalabra ($comentario): String {
    $comentario = strtolower($comentario);
    $palabras = str_word_count($comentario, 1);
    $frecuencias = array_count_values($palabras);
    $masRepetida = array_search(max($frecuencias), $frecuencias);
    return $masRepetida;
}
?>