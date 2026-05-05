<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        <input type="number" step="any" placeholder = "a" value = "<?= $_GET['a'] ?? ''?>" required>

        <input type="number" step="any" placeholder = "b" value = "<?= $_GET['b'] ?? ''?>" required>

        <input type="number" step="any" placeholder = "c" value = "<?= $_GET['c'] ?? ''?>" required>

        <button type='submit'>решить</button>
    </form>

    <?php

    $a = $_GET["a"];
    $b = $_GET["b"];
    $c = $_GET["c"];

    $d = ($b *  2) - (4 * $a * $c);
    if ($d > 0) {
    $x1 = (-1*$b + sqrt($d)) / 2 * $a;
    $x2 = (-1*$b + sqrt($d)) / 2 * $a;
    echo "х1= ". $x1 .";   x2= ". $x2 ."";
    } elseif ($d < 0) {
    $x = -1*$b / 2 * $a;
    echo "x= ". $x;
    } else { echo "нет корней";}
    ?>
</body>
</html>


