<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ1-01</title>
</head>
<body>
    <?php
        $n1 = random_int(1,10);
        $n2 = random_int(1,10);
        echo " 1º numero : <b>$n1</b> </br> ";
        echo " 2º numero : <b>$n2</b> </br><hr> ";
        echo " $n1 + $n2 =  ".($n1 + $n2)."/<br> ";
        echo " $n1 - $n2 =  ".($n1 - $n2)."</br> ";
        echo " $n1 * $n2 =  ".($n1 * $n2)."</br> ";
        echo " $n1 / $n2 =  ".($n1 / $n2)."</br> ";
        echo " $n1 % $n2 =  ".($n1 % $n2)."</br> ";
        $resu = 1;
        for ($i=0; $i <=$n2; $i++) {
            $resu = $resu * $n1;
        }
        echo '$resu' ;
    ?>
    <hr>
    <?php echo show_source(__FILE__); ?>
    </hr>
</body>
</html>

