<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ2-01</title>
</head>
<body>
    <?php
    function elMayor($A, $B, &$C) {
        if ($A == $B) {
            $C = 0;
        } else if ($A > $B) {
            $C = $A;
        } else {
            $C = $B;
        } 
    }

    $num1 = random_int(1, 10);
    $num2 = random_int(1, 10);
    $resu = 1111;
    elMayor($num1, $num2, $resu);
    ?>

    <hr>
    1ºNúmero es <?= $num1 ?><br/>
    2ºNúmero es <?= $num2 ?><br/>
    El mayor es <?= $resu ?><br/>
    <hr>
    <?php echo show_source(__FILE__); ?>
</body>
</html>