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

    <?php
    define ('PIEDRA1',  "&#x1F91C;");
    define ('PIEDRA2',  "&#x1F91B;");
    define ('TIJERAS',  "&#x1F596;");
    define ("TIJERA2",  "&#x1F596;");
    define ("PAPEL",    "&#x1F91A;");
    define ('PAPEL2',   "&#x1F91A;" );

    function generarManos() {
        $randomNum = random_int(0,2);

    }

    ?>
    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr>
    
</body>
</html>