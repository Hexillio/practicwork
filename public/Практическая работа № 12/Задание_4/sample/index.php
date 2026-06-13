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
		// входная строка
		$list = <<< HERE
			<ul>
			<li>PostgreSQL. Мастерство разработки</li> 
			<li>Сборник рецептов MySQL</li>
			<li>Чертоги разума. Убей в себе идиота!</li>			
			<li>Рефакторинг sql-приложений</li>
			<li>Python в веб приложениях</li>
			<li>SQL. Полное руководство</li>
			</ul>
		HERE;
		// 2. Извлекаем текст из всех тегов <li> с помощью регулярного выражения
		preg_match_all('/<li>(.*?)<\/li>/ui', $list, $matches);

		// Все найденные названия книг находятся в массиве $matches[1]
		$books = $matches[1];

		// 3. Фильтруем книги, оставляя только те, которые содержат "sql" (регистронезависимо /i)
		$pattern = '/sql/ui';
		$filtered_books = preg_grep($pattern, $books);

		// 4. Выводим результат в виде нумерованного списка <ol>
		echo "<ol>";
		foreach ($filtered_books as $book) {
			echo "<li>" . trim($book) . "</li>";
		}
		echo "</ol>";
	?>
	

</body>
</html>