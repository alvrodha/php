<?php

$cambioTarjeta = false;

if (isset($_GET['nuevaTarjeta'])) {
    $tarjetaactual = $_GET['nuevatarjeta'];
    $_SESSION['tipotarjeta'] = $tarjetaactual;
    header("Refresh:3; url=\"".$_SERVER['PHP_SELF']."\"");
    $cambioTarjeta = true;
} else {
    if (isset($_COOKIE['tipotarjeta'])) {
        $tarjetaactual = $_COOKIE['tipotarjeta'];
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej6-01a</title>
</head>
<body>
    <div style="text-align:center"> 
    
    <?php if ($cambiotarjeta ) :?>
        <br><h1> Cambiando su tipo de tarjeta...</h1> 
        <img src='IMG/waiting.gif' />
    <?php endif; ?>

    <?php if (isset($tarjetaactual) ): ?>
        <H2> SU FORMA DE PAGO ACTUAL ES</H2> </br>
        <img src='IMG/<?=$tarjetaactual.".gif" ?>' /></a>
    <?php else: ?>
        <H2> NO TIENE FORMA  DE PAGO ASIGNADA ES</H2> </br> 
        <br><br>
    <?php endif; ?>

    <h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br> 
    <a href="?nuevatarjeta=cashu"><img  src='IMG/cashu.gif' /></a>&ensp; 
    <a href="?nuevatarjeta=cirrus1"><img  src='IMG/cirrus1.gif' /></a>&ensp; 
    <a href="?nuevatarjeta=dinersclub"><img  src='IMG/dinersclub.gif' /></a>&ensp; 
    <a href="?nuevatarjeta=mastercard1"><img  src='IMG/mastercard1.gif'/></a>&ensp; 
    <a href="?nuevatarjeta=paypal"><img  src='IMG/paypal.gif' /></a>&ensp; 
    <a href="?nuevatarjeta=visa1"><img  src='IMG/visa1.gif' /></a>&ensp; 
    <a href="?nuevatarjeta=visa_electron"><img  src='IMG/visa_electron.gif'/></a> 		
    </div>
</body>
</html>