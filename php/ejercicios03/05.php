<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3-05</title>
</head>
<body>

    <?php
    /*
        $numSeleccionados = [];
        $numAux;
        $numComplementario = 0;
        
        for ($i = 0; $i < 6; $i++) {
            $numAux = random_int(0,49);
            for ($j = 0; $j < count($numSeleccionados); $j++) {
                if ($numSeleccionados[$j] == $numAux) {
                    $i--;
                } else {
                    $numSeleccionados = $numAux;
                }
            }
        }


        sort($numSeleccionados);
        $numComplementario = $numSeleccionados[count($numSeleccionados) -1];
        echo "<table><tr>";
        for ($l = 0; $l < count($numSeleccionados) - 1; $l++) {
            echo "<td>$numSeleccionados[$l]</td>";
        }
        echo "<td>$numComplementario</td></tr></table>";
    */
        $numSeleccionados = [];
        while (count($numSeleccionados) < 6) {
            $num = random_int(1, 49);
            if (!in_array($num, $numSeleccionados)) {
                $numSeleccionados[] = $num;
            }
        }

        $jugadaGanadora = array_slice($numSeleccionados, 0, 5);
        sort($jugadaGanadora);
        $numComplementario = $numSeleccionados[5];

        echo "<table border = '1' color = 'blue' style = 'text-align:center;'><tr>";
        foreach ($jugadaGanadora as $numero) {
            echo "<td>$numero</td>";
        }
        echo "<td>Complementario: $numComplementario</td></table></tr>";
    ?>

    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr>
</body>
</html>