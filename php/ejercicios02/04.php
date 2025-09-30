<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ2-04</title>
    <style>
    table,th,td{
       border:1px solid black;
       border-collapse:collapse;
    }
    th{
        color:white;
        background-color:black;
        text-align: center;
        padding-left:30px;
        padding-right:30px;
        
    }
    .izq{
        text-align:left;
    }
    .der{
        text-align:right;
    }
</style>
</head>
<body>
    <?php
    $max = 0;
    $min = 100;
    $media = 0;

    for ($i = 0; $i < 50; $i++) {
        $num_generado = random_int(0, 100);
        if ($num_generado < $min) {
            $min = $num_generado;
        } else if ($num_generado > $max) {
            $max = $num_generado;
        }
        $media += $num_generado;
    }
    $media = $media / 50;
    ?>
    <table>
        <tr><th colspan="2">Generación de 50 numeros aleatorios</th></tr>
        <tr><td>Mínimo</td><td><?= $min ?></td></tr>
        <tr><td>Máximo</td><td><?= $max ?></td></tr>
        <tr><td>Media</td><td><?= $media ?></td></tr>
    </table>
    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr>
</body>
</html>