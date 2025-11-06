
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Dispone de <? $saldo ?> para jugar</h3>
    <form>
        Cantidad a apostar <input type="number" min="0" max="<?=$saldoDisponible?>" required>
        <fieldset>
            Tipo de apuesta : 
            <input name="apuesta" type="radio" value="PAR">Par
            <input name="apuesta" type="radio" value="IMPAR">Impar
        </fieldset>
        
    </form>

    
</body>
</html>