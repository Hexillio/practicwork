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
	<h2>Оформление заказа</h2>
	<?php include("order.php") ?>
	<form action="server.php" method="post">
		Фамилия: <input type="text" name="surename"><p>
		Имя: <input type="text" name="name"><p>
		E-mail: <input type="email" name="email"><p>

		<?php
		foreach ($order as $key => $value) {
			echo "<input type='hidden' name='$key' value='$value'>";
		}
		?>
		<input type="submit">
	</form>

omsk
</body>
</html>