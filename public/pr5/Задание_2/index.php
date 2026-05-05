<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Функции</h1>
	<h2>Встроенные функции, часть 1</h2>
	
    
    <?php 
    $summ = 0;
    for ($i = 0; $i < 3; $i++) {
    $randomOne = rand(1, 6);
    $randomTwo = rand(1, 6);
    $randomThree = rand(1, 6);
    $summ = $randomOne + $randomTwo + $randomThree;
    }
    echo $summ
    ?>
	<div><img src="<?= $randomOne ?>.jpg" alt = "кубик"></div>
	<div><img src="<?= $randomTwo ?>.jpg" alt = "кубик"></div>
	<div><img src="<?= $randomThree ?>.jpg" alt = "кубик"></div>
    

</body>
</html>