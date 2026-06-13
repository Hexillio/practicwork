<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Отправка данных на сервер</h1>
	<h2>Регулярные выражения, часть 1</h2>
	
	<?php
		// 1. Исходный массив книг
		$array = array( 
			"PostgreSQL. Мастерство разработки", 
			"Сборник рецептов MySQL", 
			"Чертоги разума. Убей в себе идиота!", 
			"Рефакторинг sql-приложений", 
			"Python в веб приложениях", 
			"SQL. Полное руководство" 
		); 

		// 2. Поиск элементов, содержащих "SQL" (регистронезависимый поиск /i)
		// Модификатор /u нужен для корректной работы с кодировкой UTF-8
		$pattern = "/sql/ui";
		$filtered_array = preg_grep($pattern, $array);

		// 3. Вывод нового массива в виде HTML-списка
		echo "<ul>";
		foreach ($filtered_array as $book) {
			echo "<li>" . htmlspecialchars($book) . "</li>";
		}
		echo "</ul>";
	?>

	

</body>
</html>