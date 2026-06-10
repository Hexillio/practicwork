<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Отправка данных на сервер</h1>
	<h2>Еще о формах</h2>
	
	<?php
		// подключаем файл с массивом заказа
		include "orders.php";
	?>
	
	<form action="server.php" method="post">
		Фамилия: <input type="text" name=""><p>
		Имя: <input type="text" name=""><p>
		E-mail: <input type="email" name=""><p>
		
		<!-- блок вывода скрытых полей заказа -->

		<input type="submit">
	</form>

omsk
</body>
</html>