<?php
$numColumnas = 9;
$numFilas = 3;

function generarTabla($numFilas, $numColumnas) {
    
    echo "<table>";
    for ($filaActual = 0; $filaActual < $numFilas; $filaActual++) {
        $numCeldasVacias = 0;
        $numCeldasRellenas = 0;

        echo "<tr>";
        for ($columnaActual = 0; $columnaActual < $numColumnas; $columnaActual++) {
            echo "<td id = ".obtenerCelda($columnaActual, $numCeldasVacias, $numCeldasRellenas).">".$numeroAGenerar = obtenerNum($filaActual, $columnaActual)."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function obtenerCelda($columnaActual, $numVacias, $numRellenas) {
    $celda = "";
    $numAleatorio = random_int(0,2);

    if ($numVacias = 4) {
        $celda = "rellena";
        $numRellenas ++;
    }   else if ($numRellenas = 5) {
        $celda = "vacia";
        $numVacias ++;
    }   else {
        switch ($numAleatorio) {
            case 1: $numAleatorio = 1; 
            $celda = "rellena";
            $numRellenas ++;
            break;

            case 2: $numAleatorio = 0;
            $celda = "vacia";
            $numVacias ++;
            break;
        }
    }
    return $celda;
}

function obtenerNum($columnaActual, $filaActual){
    $numero = 0;
    $unidades = 0;
    if ($columnaActual = 1) {
        $unidades = random_int(0, 4);
        $numero = 10* $filaActual + $unidades;
    } else if ($columnaActual = 2) {
        $unidades = random_int(4, 7);
        $numero = 10* $filaActual + $unidades;
    }   else {
        $unidades = random_int(7, 10);
        $numero = 10* $filaActual + $unidades;
    }
    return $numero;
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
    <?php generarTabla($numFilas, $numColumnas); ?>
    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr> 
</body>
</html>