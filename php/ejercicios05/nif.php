<?php
    function obtenerLetra ($numeros) {
        $letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        $valorLetra = $numeros % 23;
        return $letras[$valorLetra];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="default.css" rel="stylesheet" type="text/css" />
    <title>EJ5-01</title>
</head>
<body>
    <?php
	

	if ($_SERVER['REQUEST_METHOD'] == "GET") {
	?>
		<form method='POST'>
			<p>DNI: <input type='text' name='dni'></p>
			<input type='submit' value='Enviar' />
		</form>
	<?php
	} else {
		if (!empty($_POST["dni"]) && ctype_digit($_POST["dni"]) ) {
			$numdni   = $_POST["dni"];
			$letradni = obtenerLetra($numdni);
			echo "La letra del DNI es: $letradni <br>";
			echo "Su NIF completo sería: $numdni-$letradni";	
		} else {
			echo "El valor del DNI:".htmlspecialchars($_POST["dni"])."</b> no es valor numérico";
		}
	}
	?>
</body>
</html>