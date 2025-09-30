<?php
    define('INCREMENTOCOLOR', 3);
    define ('SIZE',10);
    $rojo  = random_int(0, 255);
    $verde = random_int(0, 255);
    $azul  = random_int(0, 255);

    function dameColorIncrementado1(&$rojo, &$verde, &$azul): string
    {
        $rojo  += INCREMENTOCOLOR;
        $azul  += INCREMENTOCOLOR;
        $verde += INCREMENTOCOLOR;

        $rcolor = "rgb($rojo,$verde,$azul)";

        return $rcolor;
    }

    function dameColorIncrementado2(): string
    {
        global $rojo;
        global $verde;
        global $azul;

        $rojo  += INCREMENTOCOLOR;
        $azul  += INCREMENTOCOLOR;
        $verde += INCREMENTOCOLOR;

        $rcolor = "rgb($rojo,$verde,$azul)";

        return $rcolor;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background: silver;
            text-align: justify;
            font-family: Tahoma, Geneva, sans-serif;
            font-size: 14px;
            color: #757E82;
        }

        #container {
            margin: 0 auto;
            width: 500px;
            background: #fff;
            border: solid 1px;
        }

        #header {
            background: blue;
            text-align: center;
            padding: 20px;
            color: white;
            text-shadow: black 0.1em 0.1em 0.2em;
            }

        #content {
            background: white;
            clear: left;
            padding: 20px;
            align-content: center;        
        }

        table, th, td {
        border: 1px solid black;
        } 
    </style>
</head>
<body>
    <hr>
    <div id="container">
        <div id="header">
            Tablero de colores
        </div>
        <div id="content">
            <table>
                <?php
                    for ($i = 0; $i <=SIZE; $i++) {
                        echo "<tr>";
                        for ($j = 0; $j <=SIZE; $j++) {
                            $color = dameColorIncrementado1($rojo, $verde, $azul);
                            $color = dameColorIncrementado2();
                            echo "<td style=\"background-color:$color; height:40px; width:40px\"></td>";
                        }

                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </div>


    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr>
    
</body>
</html>