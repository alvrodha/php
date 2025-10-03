<?php
    define ('PIEDRA',  "&#x1F91C;");
    define ('PIEDRA2',  "&#x1F91B;");
    define ('TIJERAS',  "&#x1F596;");
    define ("PAPEL",    "&#x1F91A;");

    $resultados = [
        "Gana el jugador nº1",
        "Gana el jugador nº2",
        "Empate"
    ];
    function obtenerMano() {
        $valor = rand(0,2);
        switch ($valor) {
            case 0: return PIEDRA;
            case 1: return TIJERAS;
            case 2: return PAPEL;
        }
    }

    function calcularGanador(String $valor1, String $valor2) {
        $ganador = 0;

        if ($valor1 == $valor2) return $ganador;

        switch ($valor1){
        case PIEDRA:  $ganador = ( $valor2 == TIJERAS)?1:2; break;
        case TIJERAS: $ganador = ( $valor2 == PAPEL  )?1:2; break;
        case PAPEL:   $ganador = ( $valor2 == PIEDRA )?1:2; break;
    }
    return $ganador;
    }

    $jugador1 = obtenerMano();
    $jugador2 = obtenerMano();
    $pos = calcularGanador($jugador1,$jugador2);
    $mensaje =  $tmsg[$pos]; 
    $jugador2 = ($jugador2 == PIEDRA)?PIEDRA2:$jugador2;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Piedra, Papel, Tijera</h1>
    <h3>Actualice la página para mostrar otra partida</h3>

    <table>
        <tr>
            <th>
                jugador1
            </th>
            <th>
                jugador2
            </th>
        </tr>
        <tr>
            <td>
                <td><span style="font-size: 7rem"><?= $jugador1; ?></span></td>
                <td><span style="font-size: 7rem"><?= $jugador2; ?></span></td>
            </td>
        </tr>
        <tr>
            <th colspan="2"><?= $mensaje ?></th>
        </tr>
    </table>

    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr>
    
</body>
</html>