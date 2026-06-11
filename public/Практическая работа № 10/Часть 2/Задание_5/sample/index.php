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

		// Преобразуем строки с перечислениями в массивы для удобного поиска
		$user_langs = isset($user['lang']) ? array_map('trim', explode(',', $user['lang'])) : [];
		$user_interes = isset($user['interes']) ? array_map('trim', explode(',', $user['interes'])) : [];
	?>

	<form action="example_8.php" method="post">
		Имя: <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>"><p>
		E-mail: <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"><p>
	
		<h3>Выберите интересующий вас курс:</h3>
		<input type="checkbox" name="lang[]" value="java_games" <?php if(in_array('java', $user_langs)) echo 'checked'; ?> /> Разработчик игр на Java <br />
		<input type="checkbox" name="lang[]" value="php" <?php if(in_array('php', $user_langs)) echo 'checked'; ?> /> Программирование на PHP <br />
		<input type="checkbox" name="lang[]" value="python" <?php if(in_array('python', $user_langs)) echo 'checked'; ?> /> Занимательный Python <br />
		<input type="checkbox" name="lang[]" value="perl" <?php if(in_array('perl', $user_langs)) echo 'checked'; ?> /> Язык программирования Perl за 24 часа <br />
		<!-- Внимание: в исходном form.html у JavaScript стоял value="java", исправлено для логики или оставлено как в оригинале -->
		<input type="checkbox" name="lang[]" value="javascript" <?php if(in_array('java', $user_langs)) echo 'checked'; ?> /> Javascript в примерах<p>
		
		<h3>Выберите форму обучения:</h3>
		<input type="radio" name="form" value="очное" <?php if($user['form'] == 'очное') echo 'checked'; ?> /> очное <br />
		<input type="radio" name="form" value="очно-заочное" <?php if($user['form'] == 'очно-заочное') echo 'checked'; ?> /> очно-заочное <br />
		<input type="radio" name="form" value="заочное" <?php if($user['form'] == 'заочное') echo 'checked'; ?> /> заочное <br />	
		<input type="radio" name="form" value="дистанционное" <?php if($user['form'] == 'дистанционное') echo 'checked'; ?> /> дистанционное <p>		

		<h3>Какие направления ИТ вас могли бы заинтересовать:</h3>
		<!-- Добавлены квадратные скобки [] в name, так как select множественный -->
		<select name="interes[]" size="5" multiple>
			<option value="Веб и интернет-технологии" <?php if(in_array('Веб и интернет-технологии', $user_interes)) echo 'selected'; ?>>Веб и интернет-технологии</option>
			<option value="Разработка программ для компьютеров и смартфонов" <?php if(in_array('Разработка программ для компьютеров и смартфонов', $user_interes)) echo 'selected'; ?>>Разработка программ для компьютеров и смартфонов</option>
			<option value="Программирование роботов и умных устройств" <?php if(in_array('Программирование роботов и умных устройств', $user_interes)) echo 'selected'; ?>>Программирование роботов и умных устройств</option>
			<option value="Искусственный интеллект и машинное обучение" <?php if(in_array('Искусственный интеллект и машинное обучение', $user_interes)) echo 'selected'; ?>>Искусственный интеллект и машинное обучение</option>
			<option value="Инфраструктура — сети, серверы, администрирование" <?php if(in_array('Инфраструктура — сети, серверы, администрирование', $user_interes)) echo 'selected'; ?>>Инфраструктура — сети, серверы, администрирование</option>
		</select><p>

		<input type="submit" value="Сохранить изменения">
	</form>

omsk
</body>
</html>