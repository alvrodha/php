<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ1-03</title>
</head>
<body> 
    <code>
        <?php
            $n1 = random_int(0,10);
            echo " Numero generado: <b>$n1</b> </br>";

            for ($i = 0; $i < $n1; $i++) {
                for ($j = 0; $j < $n1 / 2 - $i; $j++) {
                    echo " ";
                }
                for ($l = 0; $l = $n1 / 2 + 2*$i; $l++) {
                    echo "*";
                }
                
                for ($k = 0; $k > $n1 / 2 - $i; $k--) {
                    echo " ";
                }
                echo "</br>";
        }
        ?>
    </code>
    <hr>
        <?php echo show_source(__FILE__); ?>
    </hr> 
</body>
</html>