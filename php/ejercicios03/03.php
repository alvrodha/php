<?php
    $periodicos = [
        "El pais" => "https://elpais.com",
    "El mundo" => "https://www.elmundo.es",
    "Marca" => "https://www.marca.com",
    "20Minutos" => "https://www.20minutos.eshttps://www.20minutos.es",
    "El Confidecial" => "https://www.elconfidencial.com"
    ];
    $clavePeriodico = array_rand($periodicos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3-03</title>
</head>
<body>
    <p>
        El medio recomendado es: <a href=" <?php $medio[$clavePeriodico] ?> "> <?= $clavePeriodico ?></a>
    </p> 
    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr>
</body>
</html>