<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Отправка данных на сервер</h1>
	<h2>Еще о формах</h2>
	<hr>
	<h2>Редактируем данные пользователя</h2>

	<?php
		require "user.php";
	?>

	<form action="example_8.php" method="post">
		Имя: <input type="text" name="name"><p>
		E-mail: <input type="email" name="email"><p>
	
		<h3>Выберите интересующий вас курс:</h3>
		<h3>Выберите форму обучения:</h3>
		<h3>Какие направления ИТ вас могли бы заинтересовать:</h3>

		<input type="submit">
	</form>

omsk
</body>
</html>