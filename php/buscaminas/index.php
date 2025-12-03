<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Buscaminas</title>
</head>
<body>
    <h1>Bienvenido al Buscaminas</h1>
    <form method="GET">
        <label for="filas">Número de filas:</label>
        <input type="number" id="filas" name="filas" min="1" max="30" value="10">
        <label for="columnas">Número de columnas:</label>
        <input type="number" id="columnas" name="columnas" min="1" max="30" value="10">
        <label for="dificultad">Selecciona la dificultad:</label>
        <select id="dificultad" name="dificultad">
            <option value="facil">Fácil</option>
            <option value="medio">Medio</option>
            <option value="dificil">Difícil</option>
        </select>
        <input type="submit" value="INICIAR JUEGO" onclick="empezarJuego($columnas, $filas, $dificultad);">
    </form>
    <div id="gameBoard">
        <?php
            include 'funiones.php';

            $filas = $_GET['filas'] ?? 10;
            $columnas = $_GET['columnas'] ?? 10;
            $dificultad = $_GET['dificultad'] ?? 'facil';

            function empezarJuego($columnas, $filas, $dificultad) {
                $tablero = generarTablero($columnas, $filas);
                $tableroConBombas = introducirBombas($tablero, $dificultad);
                $tableroFinal = generarNumero($tableroConBombas);
                echo mostrarTablero($tableroFinal);
            }
            
        ?>
    </div>
</body>
</html>