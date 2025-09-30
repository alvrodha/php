<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ1-04</title>
</head>
<body>
    <?php
        $num_generado;
        $num_anterior;
        $veces_repetido;
        do{
            $num_generado = random_int(0,10);
            $i ++;
            if ($num_generado == $num_anterior) {
                $veces_repetido ++;
            }   else {
                $veces_repetido = 0;
            }
        } while ($veces_repetido < 6);
        echo "Han salido 6 seguidos tras generar $i números en " . microtime(true) . "milisegundos";
    ?>
    <hr>
        <?php echo show_source(__FILE__); ?>
    </hr>
</body>
</html>