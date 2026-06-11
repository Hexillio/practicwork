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
	
	<?php


	?><h2>Данные принятые обработчиком формы</h2><?php
	$json = array();
	
		foreach ($_POST['order'] as $key => $value){
			$json[$key] = json_decode($value);
		}

	echo '<pre>';
	print_r($json);
	echo '</pre>';
	?>

omsk
</body>
</html>