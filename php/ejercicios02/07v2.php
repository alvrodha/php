<?php
    define ('SIZE',10);
    function dameColor(){
        $rcolor = "rgb(" . random_int(0, 255) . "," . random_int(0, 255) . "," . random_int(0, 255) . ")";
	return $rcolor;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EJ2-07v1</title>
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
                                $color = dameColor();
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