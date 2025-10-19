<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ5-03</title>
</head>
<body>
    <h1>Bienvenido al generador de Calendarios</h1>
    <form>
        Mes: <select id="mes">
            <option>Enero</option>
            <option>Febrero</option>
            <option>Marzo</option>
            <option>Abril</option>
            <option>Mayo</option>
            <option>Junio</option>
            <option>Julio</option>
            <option>Agosto</option>
            <option>Septiembre</option>
            <option>Octubre</option>
            <option>Noviembre</option>
            <option>Diciembre</option>
        </select>
        <select>
            <?php
                for ($i = 1980; $i < 2025; $i++) { echo "<option>".$i."</option>"; }
            ?>
        </select>
    </form>
    
</body>
</html>