<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Основы программирования</h1>
	<h2>Переменные</h2>
	
	<?php
		// определение переменных
		// (952 / 4) * 3 - (476 / 7) + 196
		$varOne = 952;
		$varTwo = 4;
		$varThree = 3;
		$varFour = 476;
		$varFive = 7;
		$varSix = 196;
	
		// расчет выражения
		$final = ($varOne / $varTwo) * $varThree - ($varFour / $varFour) + $varSix;
	
		// вывод расчетного значения в браузер
		echo $final;
	
	?>
	

</body>
</html>