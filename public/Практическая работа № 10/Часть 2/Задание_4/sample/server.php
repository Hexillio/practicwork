<?php 
session_start(); // Перенесено в самый верх

// Достаем данные ФИО из сохраненной сессии первого шага
$surname = isset($_SESSION['step_1']['surname']) ? $_SESSION['step_1']['surname'] : '';
$name = isset($_SESSION['step_1']['name']) ? $_SESSION['step_1']['name'] : '';
$patronymic = isset($_SESSION['step_1']['patronymic']) ? $_SESSION['step_1']['patronymic'] : '';
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
	<h2>Поздравляем с успешной регистрацией в школе разведчиков</h2>
	<h3>В ближайшее время с вами свяжется наш человек (в черном). Передаст вам оружие, акваланг, ксиву и инструкцию по дальнейшим действиям.</h3>

	<main>
		<!-- Выводим переменные, которые мы безопасно получили из сессии -->
		<h2><?php echo 'Здравствуйте, ' . htmlspecialchars($surname) . ' ' . htmlspecialchars($name) . ' ' . htmlspecialchars($patronymic); ?> </h2>
	</main>

	<footer align="center">
		<h3>Веб-разработка | Профессионалы | Демоэкзамен</h3>
		<a href="https://vk.com" target="_blank">omsk_PRO</a>
	</footer>
</body>
</html>
<?php 
// Очищаем сессию в самом конце, чтобы при новой регистрации данные не накладывались
session_destroy(); 
?>
