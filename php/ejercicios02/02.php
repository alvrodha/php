<?php
require_once("funcionesvar.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ2-02</title>
</head>
<body>
    <hr>
    <?php
        $num1 = random_int(1,10);
        $num2 = random_int(1,10);

        echo "1º Número : $num1 <br/>";
        echo "2º Número : $num2 <br/>";
        echo "$num1 + $num2 = " . calSuma($num1, $num2) . "<br/>";
        echo "$num1 - $num2 = " . calResta($num1, $num2) . "<br/>";
        echo "$num1 * $num2 = " . calMultiplicacion($num1, $num2) . "<br/>";
        echo "$num1 / $num2 = " . calDivision($num1, $num2) . "<br/>";
        echo "$num1 ^ $num2 = " . calElevar($num1, $num2) . "<br/>";
        echo "$num1 % $num2 = " . calModulo($num1, $num2) . "<br/>";
    ?>
    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr>
    
</body>
</html>