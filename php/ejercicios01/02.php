<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ1-02</title>
</head>
<body>
    <?php
        $n1 = random_int(0,10);
        echo " Numero generado: <b>$n1</b> </br>";

        for ($i=0; $i <=$n1; $i++) {
            for ($j= 0; $j < $i; $j++) {
                if ($i %2== 0) {
                    //echo "$i";
                    echo '<span style="color: red;">'.$i.'</span>';
                }   else {
                    //echo "$i";
                    echo '<span style="color: blue">'.$i.'</span>';
                }
            }
            echo'</br>';
        }
    ?>
    <hr>
        <?php echo show_source(__FILE__); ?>
    </hr>
</body>
</html>