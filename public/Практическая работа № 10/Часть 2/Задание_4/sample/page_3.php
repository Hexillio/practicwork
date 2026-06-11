<?php 
session_start(); // Перенесено в самый верх

// Сохраняем данные второго шага в сессию
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['step_2'] = $_POST;
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
	<h2>Регистрация. Страница 3</h2>

	<img src="images/img.jpg" alt="реклама"><p>
	
	<!-- Обязательно указываем метод POST -->
	<form action="server.php" method="post">
		<input type="submit" value="Завершить регистрацию">
	</form>
</body>
</html>
