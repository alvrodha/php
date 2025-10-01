<?php
function generarTabla() {
    $num = 0;
    $contenido = "";
    $numFilas = 3;
    $numColumnas = 9;

    echo "<table>";
    for ($numFilasAct = 0; $numFilasAct < $numFilas; $numFilasAct++) {
        echo "<tr>";
        for ($numColumnasAct = 0; $numColumnasAct < $numColumnas; $numColumnasAct++) {
            $contenido = obtenerContenido();
            echo '<td id="'.$contenido.'">';
            if ($contenido == "rellena") {
                $num = obtenerNum();
                echo '<div id="numerito">'.$num.'</div>'.$num.'</td>';
            }   else {
                echo "</td>";
            }
            
        }
        echo "</tr>";
    }
    echo "</table>";
}

function obtenerNum(){
    $numObtenido = 10;

    return $numObtenido;
} 

function obtenerContenido() {
    $contRellena = 0;
    $contVacia = 0;
    $mensage = "";
    $numAleatorio = random_int(1,2);
    if ($numAleatorio == 2 && $contRellena < 5) {
        $mensage = "rellena";
        $contRellena++;
    }   else {
        $mensage = "vacia";
        $contVacia++;
    }
    return $mensage;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bingo Generator</title>
    <style>
        table {
            font-family: arial;
            font-size: 35px;
            font-weight: bold;
            color: rgb(0, 0, 120);
            border: 5px double rgb(0, 0, 120);
            border-collapse: collapse
        }

        #rellena {
            text-align: center;
            width: 50px;
            height: 80px;
            border: 2px solid rgb(120, 120, 180);
            background-color: rgb(230, 230, 255);
        }

        #numerito {
            font-size: 10px;
            text-align: left;
            margin-top: -14px;
            margin-bottom: 14px;
        }

        #vacia {
            text-align: center;
            width: 50px;
            height: 80px;
            border: 2px solid rgb(120, 120, 180);
            background-color: rgb(170, 170, 205);
        }
    </style>
</head>
<body>
    <?php generarTabla(); ?>
    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr>
</body>
</html>