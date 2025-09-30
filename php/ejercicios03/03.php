<?php
    $periodicos = ["El pais" => "https://elpais.com", "El mundo" => "https://www.elmundo.es", "Marca" => "https://www.marca.com", "20Minutos" => "https://www.20minutos.eshttps://www.20minutos.es", "El Confidecial" => "https://www.elconfidencial.com"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3-03</title>
</head>
<body>
    <ul>
        <?php
        $keys = array_keys($periodicos);
        $randomKey = $keys[random_int(0, count($keys) - 1)];
        $randomUrl = $periodicos[$randomKey];
        echo '<li><a href="'.$randomUrl.'" target="_blank" rel="noopener noreferrer">'.$randomKey.'</li>';
        ?>
    </ul> 
    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr>
</body>
</html>