<?php
$msg = "";

if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
    if (isset($_POST["ape1"])) {
        $ape1 = $_POST["ape1"];
        $msg = "";
    } else {
        $msg = "Por favor vuelva a introducir los datos";
    }
} else {
    $msg = "Por favor vuelva a introducir los datos";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="default.css" rel="stylesheet" type="text/css">
    <title>EJex-01</title>
</head>
<body>
    <div id="container">
        <div id="header">
            <h1>Control de Radio</h1>
        </div>
        <div id="content">
            <p> <?= $msg  ?></p>
            
        </div>
    </div>
</body>
</html>