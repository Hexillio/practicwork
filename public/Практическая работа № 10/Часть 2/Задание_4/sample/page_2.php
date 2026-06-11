<?php 
session_start(); // Перенесено в самый верх 

// Сохраняем данные первого шага в сессию
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['step_1'] = $_POST;
}
?>
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
	<h2>Регистрация. Страница 2</h2>

	<form action="page_3.php" method="post">
	 	Должность: <input type="text" name="post"><p>
		Категория: <input type="text" name="category"><p>
		Стаж: <input type="text" name="experience"><p>	
		<input type="submit" value="Далее">
	</form>
</body>
</html>
