<?php
require_once("funcionesref.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ2-03</title>
</head>
<body>
    <hr>
    <?php
        $num1 = random_int(1,10);
        $num2 = random_int(1,10);
        $resu = 666;

        echo "1º Número : $num1 <br/>";
        echo "2º Número : $num2 <br/>";
        calSuma($num1, $num2, $resu);
        echo "$num1 + $num2 = $resu <br/>";
        calResta($num1, $num2, $resu);
        echo "$num1 - $num2 = $resu <br/>";
        calMultiplicacion($num1, $num2, $resu);
        echo "$num1 * $num2 = $resu <br/>";
        calDivision($num1, $num2, $resu);
        echo "$num1 / $num2 = $resu <br/>";
        calElevar($num1, $num2, $resu);
        echo "$num1 ^ $num2 = $resu <br/>";
        calModulo($num1, $num2, $resu);
        echo "$num1 % $num2 = $resu <br/>";
    ?>
    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr>
</body>
</html>