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

    define('CANTIDAD', 50);
    define('VALORMAX',100);

    $numero=random_int(1,VALORMAX);

    $minimo=$numero;
    $maximo=$numero;
    $suma=$numero;

    for($i=1; $i<CANTIDAD; $i++){
        $numero=random_int(1,VALORMAX);

        if($numero>$maximo){
            $maximo=$numero;
        }
        if($numero<$minimo){
            $minimo=$numero;
        }
        $suma+=$numero;
    }
    $media=$suma/CANTIDAD;
    ?>
    <table>
        <tr><th colspan="2">Generación de 50 numeros aleatorios</th></tr>
        <tr><td>Mínimo</td><td><?= $minimo ?></td></tr>
        <tr><td>Máximo</td><td><?= $maximo ?></td></tr>
        <tr><td>Media</td><td><?= $media ?></td></tr>
    </table>
    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr>
</body>
</html>