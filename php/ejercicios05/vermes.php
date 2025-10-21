<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ5-03</title>
    <style>
        * {	
            box-sizing: border-box;
		}

		/* Create two equal columns that floats next to each other */
		.column {
			float: left;
			padding: 10px;
			height: 200px;
		}

		/* Clear floats after the columns */
		.fila:after {
			content: "";
			display: table;
			clear: both;
		}
    </style>
</head>
<body>
    <div class="fila">
        <div class="column">
            <form name="formu" method="post">
                <select name="mes">
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
                <label for="año">Año: </label><select name="año">
                    <?php
                        for ($i = 1980; $i < 2025; $i++) { echo "<option>".$i."</option>"; }
                    ?>
                </select>
                <input type="submit" value="ENVIAR"> 
            </form>
        </div>
        <div class="column">
            <?php 

            if ($_SERVER['$_REQUEST_METHOD'] != $_POST) {
                exit();
            }

            $mes = (int)$_POST['mes'];
            $año = (int)$_POST['año'];
			$primerdia = date("w", mktime(0, 0, 0, $mes, 1, $año));

			if ($primerdia == 0) {
				$primerdia = 7;
			}
			$numerodias = date("t", mktime(0, 0, 0, $mes, 1, $año));
            
            $meses = array(
				1 => "Enero",
				"Febrero",
				"Marzo",
				"Abril",
				"Mayo",
				"Junio",
				"Julio",
				"Agosto",
				"Septiembre",
				"Octubre",
				"Noviembre",
				"Diciembre"
			);
            ?>
            <table>
                <tr>
                    <td>Mes <?php echo $meses[$mes] ?> del <?php echo $año ?></td>
                </tr>
                <tr>
                    <td>L</td>
                    <td>M</td>
                    <td>X</td>
                    <td>J</td>
                    <td>V</td>
                    <td>S</td>
                    <td>D</td>
                </tr>
                <tr>
                    <?php
                    $numDias = 0;
                    

                    ?>

                </tr>
            </table>
        </div>
    </div>
    
    
</body>
</html>