<?php
    function generarTabla ($filas, $columnas, $borde, $contenido) {
        echo"<table style=\" border:$borde px solid black; border-collapse:collapse; >";
        for ($i = 0; $i < $filas; $i++) {
            echo "<tr style='border:$borde' px solid black; border-collapse:collapse; \">";
            for ($j = 0; $j < $columnas; $j++) {
                echo "<td style=\" border:$borde". "px solid black; border-collapse:collapse; \">$contenido</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ2-05</title>
</head>
<body>
    <hr>
    <?php generarTabla (4, 7, 3, "hola"); ?>
    <hr>
    <?php generarTabla (10, 3, 5, "adios"); ?>
    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr>
    
</body>
</html>