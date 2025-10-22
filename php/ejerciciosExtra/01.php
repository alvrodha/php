<?php
function verificarEdad($edad) {
    $msg='';
    $edad = (int)$edad;
    if ($edad > 18) {
        $msg = 'Eres mayor de edad';
    } else {
        $msg = 'Eres menor de edad';
    }
    return $msg;
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
            <h1>Mayoría de edad</h1>
        </div>
        <div id="content">
            <?= verificarEdad($_POST['edad']) ?>
        </div>
    </div>
</body>
</html>