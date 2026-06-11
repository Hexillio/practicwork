<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Отправка данных на сервер</h1>
	<h2>Безопасность данных, часть 2</h2>

	<?php
// Проверяем, что данные пришли методом POST
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			
			// Получаем значение логина и удаляем пробелы по краям
			$login = isset($_POST['login']) ? trim($_POST['login']) : '';
			
			// Переменная для хранения текста ошибки
			$error = null;

			// 1. Проверка на пустоту
			if ($login === '') {
				$error = "Ошибка: Поле логина не должно быть пустым.";
			} else {
				
				// 2. Санитизация с помощью функции filter_var()
				// Используем FILTER_SANITIZE_SPECIAL_CHARS для удаления/экранирования опасных символов
				$login = filter_var($login, FILTER_SANITIZE_SPECIAL_CHARS);
				
				// 3. Валидация по правилу [a-z0-9]{5,10}
				// ^ и $ гарантируют, что вся строка целиком соответствует правилу
				if (!preg_match('/^[a-z0-9]{5,10}$/', $login)) {
					$error = "Ошибка: Логин должен состоять только из строчных латинских букв и цифр, длиной от 5 до 10 символов.";
				}
			}

			// ВЫВОД РЕЗУЛЬТАТОВ ПРОВЕРКИ
			echo "<!DOCTYPE html>";
			echo "<html lang='ru'>";
			echo "<head><meta charset='UTF-8'><title>Результат проверки логина</title></head>";
			echo "<body>";

			if ($error) {
				// Если зафиксирована ошибка
				echo "<h2 style='color: red;'>Проверка не пройдена</h2>";
				echo "<p>" . htmlspecialchars($error) . "</p>";
				echo "<p>Вы отправили: <code>" . htmlspecialchars($_POST['login']) . "</code></p>";
				echo "<p><a href='javascript:history.back()'>Вернуться назад и исправить</a></p>";
			} else {
				// Если всё успешно
				echo "<h2 style='color: green;'>Успех!</h2>";
				echo "<p>Логин <strong>" . htmlspecialchars($login) . "</strong> успешно прошел все проверки.</p>";
			}

			echo "</body>";
			echo "</html>";

		} else {
			echo "Форма не была отправлена.";
		}
		?>

	

</body>
</html>