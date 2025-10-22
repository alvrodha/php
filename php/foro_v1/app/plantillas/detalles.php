<?php include_once("funciones.php"); ?>
<div>
<b> Detalles:</b><br>
<table>
<tr><td>Longitud:          </td><td><?= strlen($_REQUEST['comentario']) ?></td></tr>
<tr><td>Nº de palabras:    </td><td><?= strlen(str_replace(' ', '', $_REQUEST['comentario'])) ?></td></tr>
<tr><td>Letra + repetida:  </td><td><?= calcularLetra($_REQUEST['comentario']) ?></td></tr>
<tr><td>Palabra + repetida:</td><td><?= calcularPalabra($_REQUEST['comentario']) ?></td></tr>
</table>
</div>