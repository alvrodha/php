<?php

$tiempoExpiracin = 60 * 5;
$edad = "";
$genero = "";
$deportes = [];

if (isset($_POST['orden'])) {
    switch ($_POST['orden']) {
        case "Confirmar":
            if (isset($_COOKIE["edad"])) {
                $edad = $_POST['edad'];
                setcookie("edad", $edad, $tiempoExpiracin);
            }

            if (isset($_COOKIE['genero'])) {
                $genero = $_POST['genero'];
                setcookie("genero", $genero, $tiempoExpiracin);
            }

            if (isset($_COOKIE['deportes'])) {
                $deportes = $_POST['deportes'];
                setcookie('deportes', $deportes, $tiempoExpiracin);
            }
        break;
        case "Eliminar":
            setcookie("edad", "", time() -100);
            setcookie("genero", "", time() -100);
            setcookie("deportes", "", time() -100);
        break;
    }
} else {
    if (isset($_COOKIE["edad"])) {
        $edad = $_POST['edad'];
    }

    if (isset($_COOKIE['genero'])) {
        $genero = $_POST['genero'];
    }

    if (!isset($_COOKIE["deportes"])) {
        $deportes[] = explode("," , $_POST["deportes"]);
    }
}
?>


<html>
<head>
<meta charset="UTF-8">
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container" style="width: 380px;">
<div id="header">
     <h1>SUS DATOS ALMACENADOS</h1>
</div>

<div id="content">
<fieldset>
<form method="post">
<label>Edad</label> <input type="number" name="edad" value="<?= $edad ?>" ><br>
Género :<br>
        <label> Mujer </label>
        <input type="radio" name="genero" value="Mujer"<?= ($genero = "Mujer") ? "checked= \"checked\"": ""; ?>>
        <label> Hombre</label>
        <input type="radio" name="genero" value="Hombre"<?= ($genero = "Hombre") ? "checked= \"checked\"": ""; ?>>
        <br>
<label>Deportes</label><br>
        <select name="deportes[]" multiple="multiple" size="3">
     <option value="Futbol"     <?= in_array("Futbol", $deportes) ? "selected=\"selected\"": ""; ?>     >Futbol</option>
     <option value="Tenis"      <?= in_array("Tenis", $deportes) ? "selected=\"selected\"": ""; ?>      >Tenis</option>
     <option value="Ciclismo"   <?= in_array("Ciclismo", $deportes) ? "selected=\"selected\"": ""; ?>   >Ciclismo</option>
     <option value="Otro"       <?= in_array("Otro", $deportes) ? "selected=\"selected\"": ""; ?>       >Otro</option>
    </select>
    <br>
    <button name="orden" value="Confirmar"> Almacenar valores </button>
    <button name="orden" value="Eliminar"> Eliminar valores </button>
</form>
</fieldset>
</div>
</div>
</body>
</html>
