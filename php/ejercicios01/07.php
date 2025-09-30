<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="2">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ1-07</title>
</head>
<body>
    <h1>Solo PHP</h1>
    <?php
        $red = random_int(100,500);
        $green = random_int(100,500);
        $blue = random_int(100,500);

        echo '<table style="background-color:red", withd="$red"><tr><td>Rojo</td></tr></table>';
        echo '<table style="background-color:green", wiht="$green"><tr><td>Verde</td></tr></table';
        echo '<table> style="background-color:blue", wiht="$blue"<tr><td>Azul</td></tr></table>';
    ?>
    <hr>
        <?php echo show_source(__FILE__); ?>
    </hr>
</body>
</html>