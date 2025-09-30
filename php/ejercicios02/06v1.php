<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ2-06v1</title>
</head>
<body>
    <?php
        $numAlmenas = random_int(1, 10);
        echo"$numAlmenas</br>";

        for ($i = 0; $i < 2; $i++) {
            for ($y = 0; $y < $numAlmenas; $y++) {
                for ($x = 0; $x < 3; $x++) {
                    echo"*";
                }
                echo" ";
            }
            echo "</br>";
        }
        for ($i = 0; $i < $numAlmenas * 4 - $numAlmenas/2 - 1; $i++) {
            echo"*";
        }
/*
        $numAlmenas = random_int(1, 10);
        echo "$numAlmenas <br/>";
        for ($i = 0; $i < 3; $i ++) {
            if ($i == 2) {
                for ($m = 0; $m < $numAlmenas - 1; $m ++) {
                    echo "*****";
                }
                echo "****";
            } else {
                for ($h = 0; $h < $numAlmenas; $h ++) {
                    echo "****&nbsp";
                }
            }
            echo "<br/>";
        }
*/
    ?>
    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr>
</body>
</html>