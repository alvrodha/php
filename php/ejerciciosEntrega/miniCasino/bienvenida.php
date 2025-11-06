<?php
$nvisitas = 0;
if (isset($_COOKIE["visitas"])){
    $nvisitas++;
    
} else {
    setcookie("visitas", $nvisitas, time() + 30*24*3600);
    $nvisitas = $_COOKIE["visitas"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniCasino</title>
</head>
<body>
    <h1>Bienvenido al Mini Casino</h1>
    <p>Esta es su <?= $nvisitas ?>º visita</p>
    <form method="post">
        <label for="saldo">Introduzca el dinero con el que va a jugar: </label> 
        <input type="number" name="saldoInit" min="0" required><br>
        <input type="submit" value="Comenzar a jugar">
    </form>
</body>
</html>