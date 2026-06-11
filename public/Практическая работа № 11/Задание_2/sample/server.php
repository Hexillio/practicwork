<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Отправка данных на сервер</h1>
	<h2>Безопасность данных, часть 1</h2>
	
	<?php
// Массивы для раздельного учета ошибок
		$empty_errors = [];
		$validation_errors = [];

// Проверяем, что данные пришли методом POST
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			
			// Получаем данные, очищая от концевых пробелов
			$login = isset($_POST['login']) ? trim($_POST['login']) : '';
			$email = isset($_POST['email']) ? trim($_POST['email']) : '';
			$pwd   = isset($_POST['pwd'])   ? trim($_POST['pwd']) : '';

			// 1. УЧЕТ ОШИБОК ПРОВЕРКИ НА ПУСТОТУ
			if ($login === '') {
				$empty_errors['login'] = "Поле 'Логин' не заполнено.";
			}
			if ($email === '') {
				$empty_errors['email'] = "Поле 'E-mail' не заполнено.";
			}
			if ($pwd === '') {
				$empty_errors['pwd'] = "Поле 'Пароль' не заполнено.";
			}

			// 2. САНИТИЗАЦИЯ И УЧЕТ ОШИБОК ВАЛИДАЦИИ
			// Переходим к этому этапу только для тех полей, которые прошли проверку на пустоту
			
			// Проверка Логина
			if (!isset($empty_errors['login'])) {
				// Санитизация
				$login = filter_var($login, FILTER_SANITIZE_SPECIAL_CHARS);
				// Валидация: разрешаем буквы, цифры и подчёркивание (от 3 до 20 символов)
				if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $login)) {
					$validation_errors['login'] = "Логин должен содержать от 3 до 20 символов латиницы или цифр.";
				}
			}

			// Проверка E-mail
			if (!isset($empty_errors['email'])) {
				// Санитизация
				$email = filter_var($email, FILTER_SANITIZE_EMAIL);
				// Валидация
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$validation_errors['email'] = "Некорректный формат адреса E-mail.";
				}
			}

			// Проверка Пароля
			if (!isset($empty_errors['pwd'])) {
				// Для паролей санитизация строк не применяется, чтобы не искажать спецсимволы,
				// но перед выводом на экран мы его экранируем.
				// Валидация: проверяем длину (например, минимум 6 символов)
				if (mb_strlen($pwd) < 6) {
					$validation_errors['pwd'] = "Пароль слишком короткий (минимум 6 символов).";
				}
			}

			// ИТОГОВЫЙ ВЫВОД РЕЗУЛЬТАТОВ
			echo "<!DOCTYPE html>";
			echo "<html lang='ru'>";
			echo "<head><meta charset='UTF-8'><title>Результат проверки</title></head>";
			echo "<body>";

			// Если оба массива ошибок пусты — всё отлично
			if (empty($empty_errors) && empty($validation_errors)) {
				echo "<h2>🎉 Сообщение об успешной отправке формы!</h2>";
				echo "<p>Данные успешно прошли санитизацию и валидацию.</p>";
				echo "<ul>";
				echo "<li><strong>Логин:</strong> " . htmlspecialchars($login) . "</li>";
				echo "<li><strong>E-mail:</strong> " . htmlspecialchars($email) . "</li>";
				echo "</ul>";
			} else {
				// Выводим сообщение о возникших проблемах
				echo "<h2 style='color: red;'>⚠️ При обработке формы возникли проблемы</h2>";

				// Вывод ошибок пустых полей
				if (!empty($empty_errors)) {
					echo "<h3>Ошибки проверки на пустоту (" . count($empty_errors) . "):</h3>";
					echo "<ul>";
					foreach ($empty_errors as $field => $error) {
						echo "<li><strong>$field:</strong> " . htmlspecialchars($error) . "</li>";
					}
					echo "</ul>";
				}

				// Вывод ошибок валидации
				if (!empty($validation_errors)) {
					echo "<h3>Ошибки валидации (" . count($validation_errors) . "):</h3>";
					echo "<ul>";
					foreach ($validation_errors as $field => $error) {
						echo "<li><strong>$field:</strong> " . htmlspecialchars($error) . "</li>";
					}
					echo "</ul>";
				}

				echo "<p><a href='javascript:history.back()'>Назад к форме</a></p>";
			}

			echo "</body>";
			echo "</html>";

		} else {
			echo "Форма не была отправлена.";
		}
		?>



</body>
</html>