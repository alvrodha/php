<?php
    include_once("infoPaises.php");

    $max = 0;
    $pais_max = "";

    foreach ($paises as $pais => $info) {
        if ($info["Poblacion"] > $max) {
            $max = $info["Poblacion"];
            $pais_max = $pais;
        }
    }

//Forma moderna
    $poblacionMax = number_format($max, 0, ',','.');
    $listaCiudades = $ciudades[$pais_max];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3-06</title>
</head>
<body>
    <p>
        País con más población: <?= $pais_max ?> con <?= $habitantes ?> habitantes<br>
    <table border=1>
        <tr>
            <td> <b>Ciudades:</b> </td>
            <?php foreach ($listaciudades as $ciudad) : ?>
                <td> <?= $ciudad ?></td>
            <?php endforeach ?>
        </tr>
    </table>
    </p>
    <hr>
    <?php show_source(__FILE__); ?>
    <hr>
    
</body>
</html>