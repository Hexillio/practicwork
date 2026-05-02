<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Управляющие конструкции</h1>
	<h2>Конструкции</h2>
	<hr>
	<h2>Включения файлов</h2>
	
	<?php
	for ($i=0; $i <= 5 ; $i++) { 
		
		include("$i.txt");//вывод 1245
		
		require("$i.txt");//вывод пуст
	}
		
	?>
	

</body>
</html>