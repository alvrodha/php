<?php
    function hayarMaximo($array) {
        $maxProv = 0;
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] > $maxProv) {
                $maxProv = $array[$i];
            }
        }
        return $maxProv;
    }

    function hayarMinimo($array) {
        $minProv = 0;
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] < $minProv) {
                $minProv = $array[$i];
            }
        }
        return $minProv;
    }

    function hayarModa($array) {
    $frecuencias = array_count_values($array);
    arsort($frecuencias);
    $moda = array_key_first($frecuencias);
    return $moda;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3-01</title>
</head>
<body> 
    <hr>
    <?php
        $array [] = 0;
        
            for ($i = 0; $i < 20; $i++) {
                $array[] = random_int(1,10);
                echo $array[$i]. " ";
            }

        $maximo = hayarMaximo($array);
        echo "<br>Máximo = $maximo";
        $minimo = hayarMinimo($array);
        echo "<br>Mínimo = $minimo";
        $masRepertido = hayarModa($array);
        echo"<br>Valor mas repetido=  $masRepertido" ;
    ?>
    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr>
    
</body>
</html>