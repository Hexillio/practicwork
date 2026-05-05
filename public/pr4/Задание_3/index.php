<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
   
        <input type="number" name="a"><h3>a</h3><br>
        <input type="number" name="b"><h3>b</h3><br>
        <input type="number" name="c"><h3>c</h3><br>

        <input type="submit" value="sumbit"><br>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];

        if ($a != 0) {
            $d = $b**2 - 4 * $a * $c;

            if ($d > 0 ){
                $x1 = ( -1 * $b + $d ** (1/2) ) / 2 * $a;
                $x2 = ( -1 * $b - $d ** (1/2) ) / 2 * $a;
                echo 'первый корень - '. $x1 .'<br>второй корень - '. $x2; 
            }
            elseif ($d < 0){
                echo 'нет корней';
            } 
            else {
                $x1 = ( -1* $b ) / 2 * $a;
                echo $x1;
            }
        }
        else{
            echo 'корень один - ' . (-1 * $c) / $b;
        }
    }

    ?>


</body>
</html>