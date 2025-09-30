<html>
    <head>
    <meta charset="UTF-8">
    <title>EJ2-06v2</title>
    </head>
<body>
    <hr>
    <code>
    <?php
        $numAlmenas = random_int(1,10);
        echo "$numAlmenas <br/>";
        for ($i = 0; $i < 3; $i ++) {
            if ($i == 2) {
                for ($m = 0; $m < (($numAlmenas) + ($numAlmenas - 1)); $m ++) {
                    echo "<img src=\"ladrillo.jpg\" alt=\"ladrillo \"/>";
                }
            } else {
                for ($h = 0; $h < $numAlmenas; $h ++) {
                    echo "<img src=\"ladrillo.jpg\" alt=\"ladrillo \"/>" . "<img src=\"espacio.png\" alt=\"espacio \"/>";
                }
            }
            echo "<br/>";
        } 
    ?>
    </code>
    <hr>
    <?php echo show_source(__FILE__); ?>
    <hr>
</body>
</html>